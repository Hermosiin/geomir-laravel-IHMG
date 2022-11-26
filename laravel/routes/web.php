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
   ->middleware(['auth', 'permission:files']);

//MIDDLEWARE CRUD PLACES
Route::resource('places', PlaceController::class)
   ->middleware(['auth', 'permission:places']);

//MIDDLEWARE CRUD POSTS
Route::resource('posts', PostController::class)
   ->middleware(['auth', 'permission:posts']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'language']);

Route::post('/posts/{post}/likes', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');

Route::post('/post/{post}/unfavorites', [App\Http\Controllers\PostController::class, 'unlike'])->name('posts.unlike');