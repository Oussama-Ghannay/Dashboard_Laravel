<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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





