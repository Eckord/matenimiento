<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RefaccionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\imprimirController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ReportesController;


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
Route::get('/servicios/{servicio}/solicitud', [ServiciosController::class, 'solicitud'])->name('servicios.solicitud');
Route::post('/servicios/{servicio}/aprobar', [ServiciosController::class, 'aprobarSolicitud'])->name('servicios.aprobarSolicitud');
Route::post('/servicios/{servicio}/rechazar', [ServiciosController::class, 'rechazarSolicitud'])->name('servicios.rechazarSolicitud');
Route::get('/mantenimiento/{mantenimiento}/solicitud', [MantenimientoController::class, 'solicitar'])->name('mantenimiento.request');
Route::resource('clientes', ClientesController::class);
Route::resource('refacciones', RefaccionesController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('mantenimiento', MantenimientoController::class);
Route::resource('reportes', ReportesController::class);
Route::get('imprimir', [imprimirController::class, 'imprimir'])->name('imprimir');
Route::get('/reimprimir/{servicio}', [ServiciosController::class, 'reimprimir'])->name('reimprimir');




