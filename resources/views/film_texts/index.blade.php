@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Textos de Películas</h3>
                    <a href="{{ route('film-texts.create') }}" class="btn btn-primary float-right">Nuevo Texto</a>
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
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filmTexts as $filmText)
                            <tr>
                                <td>{{ $filmText->film_id }}</td>
                                <td>{{ $filmText->title }}</td>
                                <td>{{ $filmText->description }}</td>
                                <td>
                                    <form action="{{ route('film-texts.destroy', $filmText->film_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('film-texts.show', $filmText->film_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('film-texts.edit', $filmText->film_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este texto?')">Eliminar</button>
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