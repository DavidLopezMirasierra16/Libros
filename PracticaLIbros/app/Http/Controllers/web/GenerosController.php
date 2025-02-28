<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::all();

        return view('indexGeneros', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FormularioCrearGenero'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_crear)
    {
        $genero = new Genero();

        $genero->genero=$datos_crear->nombre;
        $genero->save();

        return redirect('/generos')->with('exito', 'Genero '.$datos_crear->nombre.' creado con éxito');
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
        $genero = Genero::find($id);

        if($genero){
            return view('FormularioEditarGenero', compact('genero'));
        }else{
            return redirect('/generos')->with('error', 'Genero con el ID '.$id.' no encontrado');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_editar, string $id)
    {
        $genero_editar = Genero::find($id);

        $genero_editar->genero=$datos_editar->nombre;
        $genero_editar->save();

        return redirect('/generos')->with('exito', 'Genero '.$datos_editar->nombre.' editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genero_eliminar = Genero::find($id);

        $num_libros = $genero_eliminar->libros->count();

        if($num_libros==0){
            $genero_eliminar->delete();
            return redirect('/generos')->with('exito', 'Genero con ID '.$id.' eliminado correctamente');
        }else{
            return redirect('/generos')->with('error', 'No se pudo eliminar el genero '.$genero_eliminar->genero.' ya que tiene '.$num_libros.' libro/s asignado/s');
        }
    }
}
