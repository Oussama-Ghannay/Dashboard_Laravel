<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// use App\Models\Student;

use App\Models\Music;
use App\Models\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Type;
use App\Mail\MusicAdded;
use Illuminate\Support\Facades\Mail;










class MusicController extends Controller
{



    public function index()
    {
        // $musics = Music::all();

        $musics = Music::paginate(3); 

        return view ('musics.index')->with('musics', $musics);
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Utilisez le QueryBuilder pour effectuer la recherche
        $musics = Music::where('title', 'like', '%' . $searchTerm . '%')->paginate(3);
    
        return view('musics.index')->with('musics', $musics);
    }
    


 
    
    public function create()
    {

        $types = Type::all();
        return view('musics.create', compact('types') );
    }


 
//  prob
    public function store(Request $request)
    {


        
        $request->validate([
            'title' => 'required',
            'album' => 'required',


            'audio' => 'required|file|mimes:mp3,ogg,wav', // Exemple de validation pour les fichiers audio
        ]);
    
        // Utilisation de $request->all() pour récupérer toutes les données du formulaire
        $input = $request->all();
    
        // Vérifiez s'il y a un fichier audio dans la requête
        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Stockez le fichier audio dans le répertoire "audio"
            $file->storeAs('audio', $fileName);



            // pour le dossier C:\MusicFiles
             // Définissez le chemin complet du répertoire en dehors de l'application
               $externalDirectory = 'C:\MusicFiles'; // Chemin vers le répertoire en dehors de l'application


               // Construisez le chemin complet du fichier audio
                $filePath = $externalDirectory . '\\' . $fileName;

                  // Déplacez le fichier audio vers le répertoire en dehors de l'application
                 $file->move($externalDirectory, $fileName);


        //user static

                 $input['user_id'] = 1; 

            
            // Enregistrez le chemin du fichier audio dans la base de données
            $input['audio'] = 'audio/' . $fileName;
        }
    



       // Associez l'utilisateur à la musique
       $user = User::find(1);

       $music = new Music($input);
       $music->user()->associate($user);
       $music->save();



         // Envoie l'e-mail à l'utilisateur
          Mail::to($user->email)->send(new MusicAdded());
      
        
            return redirect('musicindex')->with('flash_message', 'Music Addedd!');


    }




//     public function store(Request $request)
// {
//     $request->validate([
//         'title' => 'required',
//         'artist' => 'required',
//         'album' => 'required',
//         'audio' => 'required|file|mimes:mp3,ogg,wav', // Exemple de validation pour les fichiers audio
//     ]);

//     $input = $request->all();

//     // Vérifiez s'il y a un fichier audio dans la requête
//     if ($request->hasFile('audio')) {
//         $file = $request->file('audio');
//         $fileName = time() . '_' . $file->getClientOriginalName();

//         // Définissez le chemin complet du répertoire en dehors de l'application
//         $externalDirectory = 'C:\MusicFiles'; // Chemin vers le répertoire en dehors de l'application

//         // Assurez-vous que le répertoire existe, sinon créez-le
//         if (!file_exists($externalDirectory)) {
//             mkdir($externalDirectory, 0777, true);
//         }

//         // Construisez le chemin complet du fichier audio
//         $filePath = $externalDirectory . '\\' . $fileName;

//         // Déplacez le fichier audio vers le répertoire en dehors de l'application
//         $file->move($externalDirectory, $fileName);

//         // Enregistrez le chemin complet du fichier audio dans la base de données
//         $input['audio'] = $filePath;
//     }

//     Music::create($input);

//     return redirect('musicindex')->with('flash_message', 'Music Addedd!');
// }










    // 
 
    

    public function show($id)
    {
        $music = Music::find($id);
        return view('musics.show')->with('music', $music);
    }
 
    
    public function edit($id)
    {
        $music = Music::find($id);
        $types = Type::all();

        return view('musics.edit',compact('types'))->with('musics', $music);
    }
 
  
    public function update(Request $request, $id)
    {


        // Validation (assurez-vous que le champ 'audio' est facultatif)
    $this->validate($request, [
        'title' => 'required',
        'album' => 'required',
        'type_id' => 'required',
        'audio' => 'nullable|file|mimes:mp3,ogg,wav,aac', // Validation pour les fichiers audio (facultatif)
    ]);

    $music = Music::find($id);
    $input = $request->all();

    // Code pour traiter le téléchargement du nouveau fichier audio, s'il est fourni
    if ($request->hasFile('audio')) {
        // Supprimez l'ancien fichier audio s'il existe
        if ($music->audio) {
            Storage::delete($music->audio);
        }

        $file = $request->file('audio');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('audio', $fileName);

        // Mettez à jour le chemin du fichier audio dans la base de données
        $input['audio'] = 'audio/' . $fileName;
    }

    $music->update($input);




        // $music = Music::find($id);
        // $input = $request->all();
        // $music->update($input);
        return redirect('musicindex')->with('flash_message', 'music Updated!');  
    }



 
   
    public function destroy($id)
    {
        Music::destroy($id);
        return redirect('musicindex')->with('flash_message', 'music deleted!');  
    }








    
}
