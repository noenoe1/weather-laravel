<?php

use Illuminate\Support\Facades\Route;

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
    return view('app');
});

Route::get('/', [App\Http\Controllers\WeatherController::class, 'index'])->name('weathers.index');
Route::get('add', [App\Http\Controllers\WeatherController::class, 'create'])->name('weathers.create');
Route::post('add', [App\Http\Controllers\WeatherController::class, 'store'])->name('weathers.store');

