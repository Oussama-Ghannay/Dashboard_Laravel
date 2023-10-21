<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $types = Type::latest()->get();

    return view("types.index", compact("types"));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. La validation
    $this->validate($request, [
        'name' => 'bail|required|string|max:255',
       
    ]);



    // 3. On enregistre les informations du Post
    Type::create([
        "name" => $request->name,
       
    ]);

    // 4. On retourne vers tous les posts : route("types.index")
    return redirect(route("types.index"));
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $type = Type::find($type->id);


        $musics = $type->musics;
        return view('types.show',compact('musics'))->with('type', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $type = Type::find($type->id);

        return view('types.edit')->with('type', $type);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        // 1. La validation

    // Les règles de validation pour "title" et "content"
    $rules = [
        'name' => 'bail|required|string|max:255',
    ];



    $this->validate($request, $rules);



    // 3. On met à jour les informations du Post
    $type->update([
        "name" => $request->name,
       
    ]);

    // 4. On affiche le Post modifié : route("posts.show")
    // return redirect(route("/types", $type));
     return redirect('types')->with('flash_message', 'music Updated!');  

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);
        return redirect('types')->with('flash_message', 'music deleted!');  
    }
}
