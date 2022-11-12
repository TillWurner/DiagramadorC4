<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contactus', [ContactusController::class, 'contactus'])->name('contactus');
Route::get('/users',[UserController::class, 'index'])->name('users');
Route::delete('/users{id}',[UserController::class,'delete'])->name('delete');
Route::get('/users/{id}',[UserController::class,'profile'])->name('profile');
Route::get('/mydiagram',[DiagramController::class,'mydiagrams'])->name('mydiagrams');
Route::delete('/mydiagram{id}',[DiagramController::class,'delete'])->name('delete');
/* Route::get('/mydiagram{id}',[DiagramController::class,'mydiagrams'])->name('mydiagrams'); */
Route::post('/mydiagram/store',[DiagramController::class, 'store'])->name('diagram.store');
Route::get('/shdiagram',[DiagramController::class,'shdiagrams'])->name('shdiagrams');