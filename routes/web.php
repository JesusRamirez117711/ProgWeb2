<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturasController;

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
    return view('index');
})->name('index');


Route::resource('perfiles', PerfilesController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('facturas', FacturasController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
