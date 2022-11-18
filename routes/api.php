<?php

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** La siguiente ruta genera una vista de todos los registros de la tabla empleados
 * en formato JSON, solo debemos acceder como /api/empleados
 */
Route::get('/empleados', function (){
    return Empleado::all();
});