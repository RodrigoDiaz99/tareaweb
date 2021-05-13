<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\User;
use App\Direction;
use App\Cede;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use App\Mail\registrymail;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        foreach ($users as $row) {
            $rol = $row->getRoleNames();
            $permission = $row->getAllPermissions();
        }
        $direc = Direction::orderBy('direction_name', 'desc')->get();
        $cede = Cede::orderBy('cede_name', 'desc')->get();
        // $user = Auth::user();
        return view('users.index', compact('users', 'direc', 'cede'));
    }
    public function create()
    {

        $roles = Role::all();
        $directions = Direction::orderBy('direction_name', 'desc')->get();
        $cedes = Cede::orderBy('cede_name', 'desc')->get();
        return view('users.create', compact('directions', 'cedes','roles'));
        //return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->direction_id = $request->direction_id;
        $user->cede_id = $request->cede_id;
        $user->status = $request->status;
        $user->status = "Active";
        $role = $request->roles;
        if (User::where('email', $request->email)->exists()) {
            return back()->with('error', 'El email ya se encuentra registrada.');
        } else {
            $user->save();
            $user->assignRole($role);
            Mail::to($request->email)
            ->send(new registrymail ($user));
        }
        return redirect()->route('panel_admin')->with('success', 'Se ha creado el usuario');

    }


        public function edit($id)
    {

        $users = User::findOrFail($id);
        $roles = Role::all();
        $directions = Direction::orderBy('direction_name', 'desc')->get();
        $cedes = Cede::orderBy('cede_name', 'desc')->get();
      //  $program_selected = $users->program;
        //dd($users2);
        return view('users.edit', compact('users', 'directions', 'cedes','roles'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;

        $user->roles()->detach();
        $role = $request->roles;
        $user->direction_id = $request->direction_id;
        $user->cede_id = $request->cede_id;
        $user->update();
        $user->assignRole($role);
        return redirect()->route('panel_admin')->with('succes', 'Se ha actualizado con exito la pregunta y respuesta');
    }
    public function enable_disable($id)
    {
        $users = User::findOrFail($id);
        if ($users->status == "Active") {
            $users->status = "Inactive";
           // $users->password = bcrypt(Str::random(15));
            $users->update();
            return back()->with('Success', 'Se ha inhabilitado la direccion.');
        } else {
            $users->status = "Active";
            $users->password= bcrypt('genericpassword');
            $users->update();
            return back()->with('success', 'Se ha habilitado la direccion.');
        }
    }
    public function permissions($id)
    {
        $users = User::findOrFail($id);
        $permission_complete = Permission::all();
        $permission = $users->getAllPermissions();
        return view('users.user_permission', compact('users', 'permission', 'permission_complete'));
        //register.user_permission
    }

    public function update_permission(Request $request, $id){
        $users = User::findOrFail($id);
       $users->permissions()->detach();
     //  $users()->hasRole([]) || $users()->hasPermissionTo([]);
        //obtiene los permisos actuales y quita las llaves foraneas,
        $permission_confirmed = $request->permission_confirmed;//obtengo los nuevos permisos
        //dd($permission_confirmed);
        $users->givePermissionTo($permission_confirmed);//darle permisos para el arreglo de permisos en el checkbox
        //dd($users->permissions()->detach());
        $users->update();
        return back()->with('success','Se ha modificado los permisos con éxito.');
    }



}
