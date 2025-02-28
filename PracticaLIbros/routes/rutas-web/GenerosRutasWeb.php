<?php

use App\Http\Controllers\web\GenerosController;
use Illuminate\Support\Facades\Route;

Route::get('/generos', [GenerosController::class, 'index'])->name('generosIndex');

Route::prefix('/generos')->group(function(){

    //Nos lleva al formulario
    Route::get('/crear', [GenerosController::class, 'create'])->name('crearFormularioGeneros');
    //Nos crea el genero
    Route::post('/crear', [GenerosController::class, 'store'])->name('crearGenero');

    //Nos lleva al formulario de editar
    Route::get('/editar/{id}', [GenerosController::class, 'edit'])->name('editarFormularioGeneros');
    //Nos edita el genero
    Route::put('/editar/{id}', [GenerosController::class, 'update'])->name('editarGenero');

    //Nos elimina un genero
    Route::delete('/eliminar/{id}', [GenerosController::class, 'destroy'])->name('eliminarGenero');

});

?>