<?php

use Illuminate\Support\Facades\Route;

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










// Route Type
Route::resource("/types", TypeController::class);



