@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Películas</h3>
                    <a href="{{ route('films.create') }}" class="btn btn-primary float-right">Nueva Película</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Año</th>
                                <th>Duración</th>
                                <th>Clasificación</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($films as $film)
                            <tr>
                                <td>{{ $film->film_id }}</td>
                                <td>{{ $film->title }}</td>
                                <td>{{ $film->description }}</td>
                                <td>{{ $film->release_year }}</td>
                                <td>{{ $film->length }}</td>
                                <td>{{ $film->rating }}</td>
                                <td>{{ $film->last_update }}</td>
                                <td>
                                    <form action="{{ route('films.destroy', $film->film_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('films.show', $film->film_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('films.edit', $film->film_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta película?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection