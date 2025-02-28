@extends('layout.principal')

@section('title', 'Principal')
    
@section('contenido')
    
    <section class="mt-2">
        <h2>Aqui podrás consultar el panel de administrador de libros</h2>
        <h4>Consulta:</h4>
        <div>
            <table class="table table-striped-columns mt-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Acceder</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Libros</td>
                    <td><a href="{{ route('librosIndex') }}" class="btn btn-primary">Libros</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Autores</td>
                    <td><a href="{{ route('autoresIndex') }}" class="btn btn-primary">Autores</a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Generos</td>
                    <td><a href="{{ route('generosIndex') }}" class="btn btn-primary">Generos</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection