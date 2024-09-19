<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');
Route::get('/createCar', function () {
    return view('createCar');
})->name('createCar');
Route::get('/plate', function () {
    return view('plate');
})->name('plate');

Route::middleware('auth')->group(function () {

});

require __DIR__.'/auth.php';
