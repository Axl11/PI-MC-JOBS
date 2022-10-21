<?php

use App\Models\Empleado;
use App\Http\Controllers\EmpleadoController;
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


//Ruta carousel
Route::get('/vista', function () {
    return view('empleados/empleadoVista');
});

// Ruta Woox
Route::get('/woox', function () {
    return view('empleados/empleadoWoox');
});

Route::resource('empleado', EmpleadoController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
