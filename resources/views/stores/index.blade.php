@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Tiendas</h3>
                    <a href="{{ route('stores.create') }}" class="btn btn-primary float-right">Nueva Tienda</a>
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
                                <th>Gerente</th>
                                <th>Dirección</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                            <tr>
                                <td>{{ $store->store_id }}</td>
                                <td>{{ $store->manager->first_name }} {{ $store->manager->last_name }}</td>
                                <td>{{ $store->address->address }}</td>
                                <td>{{ $store->last_update }}</td>
                                <td>
                                    <form action="{{ route('stores.destroy', $store->store_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('stores.show', $store->store_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('stores.edit', $store->store_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta tienda?')">Eliminar</button>
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