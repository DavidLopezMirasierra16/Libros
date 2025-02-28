<?php

use App\Http\Controllers\Api\LibrosController;
use Illuminate\Support\Facades\Route;

//Obtiene todos los libros
Route::get('/libros', [LibrosController::class, 'obtenerLibros']);

//Obtiene detalles de un libro
Route::get('/libros/{id}', [LibrosController::class, 'libroId']);

//Crea un libro
Route::post('/libros', [LibrosController::class, 'crearLibro']);

//Actualiza un libro
Route::put('/libros/{id}', [LibrosController::class, 'actualizarLibro']);

//Elimina un libro
Route::delete('/libros/{id}', [LibrosController::class, 'eliminarLibro']);

?>