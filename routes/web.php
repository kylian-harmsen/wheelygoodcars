<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

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

Route::middleware('auth')->group(function () {
    Route::get('/plate', [CarsController::class, 'offerStep1'])->name('cars.offer.step1');
    Route::post('/plate', [CarsController::class, 'processStep1'])->name('cars.offer.step1.process');
    Route::get('/createCar', [CarsController::class, 'offerStep2'])->name('cars.offer.step2');
    Route::post('/createCar', [CarsController::class, 'processStep2'])->name('cars.offer.step2.process');
});

require __DIR__.'/auth.php';
