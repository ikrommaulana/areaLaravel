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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/allProvinsi', [App\Http\Controllers\AreaController::class, 'index'])->name('allProvinsi');
Route::get('/getKota', [App\Http\Controllers\AreaController::class, 'getKota'])->name('getKota');
Route::get('/getKecamatan', [App\Http\Controllers\AreaController::class, 'getKecamatan'])->name('getKecamatan');
Route::get('/getKelurahan', [App\Http\Controllers\AreaController::class, 'getKelurahan'])->name('getKelurahan');
