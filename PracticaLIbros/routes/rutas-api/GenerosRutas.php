<?php

use App\Http\Controllers\Api\GenerosController;
use Illuminate\Support\Facades\Route;

//Obtiene todos los generos
Route::get('/generos', [GenerosController::class, 'obtenerGeneros']);

//Obtiene los datos de un genero
Route::get('/generos/{id}', [GenerosController::class, 'obtenerGenero']);

//Crea un genero
Route::post('/generos', [GenerosController::class, 'crearGenero']);

//Edita un genero
Route::put('/generos/{id}', [GenerosController::class, 'actualizarGenero']);

//Edita un genero
Route::delete('/generos/{id}', [GenerosController::class, 'eliminarGenero']);

?>