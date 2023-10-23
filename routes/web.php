<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Models\Blog;

use App\Http\Controllers\MusicController;
use App\Http\Controllers\TypeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.index1');
});

Route::get('/test', function () {
    return view('layouts.test');
});
Route::get('/events', function () {
    return view('Evenement.evenement');
});

Route::resource("/event", EventController::class);
//pdf
Route::get('generate-pdf', [EventController::class,'pdf']);

// ################################################################################
Route::get('/blogii', function () {
    $blog = Blog::all();
    return view('Blog.index')->with('blogg', $blog);
});
// ################################################################################

Route::get('/addblog', function () {
    return view('Blog.create');
});
Route::resource("/event", EventController::class);
Route::resource("/ticket", TicketController::class);
Route::resource("/blog", BlogController::class);
Route::patch('/blog/{blog}', 'BlogController@update')->name('blog.update');

 




Route::resource('/musicindex', MusicController::class);



// pour pouvoir lire lurl de l'audio
Route::get('/audio/{filename}', function ($filename) {
    $path = storage_path('app/audio/' . $filename);

    if (file_exists($path)) {
        return response()->file($path);
    } else {
        abort(404);
    }
});

// Route::get('/music/search', 'MusicController@search')->name('music.search');



// Route::get('/music/search', 'MusicController@search')->name('musicss.search');

Route::get('/music/search', [MusicController::class, 'search'])->name('musicss.search');









// Route Type
Route::resource("/types", TypeController::class);



