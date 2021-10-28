<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RefaccionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\imprimirController;
use App\Http\Controllers\MantenimientoController;


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
#Route::get("/users", [UserController::class, "index"]);
Route::post('/servicios/create', [ClientesController::class, 'agregar'])->name('agregar');
Route::get('/servicios/{servicio}/print', [ServiciosController::class, 'printOrder'])->name('servicios.imprimirOrden');
Route::get('/mantenimiento/{mantenimiento}/solicitud', [MantenimientoController::class, 'solicitar'])->name('mantenimiento.request');
Route::resource('clientes', ClientesController::class);
Route::resource('refacciones', RefaccionesController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('mantenimiento', MantenimientoController::class);
Route::get('imprimir', [imprimirController::class, 'imprimir'])->name('imprimir');




