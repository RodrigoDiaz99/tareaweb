<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contentup;

class ContentupController extends Controller
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
        $contents = Contentup::paginate(10);
        return view('contents.first.index', compact('contents'));
    }
    public function create()
    {
        return view('contents.first.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_paragraph' => 'required',
            'second_paragraph' => 'required',
            'third_paragraph' => 'required'
        ]);
        $content = new Contentup();
        $content->first_paragraph = $request->first_paragraph;
        $content->second_paragraph = $request->second_paragraph;
        $content->third_paragraph = $request->third_paragraph;
        $content->status = "active";
        $content->save();
        return redirect()->route('contentup_index')->with('success', 'Se ha publicado correctamente el contenido.');
    }
    public function edit($id)
    {
        $content = Contentup::findOrFail($id);
        //dd($ticket);
        return view('contents.first.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = Contentup::findOrFail($id);
        $content->first_paragraph = $request->first_paragraph;
        $content->second_paragraph = $request->second_paragraph;
        $content->third_paragraph = $request->third_paragraph;
        $content->status = $request->status;
        $content->update();
        return redirect()->route('contentup_index');


        // return redirect()->route('list_tickets')->with('error', 'No se puedes modificar'. $ticket->id);


    }
}
