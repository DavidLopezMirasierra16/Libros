<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autore;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibrosController extends Controller
{
    
    /**
     * Funcion que nos devuelve todos los libros
     */
    public function obtenerLibros(){

        $libros = Libro::with("autore","genero")->get();

        if(!$libros){
            $data = [
                'message'=>'No hay libros almacenados',
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'libros'=>$libros,
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

    /**
     * Funcion que nos devuelve los datos de un libro
     */
    public function libroId($id){

        $libro = Libro::find($id)->with("autore","genero")->first();

        if(!$libro){
            $data = [
                'message'=>'No existe el libro con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                // 'message'=>[$libro, $autores, $genero],
                'libro'=>$libro,
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }

    /**
     * Funcion que nos crea un libro
     */
    public function crearLibro(Request $datos_crear){

        $validator = Validator::make($datos_crear->all(), [
            'titulo'=>'Required|string',
            'descripcion'=>'string',
            'imagen',
            'autor_id'=>'Required|numeric',
            'genero_id'=>'Required|numeric'
        ]);

        if($validator->fails()){
            $data = [
                'message'=>'Error en la validacion',
                'errors'=>$validator->errors(),
                'status'=>400
            ];

            return response()->json($data, 400);
        }else{
            $autor = Autore::find($datos_crear->autor_id);
            $genero = Genero::find($datos_crear->genero_id);

            if(!$autor || !$genero){
                $data = [
                    'message'=>'No se encontró el autor con el id '.$datos_crear->autor_id.' o el genero con el id '.$datos_crear->genero_id,
                    'status'=>404
                ];
    
                return response()->json($data, 404);
            }else{
                $new_libro = Libro::create([
                    'titulo'=>$datos_crear->titulo,
                    'descripcion'=>$datos_crear->descripcion,
                    'imagen'=>$datos_crear->imagen,
                    'autor_id'=>$datos_crear->autor_id,
                    'genero_id'=>$datos_crear->genero_id
                ]);

                $data = [
                    'message'=>'Libro creado con éxito',
                    'libro'=>$new_libro,
                    'status'=>201
                ];
    
                return response()->json($data, 201);
            }

        }

    }

    /**
     * Funcion que nos crea un libro
     */
    public function actualizarLibro($id, Request $datos_editar){

        $libro_editar = Libro::find($id);

        if(!$libro_editar){
            $data = [
                'message'=>'No existe el libro con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $validator = Validator::make($datos_editar->all(), [
                'titulo'=>'Required|string',
                'descripcion'=>'string',
                'imagen',
                'autor_id'=>'Required|numeric',
                'genero_id'=>'Required|numeric'
            ]);
    
            if($validator->fails()){
                $data = [
                    'message'=>'Error en la validacion',
                    'errors'=>$validator->errors(),
                    'status'=>400
                ];
    
                return response()->json($data, 400);
            }else{
                $autor = Autore::find($datos_editar->autor_id);
                $genero = Genero::find($datos_editar->genero_id);

                if(!$autor || !$genero){
                    $data = [
                        'message'=>'No se encontró el autor con el id '.$datos_editar->autor_id.' o el genero con el id '.$datos_editar->genero_id,
                        'status'=>404
                    ];
        
                    return response()->json($data, 404);
                }else{
                    $libro_editar->titulo=$datos_editar->titulo;
                    $libro_editar->descripcion=$datos_editar->descripcion;
                    $libro_editar->imagen=$datos_editar->imagen;
                    $libro_editar->autor_id=$datos_editar->autor_id;
                    $libro_editar->genero_id=$datos_editar->genero_id;
                    $libro_editar->save();

                    $data = [
                        'message'=>'Libro con el id '.$id.' actualizado con éxito',
                        'status'=>200
                    ];
    
                    return response()->json($data, 200);
                }

            }

        }    

    }

    /**
     * Funcion que elimina un libro
     */
    public function eliminarLibro($id){

        $libro_eliminar = Libro::find($id);

        if(!$libro_eliminar){
            $data = [
                'message'=>'No existe el libro con el ID '.$id,
                'status'=>200
            ];

            return response()->json($data, 200);
        }else{
            $eliminar = $libro_eliminar->delete();

            $data = [
                'message'=>'Libro con el id '.$id.' eliminado correctamete',
                'status'=>200
            ];

            return response()->json($data, 200);
        }

    }
    
}
