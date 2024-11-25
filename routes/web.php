<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\LoginController;


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
    return view('home');
});


Route::get('/about', function () {
    return view('about');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/offer', function () {
    return view('offer');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/offeradmin', function () {
    return view('offeradmin');
});


Route::get('dashboard',[ProfileController::class, 'index'])->name('dashboard');
Route::delete('/profiles/{id}',[ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/home', [OfferController::class ,'index'])->name('home');
Route::get('/offer',[OfferController::class ,'index1'])->name('offer');
Route::get('/offeradmin',[OfferController::class ,'index2'])->name('offeradmin');

Route::post('/offer',[OfferController::class ,'storeoffer'])->name('storeoffer');

Route::get('/register',[ProfileController::class ,'create']);
Route::post('/register',[ProfileController::class ,'store'])->name('store');

Route::get('/login', [ProfileController::class, 'login1'])->name('login.profile');


Route::post('/login', [LoginController::class, 'connect'])->name('connect');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::delete('/offers/{offer}',[OfferController::class,'destroy'])->name('offer.destroy');


Route::delete('/offers/{offer}/force',[OfferController::class,'destroy1'])->name('offer.destroy1');


Route::get('/offers/{offer}/edit',[OfferController::class,'edit'])->name('offer.edit');
Route::put('/offers/{offer}',[OfferController::class,'update'])->name('offer.update');


Route::get('/offers/{offer}/edit1',[OfferController::class,'edit1'])->name('offer.edit1');
Route::put('/offers/{offer}/force',[OfferController::class,'update1'])->name('offer.update1');

Route::get('/search', [OfferController::class, 'search'])->name('search');

Route::get('/offer/{id}', [OfferController::class, 'showOfferDetails'])->name('offer.details');