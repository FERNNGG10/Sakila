@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Idiomas</h3>
                    <a href="{{ route('languages.create') }}" class="btn btn-primary float-right">Nuevo Idioma</a>
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
                                <th>Nombre</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->language_id }}</td>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->last_update }}</td>
                                <td>
                                    <form action="{{ route('languages.destroy', $language->language_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('languages.show', $language->language_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('languages.edit', $language->language_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este idioma?')">Eliminar</button>
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