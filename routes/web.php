<?php

use App\Http\Controllers\VacanteController;
use App\Models\Empleado;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DepartamentoController;
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

//Ruta carousel
Route::get('/vista', function () {
    return view('empleados/empleadoVista');
});

// Ruta Woox
Route::get('/woox', function () {
    return view('empleados/empleadoWoox');
});

Route::resource('empleado', EmpleadoController::class);

Route::resource('empresa', EmpresaController::class);

Route::resource('departamento', DepartamentoController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
