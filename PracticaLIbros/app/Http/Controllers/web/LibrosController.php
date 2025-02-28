<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Autore;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();

        return view('index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Autore::all();
        $generos = Genero::all();

        return view('FormularioCrear', compact('autores', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_crear)
    {
        $libro = new Libro();

        if ($datos_crear->hasFile('imagen')) {
            $path = $datos_crear->file('imagen')->store('libros', 'public');

            $libro->titulo = $datos_crear->titulo;
            $libro->descripcion = $datos_crear->descripcion;
            $libro->imagen = $path;
            $libro->autor_id = $datos_crear->autores;
            $libro->genero_id = $datos_crear->generos;
            $libro->save();

            return redirect('/libros')->with('exito', 'Libro ' . $libro->titulo . ' creado con exito');
        }
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
        $libro = Libro::find($id);
        $autores = Autore::all();
        $generos = Genero::all();

        if ($libro) {
            return view('FormularoioEditar', compact('libro', 'autores', 'generos'));
        } else {
            return redirect('/libros')->with('error', 'No se encontró el libro con el ID ' . $id);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_editar, string $id)
    {
        $libro_editar = Libro::find($id);

        if ($datos_editar->hasFile('imagen')) {
            $path = $datos_editar->file('imagen')->store('libros', 'public');

            $libro_editar->titulo = $datos_editar->titulo;
            $libro_editar->descripcion = $datos_editar->descripcion;
            $libro_editar->imagen = $path;
            $libro_editar->autor_id = $datos_editar->autores;
            $libro_editar->genero_id = $datos_editar->generos;
            $libro_editar->save();

            return redirect('/libros')->with('exito', 'Libro con el ID ' . $id . ' editado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro_eliminar = Libro::find($id);

        if ($libro_eliminar->imagen!=null) {
            $imagen = $libro_eliminar->imagen;

            if(Storage::disk('public')->exists($imagen)){
                Storage::disk('public')->delete($imagen);
            }

            $libro_eliminar->delete();
            return redirect('/libros')->with('exito', 'Libro con el ID ' . $id . ' eliminado con éxito');
        } else {
            return redirect('/libros')->with('error', 'Libro con el ID ' . $id . ' no encontrado');
        }
    }

    /**
     * Nos lleva a la pagina principal
     */
    public function principal()
    {
        return view('principal');
    }
}
