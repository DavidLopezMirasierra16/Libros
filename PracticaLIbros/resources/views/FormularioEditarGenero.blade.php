@extends('layout.formulario')

@section('title', 'Editar genero')
    
@section('contenido')
    
    <div class="col-9 m-auto">
        <h3 class="text-center">Edita un genero</h3>
        <div class="col-5 m-auto">
            <form action="{{ route('editarGenero', $genero->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$genero->genero}}">
                </div>
                <button type="submit" class="btn btn-success">Editar</button>
            </form>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('generosIndex') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

@endsection