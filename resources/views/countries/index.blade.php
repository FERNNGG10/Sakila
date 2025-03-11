<!-- resources/views/countries/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Países</h3>
                    <a href="{{ route('countries.create') }}" class="btn btn-primary float-right">Nuevo País</a>
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
                                <th>País</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countries as $country)
                            <tr>
                                <td>{{ $country->country_id }}</td>
                                <td>{{ $country->country }}</td>
                                <td>{{ $country->last_update }}</td>
                                <td>
                                    <form action="{{ route('countries.destroy', $country->country_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('countries.show', $country->country_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('countries.edit', $country->country_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este país?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $countries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection