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
    return view('welcome');
});

Route::group(['prefix' => 'cities'], function () {
    Route::get('/',[\App\Http\Controllers\CityController::class ,'index'])->name('cities.list');

    Route::get('/create',[\App\Http\Controllers\CityController::class ,'create'])->name('cities.create');
    Route::post('/create',[\App\Http\Controllers\CityController::class,'store'])->name('cities.store');
    Route::get('/{id}/edit',[\App\Http\Controllers\CityController::class ,'edit'])->name('cities.edit');
    Route::post('/{id}/edit',[\App\Http\Controllers\CityController::class,'update'])->name('cities.update');
    Route::get('/{id}/delete',[\App\Http\Controllers\CityController::class ,'destroy'])->name('cities.destroy');


});
Route::group(['prefix' => 'customer'], function () {
    Route::get('/',[\App\Http\Controllers\CustomerController::class ,'index'])->name('customers.list');

    Route::get('/create',[\App\Http\Controllers\CustomerController::class ,'create'])->name('customers.create');
    Route::post('/create',[\App\Http\Controllers\CustomerController::class,'store'])->name('customers.store');
    Route::get('/{id}/edit',[\App\Http\Controllers\CustomerController::class ,'edit'])->name('customers.edit');
    Route::post('/{id}/edit',[\App\Http\Controllers\CustomerController::class,'update'])->name('customers.update');
    Route::get('/{id}/delete',[\App\Http\Controllers\CustomerController::class ,'destroy'])->name('customers.destroy');

    Route::get('/filter',[\App\Http\Controllers\CustomerController::class ,'filterByCity'])->name('customers.filterByCity');
});


