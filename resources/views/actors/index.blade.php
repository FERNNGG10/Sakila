<!-- resources/views/actors/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Actores</h3>
                    <a href="{{ route('actors.create') }}" class="btn btn-primary float-right">Nuevo Actor</a>
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
                                <th>Apellido</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actors as $actor)
                            <tr>
                                <td>{{ $actor->actor_id }}</td>
                                <td>{{ $actor->first_name }}</td>
                                <td>{{ $actor->last_name }}</td>
                                <td>{{ $actor->last_update }}</td>
                                <td>
                                    <form action="{{ route('actors.destroy', $actor->actor_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('actors.show', $actor->actor_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('actors.edit', $actor->actor_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este actor?')">Eliminar</button>
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

