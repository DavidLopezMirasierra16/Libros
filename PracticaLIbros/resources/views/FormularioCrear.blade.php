@extends('layout.formulario')

@section('title', 'Crear un Libro')

@section('contenido')

    <div class="col-9 m-auto">
        <h3 class="text-center">Crea un libro</h3>
        <div class="col-5 m-auto">
            <form action="{{ route('crearLibro') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Descripcion</label>
                    <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Imagen</label><br>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label col-12 fw-bold">Autores</label>
                    <select name="autores" id="autores" class="col-5">
                        @foreach ($autores as $autor)
                            <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label col-12 fw-bold">Generos</label>
                    <select name="generos" id="generos" class="col-5">
                        @foreach ($generos as $genero)
                            <option value="{{$genero->id}}">{{$genero->genero}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('librosIndex') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

@endsection