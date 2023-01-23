<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;


use App\Http\Controllers\PlaceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
   return view('about');
});

Route::get('/contact', function () {
   return view('contact');
});

Route::get('/form-contacte', function () {
   return view('form-contacte');
});

Route::get('mail/test', [MailController::class, 'test']);

require __DIR__.'/auth.php';

Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    $request->session()->flash('info', $message);
    return view('welcome');
 }); 

//MIDDLEWARE CRUD Files
Route::resource('files', FileController::class)
   ->middleware(['auth']);

//MIDDLEWARE CRUD PLACES
Route::resource('places', PlaceController::class)
   ->middleware(['auth']);

//MIDDLEWARE CRUD POSTS
Route::resource('posts', PostController::class)
   ->middleware(['auth']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'language']);

Route::post('/places/{place}/favorite', [App\Http\Controllers\PlaceController::class, 'favorite'])->name('places.favorite');
Route::delete('/places/{place}/favorite', [App\Http\Controllers\PlaceController::class, 'unfavorite'])->name('places.unfavorite');


Route::post('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'unlike'])->name('posts.unlike');

