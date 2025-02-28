<?php

use App\Http\Controllers\web\LibrosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LibrosController::class, 'principal'])->name('bienvenida');

Route::get('/libros', [LibrosController::class, 'index'])->name('librosIndex');

Route::prefix('/libros')->group(function(){

    //Nos lleva al formulario
    Route::get('/crear', [LibrosController::class, 'create'])->name('librosFormulario');
    //Nos crea el libro
    Route::post('/crear', [LibrosController::class, 'store'])->name('crearLibro');

    //Nos lleva al formulario de actualizar
    Route::get('/actualizar/{id}', [LibrosController::class, 'edit'])->name('editarFormulario');
    //Nos edita el libro
    Route::put('/actualizar/{id}', [LibrosController::class, 'update'])->name('editarLibro');

    //Nos elimina el libro
    Route::delete('/eliminar/{id}', [LibrosController::class, 'destroy'])->name('eliminarLibro');

});

?>