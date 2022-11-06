<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;

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

// Route::resource('files', FileController::class);

// Route::resource('files', FileController::class)
// ->middleware(['auth', 'role:2']);


Route::resource('files', FileController::class)
->middleware(['auth', 'role.any:2,3']);

//RUTA PARA PODER ACCEDER A PLACE
Route::resource('places', PlaceController::class);

//MIDDLEWARE CRUD PLACES
Route::get('places/create', [PlaceController::class, 'create'])->name('places.create')->middleware(['auth', 'role.any:1']);
Route::post('places', [PlaceController::class, 'store'])->name('places.store')->middleware(['auth', 'role.any:1']);
Route::get('places/{place}/edit', [PlaceController::class, 'edit'])->name('places.edit')->middleware(['auth', 'role.any:1']);
Route::put('places/{place}', [PlaceController::class, 'update'])->name('places.update')->middleware(['auth', 'role.any:1']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
