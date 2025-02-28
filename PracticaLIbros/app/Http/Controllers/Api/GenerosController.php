<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenerosController extends Controller
{
    
    /**
     * Funcion que obtiene todos los autores
     */
    public function obtenerGeneros(){

        $generos = Genero::all();

        if(!$generos){
            $data = [
                'message'=>'No hay generos almacenados',
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'generos'=>$generos,
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

    /**
     * Funcion que nos devuelve el autor y sus libros
     */
    public function obtenerGenero($id){

        $genero = Genero::with("libros")->find($id);

        if(!$genero){
            $data = [
                'message'=>'No existe el genero con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'genero'=>$genero,
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

    /**
     * Funcion que nos crea un genero
     */
    public function crearGenero(Request $datos_crear){

        $validator = Validator::make($datos_crear->all(), [
            'genero'=>'required|string'
        ]);

        if($validator->fails()){
            $data = [
                'message'=>'Error en la validacion',
                'errors'=>$validator->errors(),
                'status'=>400
            ];

            return response()->json($data, 400);
        }else{
            $new_genero = Genero::create([
                'genero'=>$datos_crear->genero
            ]);

            $data = [
                'message'=>'Genero creado con éxito',
                'genero'=>$new_genero,
                'status'=>201
            ];

            return response()->json($data, 201);
        }

    }

    /**
     * Funcion que actualiza un genero
     */
    public function actualizarGenero($id, Request $datos_editar){

        $genero_editar = Genero::find($id);

        if(!$genero_editar){
            $data = [
                'message'=>'No existe el genero con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $validator = Validator::make($datos_editar->all(), [
                'genero'=>'required|string'
            ]);

            if($validator->fails()){
                $data = [
                    'message'=>'Error en la validacion',
                    'errors'=>$validator->errors(),
                    'status'=>400
                ];
    
                return response()->json($data, 400);
            }else{
                $genero_editar->genero=$datos_editar->genero;
                $genero_editar->save();

                $data = [
                    'message'=>'Genero con el id '.$id.' actualizado con éxito',
                    'status'=>200
                ];

                return response()->json($data, 200);
            }

        }

    }

    /**
     * Funcion que elimina un genero
     */
    public function eliminarGenero($id){

        $genero_eliminar = Genero::find($id);

        if(!$genero_eliminar){
            $data = [
                'message'=>'No existe el genero con el ID '.$id,
                'status'=>400
            ];

            return response()->json($data, 400);
        }else{
            $confirmar = $genero_eliminar->libros->count();

            if($confirmar>0){
                $data = [
                    'message'=>'No se puede eliminar el genero ya que hay libros con este genero',
                    'status'=>400
                ];
    
                return response()->json($data, 400);
            }else{
                $eliminar = $genero_eliminar->delete();
    
                $data = [
                    'message'=>'Genero con el id '.$id.' eliminado correctamete',
                    'status'=>200
                ];
    
                return response()->json($data, 200);
            }

        }

    }

}
