<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use PDF;


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
            'date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    // Validez si la date est supérieure ou égale à la date d'aujourd'hui
                    $today = now()->format('Y-m-d'); // Obtenez la date d'aujourd'hui
                    if ($value < $today) {
                        $fail($attribute.' doit être supérieure ou égale à la date d\'aujourd\'hui.');
                    }
                },
            ],            'lieu' => 'required',
            'artiste' => 'required',
            'categorie' => 'required',
           // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        
        $data = $request->only(['nom',
        'description',
        'date',
        'lieu',
        'artiste',
        'categorie']);
        
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName); // This will save the image to public/images directory
            $data['image'] = $imageName; // Store the filename to save in the database
        }
        
        
        Event::create($data);
        Session()->flash('message','Event Created Successfully!');
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

    //generate PDF
    public function pdf()
    {
        {
            $events = Event::get();
    
            // Pass the data to your Blade view
            $data = ['events' => $events];
    
            // Render the Blade view with the data
            $html = view('Evenement.myPDF', $data)->render();
    
            // Generate the PDF and offer it for download
            return PDF::loadHTML($html)
                ->setOption('isHtml5ParserEnabled', true)
                ->setOption('isPhpEnabled', true)
                ->setOption('isRemoteEnabled', true)
                ->setOption('defaultFont', 'sans-serif')
                ->download('events.pdf');
        }    }

    }