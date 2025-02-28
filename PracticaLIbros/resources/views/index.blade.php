@extends('layout.principal')

@section('title', 'Libros')
    
@section('contenido')

  @if (session('error'))
    <div class="alert alert-danger mt-4">{{ session('error') }}</div>
  @endif
  @if (session('exito'))
      <div class="alert alert-success mt-4">{{ session('exito') }}</div>
  @endif

  <section class="mt-3">
    <div>
      <h2>Libros</h2>
      <a href="{{ route('librosFormulario') }}" class="text-decoration-none btn btn-dark">Crear un libro</a>
    </div>
    <table class="table table-striped-columns mt-3">
        <thead>
          <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Genero</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Actualizar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        @foreach ($libros as $libro)
            <tbody>
              <tr>
                <td class="col-1"><img src="{{$libro->imagen == null ? asset('img/Image-not-found.png') : asset('storage/' . $libro->imagen)}}" alt="Imagen del libro" class="col-12"></td>
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->autore->nombre}}</td>
                <td>{{$libro->genero->genero}}</td>
                <td>{{$libro->descripcion == null ? 'No hay descripcion en este libro' : $libro->descripcion}}</td>
                <td>
                  <a href="{{ route('editarFormulario', $libro->id) }}" class="text-decoration-none btn btn-warning">Actualizar</a>
                </td>
                <td>
                  <form action="{{ route('eliminarLibro', $libro->id) }}" method="POST">
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