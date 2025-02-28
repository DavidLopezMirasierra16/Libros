@extends('layout.principal')

@section('title', 'Generos')
    
@section('contenido')

    @if (session('error'))
        <div class="alert alert-danger mt-4">{{ session('error') }}</div>
    @endif
    @if (session('exito'))
        <div class="alert alert-success mt-4">{{ session('exito') }}</div>
    @endif

    <section class="mt-3">
        <div>
        <h2>Generos</h2>
        <a href="{{ route('crearFormularioGeneros') }}" class="text-decoration-none btn btn-dark">Crear un genero</a>
        </div>
        <table class="table table-striped-columns mt-3">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nº de libros</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>
            @foreach ($generos as $genero)
                <tbody>
                <tr>
                    <td>{{$genero->genero}}</td>
                    <td>{{$genero->libros->count() == 0 ? "No tiene libros" : $genero->libros->count()}}</td>
                    <td>
                    <a href="{{ route('editarFormularioGeneros', $genero->id) }}" class="text-decoration-none btn btn-warning">Actualizar</a>
                    </td>
                    <td>
                    <form action="{{ route('eliminarGenero', $genero->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
        <a href="{{ route('bienvenida') }}" class="btn btn-primary">Volver</a>
    </section>

@endsection