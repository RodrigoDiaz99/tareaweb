<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $conference = conference::all();
        return view('conferences.index', compact('conference'));
    }
    public function frame($id)
    {
        $conference = Conference::findOrFail($id);
        $explote = explode('=', $conference['link']);
        //var_dump($explote[1]);
        $conferenceUrl = "https://www.youtube.com/embed/" . $explote[1];
        return view('conferences.frame', compact('conference','conferenceUrl'));
    }
    public function create()
    {
        return view('conferences.create');
    }

    public function show()
    {
        $conferences = conference::all();
        return view('conferences.show', compact('conferences'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'cover_file' => 'required|mimes:jpeg,bmp,png'
        ]);

        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //$cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/conferenceCover', $coverName);

            //Almacenamos los datos respectivos en la DB;
            Conference::create([
                'name' => $request->name,
                'link' => $request->link,
                'img_path_url' => $pathCover,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            return back();
        }

        return redirect()->route('conference_index')->with('success', 'Video gurdado con éxito');
    }
    public function edit($id)
    {
        $conference = Conference::find($id);
        return view('conferences.edit', compact('conference'));
    }
    public function update(Request $request, $id)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            $request->validate([
                'name' => 'required',
                'link' => 'required',
                'cover_file' => 'required|mimes:jpeg,bmp,png'
            ]);
            //obtenemos el campo file definido en el formulario
            //Eliminamos archivos que estamos editando;
            Storage::delete($request->videoCoverDelete);

            $coverName = time(); //. $cover_file->getClientOriginalName();

            $cover_file = $request->file('cover_file');

            // Img del libro o documento PDF.
            $pathCover = $request->file('cover_file')->storeAs('public/conferenceCover', $coverName);

            //Almacenamos los datos respectivos en la DB;
            Conference::where('id', $id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'img_path_url' => $pathCover,

            ]);
            //$video->update();
        } else {
            $request->validate([
                'name' => 'required',
                'link' => 'required'
            ]);
            //obtenemos el campo file definido en el formulario


            //Almacenamos los datos respectivos en la DB;
            Conference::where('id', $id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('conference_index')->with('update', 'Video Actualizado con éxito.');
    }

    public function destroy($id)
    {
        $DeleteConference = Conference::find($id);

        //Eliminamos el registro de la db;
        $DeleteConference->delete();

        // Movemos el archivo VideoCover a deleteVideoCovers para mantener un backup;
        Storage::move($DeleteConference->img_path_url, 'deleteConferenceCovers/' . $DeleteConference->deleted_at);

        return redirect()->route('conference_index')->with('delete', 'El Video se elimino con éxito.');
    }
}
