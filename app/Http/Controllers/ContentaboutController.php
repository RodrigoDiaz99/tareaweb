<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contentabout;

class ContentaboutController extends Controller
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
        $contents = Contentabout::paginate(10);

        return view('contents.about.index', compact('contents'));
    }
    public function create()
    {
        return view('contents.about.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required'

        ]);
        $content2 = new Contentabout();
        $content2->title = $request->title;

        $content2->sub_title = $request->sub_title;
        $content2->status = "active";
        $content2->save();
        return redirect()->route('contentabout_index')->with('success', 'Se ha publicado correctamente el contenido.');
    }
    public function edit($id)
    {
        $content2 = Contentabout::findOrFail($id);
        //dd($ticket);
        return view('contents.about.edit', compact('content2'));
    }

    public function update(Request $request, $id)
    {
        $content2 = Contentabout::findOrFail($id);
        $content2->title = $request->title;
        $content2->sub_title = $request->sub_title;
       // $content2->status = $request->status;
        $content2->update();
        return redirect()->route('contentabout_index');


        // return redirect()->route('list_tickets')->with('error', 'No se puedes modificar'. $ticket->id);


    }
}
