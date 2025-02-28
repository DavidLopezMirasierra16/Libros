@extends('layout.formulario')

@section('title', 'Editar Libro')

@section('contenido')
    
    <div class="col-9 m-auto">
        <h3 class="text-center">Actualiza un libro</h3>
        <div class="col-5 m-auto">
            <form action="{{ route('editarLibro', $libro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$libro->titulo}}" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$libro->descripcion}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" value="{{$libro->imagen}}" required>
                    <img src="{{ asset('storage/' . $libro->imagen) }}" alt="Imagen" class="col-4 mt-2">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label col-12 fw-bold">Autores</label>
                    <select name="autores" id="autores" class="col-5">
                        @foreach ($autores as $autor)
                            <option value="{{$autor->id}}" @if ($libro->autor_id == $autor->id) selected @endif >{{$autor->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label col-12 fw-bold">Generos</label>
                    <select name="generos" id="generos" class="col-5">
                        @foreach ($generos as $genero)
                            <option value="{{$genero->id}}" @if ($libro->genero_id == $genero->id) selected @endif >{{$genero->genero}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Editar</button>
            </form>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('librosIndex') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

@endsection    