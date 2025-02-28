@extends('layout.principal')

@section('title', 'Autores')
    
@section('contenido')

    @if (session('error'))
        <div class="alert alert-danger mt-4">{{ session('error') }}</div>
    @endif
    @if (session('exito'))
        <div class="alert alert-success mt-4">{{ session('exito') }}</div>
    @endif

    <section class="mt-3">
        <div>
        <h2>Autores</h2>
        <a href="{{ route('crearFormularioAutores') }}" class="text-decoration-none btn btn-dark">Crear un autor</a>
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
            @foreach ($autores as $autor)
                <tbody>
                <tr>
                    <td>{{$autor->nombre}}</td>
                    <td>{{$autor->libros->count() == 0 ? "No tiene libros" : $autor->libros->count()}}</td>
                    <td>
                    <a href="{{ route('editarFormularioAutores', $autor->id) }}" class="text-decoration-none btn btn-warning">Actualizar</a>
                    </td>
                    <td>
                    <form action="{{ route('eliminarAutor', $autor->id) }}" method="POST">
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