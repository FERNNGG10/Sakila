<!-- resources/views/addresses/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Direcciones</h3>
                    <a href="{{ route('addresses.create') }}" class="btn btn-primary float-right">Nueva Dirección</a>
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
                                <th>Dirección</th>
                                <th>Distrito</th>
                                <th>Ciudad</th>
                                <th>País</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->address_id }}</td>
                                <td>{{ $address->address }}</td>
                                <td>{{ $address->district }}</td>
                                <td>{{ $address->city->city ?? 'N/A' }}</td>
                                <td>{{ $address->city->country->country ?? 'N/A' }}</td>
                                <td>
                                    <form action="{{ route('addresses.destroy', $address->address_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('addresses.show', $address->address_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('addresses.edit', $address->address_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta dirección?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $addresses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




