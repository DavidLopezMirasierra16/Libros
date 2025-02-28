<?php

use App\Http\Controllers\Api\AutoresController;
use Illuminate\Support\Facades\Route;

//Obtiene todos los autores
Route::get('/autores', [AutoresController::class, 'obtenerAutores']);

//Obtiene los datos de un autor
Route::get('/autores/{id}', [AutoresController::class, 'obtenerAutor']);

//Crea un autor
Route::post('/autores', [AutoresController::class, 'crearAutor']);

//Edita un autor
Route::put('/autores/{id}', [AutoresController::class, 'actualizarAutor']);

//Edita un autor
Route::delete('/autores/{id}', [AutoresController::class, 'eliminarAutor']);

?>