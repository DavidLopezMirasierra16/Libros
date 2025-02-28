<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoresController extends Controller
{
    
    /**
     * Funcion que obtiene todos los autores
     */
    public function obtenerAutores(){

        $autores = Autore::all();

        if(!$autores){
            $data = [
                'message'=>'No hay libros almacenados',
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'autores'=>$autores,
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

    /**
     * Funcion que nos devuelve el autor y sus libros
     */
    public function obtenerAutor($id){

        $autor = Autore::find($id)->with("libros")->first();

        if(!$autor){
            $data = [
                'message'=>'No existe el libro con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'autor'=>$autor,
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

    /**
     * Funcion que te crea un autor
     */
    public function crearAutor(Request $datos_crear){

        $validator = Validator::make($datos_crear->all(), [
            'nombre'=>'required'
        ]);

        if($validator->fails()){
            $data = [
                'message'=>'Error en la validacion',
                'errors'=>$validator->errors(),
                'status'=>400
            ];

            return response()->json($data, 400);
        }else{
            $new_autor = Autore::create([
                'nombre'=>$datos_crear->nombre
            ]);

            $data = [
                'message'=>'Autor creado con éxito',
                'autor'=>$new_autor,
                'status'=>201
            ];

            return response()->json($data, 201);
        }

    }

    /**
     * Funcion que nos actualiza un autor
     */
    public function actualizarAutor($id, Request $datos_editar){

        $autor_editar = Autore::find($id);

        if(!$autor_editar){
            $data = [
                'message'=>'No existe el autor con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $validator = Validator::make($datos_editar->all(), [
                'nombre'=>'required'
            ]);

            if($validator->fails()){
                $data = [
                    'message'=>'Error en la validacion',
                    'errors'=>$validator->errors(),
                    'status'=>400
                ];
    
                return response()->json($data, 400);
            }else{
                $autor_editar->nombre=$datos_editar->nombre;
                $autor_editar->save();

                $data = [
                    'message'=>'Autor con el id '.$id.' actualizado con éxito',
                    'status'=>200
                ];

                return response()->json($data, 200);
            }

        }

    }

    /**
     * Funcion que nos elimina un autor
     */
    public function eliminarAutor($id){

        $autor_eliminar = Autore::find($id);

        if(!$autor_eliminar){
            $data = [
                'message'=>'No existe el autor con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $eliminar = $autor_eliminar->delete();

            $data = [
                'message'=>'Libro con el id '.$id.' eliminado correctamete',
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

}
