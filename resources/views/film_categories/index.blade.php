<!-- resources/views/film-categories/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Categorías de Películas</h3>
                    <a href="{{ route('film-categories.create') }}" class="btn btn-primary float-right">Nueva Categoría de Película</a>
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
                                <th>Película</th>
                                <th>Categoría</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filmCategories as $filmCategory)
                            <tr>
                                <td>{{ $filmCategory->film_id }} - {{ $filmCategory->category_id }}</td>
                                <td>{{ $filmCategory->film->title }}</td>
                                <td>{{ $filmCategory->category->name }}</td>
                                <td>{{ $filmCategory->last_update }}</td>
                                <td>
                                    <form action="{{ route('film-categories.destroy', ['film_category' => $filmCategory->film_id . '-' . $filmCategory->category_id]) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('film-categories.show', ['film_category' => $filmCategory->film_id . '-' . $filmCategory->category_id]) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('film-categories.edit', ['film_category' => $filmCategory->film_id . '-' . $filmCategory->category_id]) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta categoría de película?')">Eliminar</button>
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