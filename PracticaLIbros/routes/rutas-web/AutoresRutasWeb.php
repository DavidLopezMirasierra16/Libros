<?php

use App\Http\Controllers\web\AutoresController;
use Illuminate\Support\Facades\Route;

Route::get('/autores', [AutoresController::class, 'index'])->name('autoresIndex');

Route::prefix('/autores')->group(function(){

    //Nos lleve al formulario
    Route::get('/crear', [AutoresController::class, 'create'])->name('crearFormularioAutores');
    //Nos crea un autor
    Route::post('/crear', [AutoresController::class, 'store'])->name('crearAutor');

    //Nos lleva al formulario de editar
    Route::get('/editar/{id}', [AutoresController::class, 'edit'])->name('editarFormularioAutores');
    //Nos edita el autor
    Route::put('/editar/{id}', [AutoresController::class, 'update'])->name('editarAutor');

    //Nos elimina un autor
    Route::delete('/eliminar/{id}', [AutoresController::class, 'destroy'])->name('eliminarAutor');

});

?>