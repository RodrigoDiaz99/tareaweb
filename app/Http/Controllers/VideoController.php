<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $video = video::all();
        return view('video.index', compact('video'));
    }

    public function frame($id)
    {
        $videos = video::findOrFail($id);
        // dividemos la url del link que sube el users a nuestro sistema para obtener el ID del video que quiere publicar;
        $explote = explode('=', $videos['link']);

        // publicamos el embed para poder ver el video
        $videoUrl = "https://www.youtube.com/embed/" . $explote[1];
        return view('video.frame', compact('videos', 'videoUrl'));
    }

    public function create()
    {
        return view('video.create');
    }

    public function show()
    {
        $video = video::all();
        return view('video.show', compact('video'));
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
            $pathCover = $cover_file->storeAs('public/videoCover', $coverName);

            //Almacenamos los datos respectivos en la DB;
            video::create([
                'name' => $request->name,
                'link' => $request->link,
                'img_path_url' => $pathCover,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            return back();
        }

        return redirect()->route('video_index')->with('success', 'Video gurdado con éxito');
    }

    public function edit($id)
    {
        $video = video::find($id);
        return view('video.edit', compact('video'));
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
            $pathCover = $request->file('cover_file')->storeAs('public/videoCover', $coverName);

            //Almacenamos los datos respectivos en la DB;
            video::where('id', $id)->update([
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
            video::where('id', $id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('video_index')->with('update', 'Video Actualizado con éxito.');
    }

    public function destroy($id)
    {
        $DeleteVideo = video::find($id);

        //Eliminamos el registro de la db;
        $DeleteVideo->delete();

        // Movemos el archivo VideoCover a deleteVideoCovers para mantener un backup;
        Storage::move($DeleteVideo->img_path_url, 'deleteVideoCovers/' . $DeleteVideo->deleted_at);

        return back()->with('delete', 'El Video se elimino con éxito.');
    }
}
