<?php

use App\Http\Controllers\VacanteController;
use App\Models\Empleado;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\SolicitudeController;
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

Route::resource('vacante', VacanteController::class);

Route::resource('empleado', EmpleadoController::class);

Route::resource('empresa', EmpresaController::class);

Route::resource('departamento', DepartamentoController::class);

Route::resource('solicitude', SolicitudeController::class);

/**La siguiente ruta pertenece a Solicitude, sirve para descargar el ARCHIVO */
Route::get('/descargaArchivoCV/{archivo}', [SolicitudeController::class, 'descargaArchivo'])->name('descargaArchivoCV');

/** Las siguientes tres rutas pertenecen a Empleado, a la seccion de PAPELERA */
Route::get('/empleados/papelera', [EmpleadoController::class, 'papelera']);
Route::delete('/empleados/papelera/{id}', [EmpleadoController::class, 'forcedelete']);
Route::get('/empleados/{id}/restore', [EmpleadoController::class, 'recuperar']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
