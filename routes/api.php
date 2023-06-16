<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    // Aqui añadimnos la ruta para insertar y eliminar vehiculos
    Route::post('/vehiculos', 'App\Http\Controllers\VehiculosController@insertar');
    Route::delete('/vehiculos/{id}', 'App\Http\Controllers\VehiculosController@eliminar');
