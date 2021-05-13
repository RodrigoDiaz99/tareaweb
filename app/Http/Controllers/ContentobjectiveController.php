<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contentobjective;

class ContentobjectiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {

        return view('contents.index');
    }
    public function index()
    {
        $contents = Contentobjective::paginate(10);
        return view('contents.about.objectives.index', compact('contents'));
    }

    public function create()
    {
        return view('contents.about.objectives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'objectives1' => 'required',
            'objectives2' => 'required',
            'objectives3' => 'required',
            'objectives4' => 'required',

        ]);
        $content3 = new Contentobjective();
        $content3->objectives1 = $request->objectives1;
        $content3->objectives2 = $request->objectives2;
        $content3->objectives3 = $request->objectives3;
        $content3->objectives4 = $request->objectives4;
        $content3->status = "active";
        $content3->save();
        return redirect()->route('contentobjectives_index')->with('success', 'Se ha publicado correctamente el contenido.');
    }

    public function edit($id)
    {
        $content3 = Contentobjective::findOrFail($id);
        //dd($ticket);
        return view('contents.about.objectives.edit', compact('content3'));
    }


    public function update(Request $request, $id)
    {
        $content3 = Contentobjective::findOrFail($id);
        $content3->objectives1 = $request->objectives1;
        $content3->objectives2 = $request->objectives2;
        $content3->objectives3 = $request->objectives3;
        $content3->objectives4 = $request->objectives4;
        $content3->status = "active";
        $content3->update();
        return redirect()->route('contentobjectives_index');


        // return redirect()->route('list_tickets')->with('error', 'No se puedes modificar'. $ticket->id);


    }




}
