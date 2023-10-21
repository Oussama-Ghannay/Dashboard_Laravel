<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            
            
            $event = Event::all();
            return view('Evenement.evenement')->with('event', $event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Evenement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'lieu' => 'required',
            'artiste' => 'required',
            'categorie' => 'required',
        ]);
        $input = $request->all();
        Event::create($input);
        return redirect('event')->with('flash_message', 'Event Addedd!');  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('Evenement.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('Evenement.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $input = $request->all();
        $event->update($input);
        return redirect('event')->with('flash_message', 'event Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect('event')->with('flash_message', 'Event deleted!');  
    }
}
