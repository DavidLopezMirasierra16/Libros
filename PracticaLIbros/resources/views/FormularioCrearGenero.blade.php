@extends('layout.formulario')

@section('title', 'Crear un genero')
    
@section('contenido')
    
    <div class="col-9 m-auto">
        <h3 class="text-center">Crea un genero</h3>
        <div class="col-5 m-auto">
            <form action="{{ route('crearGenero') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('generosIndex') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

@endsection