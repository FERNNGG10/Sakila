<!-- resources/views/cities/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Ciudades</h3>
                    <a href="{{ route('cities.create') }}" class="btn btn-primary float-right">Nueva Ciudad</a>
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
                                <th>Ciudad</th>
                                <th>País</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->city_id }}</td>
                                <td>{{ $city->city }}</td>
                                <td>{{ $city->country->country }}</td>
                                <td>{{ $city->last_update }}</td>
                                <td>
                                    <form action="{{ route('cities.destroy', $city->city_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('cities.show', $city->city_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('cities.edit', $city->city_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta ciudad?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $cities->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection