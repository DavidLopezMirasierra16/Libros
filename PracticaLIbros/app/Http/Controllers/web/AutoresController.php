<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Autore;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autore::with('libros')->get();

        return view('indexAutores', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FormularioCrearAutor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_crear)
    {
        $autor = new Autore();

        $autor->nombre=$datos_crear->nombre;
        $autor->save();

        return redirect('/autores')->with('exito', 'Autor '.$datos_crear->nombre.' creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $autor_editar = Autore::find($id);

        if($autor_editar){
            return view('FormularioEditarAutor', compact('autor_editar'));
        }else{
            return redirect('/autores')->with('error', 'El autor con el id '.$id.' no existe');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_editar, string $id)
    {
        $autor = Autore::find($id);

        $autor->nombre=$datos_editar->nombre;
        $autor->save();
        
        return redirect('/autores')->with('exito', 'Autor '.$datos_editar->nombre.' editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor_eliminar = Autore::find($id);

        if(!$autor_eliminar){
            return redirect('/autores')->with('error', 'No se pudo eliminar el autor con ID '.$id);
        }else{
            $num_libros = $autor_eliminar->libros->count();
            if($num_libros == 0){
                $autor_eliminar->delete();

                return redirect('/autores')->with('exito', 'Autor con ID '.$id.' eliminado correctamente');
            }else{
                return redirect('/autores')->with('error', 'No se pudo eliminar el autor '.$autor_eliminar->nombre.' ya que tiene '.$num_libros.' libro/s asignados');
            }

        }

    }
}
