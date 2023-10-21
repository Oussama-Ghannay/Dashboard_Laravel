<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Models\Blog;

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
Route::resource("/blog", BlogController::class);
Route::patch('/blog/{blog}', 'BlogController@update')->name('blog.update');

 





