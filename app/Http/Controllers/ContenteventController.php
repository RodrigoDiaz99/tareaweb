<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contentevent;

class ContenteventController extends Controller
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
        $contents = Contentevent::paginate(10);
        return view('contents.events.index', compact('contents'));
    }
    public function create()
    {
        return view('contents.events.create');
    }
    public function store(Request $request)
    {
        $request->validate([

            'name_event' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'description' => 'required'
        ]);
        $content4 = new Contentevent();

        $content4->name_event = $request->name_event;
        $content4->date = $request->date;
        $content4->hour = $request->hour;
        $content4->place = $request->place;
        $content4->description = $request->description;
        $content4->status = "ACTIVE";
        $content4->save();

        return redirect()->route('contentevent_index')->with('success', 'Se ha publicado correctamente el contenido.');
    }
    public function edit($id)
    {
        $content4 = Contentevent::findOrFail($id);
        //dd($ticket);
        return view('contents.events.edit', compact('content4'));
    }

    public function update(Request $request, $id)
    {
        $content4 = Contentevent::findOrFail($id);
        $content4->name = $request->name_event;
        $content4->date = $request->date;
        $content4->hour = $request->hour;
        $content4->place = $request->place;
        $content4->description = $request->description;
        $content4->status = $request->status;
        $content4->update();
        return redirect()->route('contentup_index');
    
    }
}
