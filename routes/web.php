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

Route::get('/', [\App\Http\Controllers\CalculationContoller::class, 'index']);
Route::post('/calculate', [\App\Http\Controllers\CalculationContoller::class, 'calculate'])->name('calculation.calculate');
Route::post('/store', [\App\Http\Controllers\CalculationContoller::class, 'store'])->name('calculation.store');
Route::get('/edit/{calculation}', [\App\Http\Controllers\CalculationContoller::class, 'edit'])->name('calculations.edit');
Route::get('/delete/{calculation}', [\App\Http\Controllers\CalculationContoller::class, 'delete'])->name('calculations.delete');
