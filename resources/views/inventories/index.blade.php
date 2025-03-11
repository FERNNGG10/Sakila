@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Inventario</h3>
                    <a href="{{ route('inventories.create') }}" class="btn btn-primary float-right">Nuevo Inventario</a>
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
                                <th>Tienda</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventories as $inventory)
                            <tr>
                                <td>{{ $inventory->inventory_id }}</td>
                                <td>{{ $inventory->film->title }}</td>
                                <td>{{ $inventory->store->store_id }}</td>
                                <td>{{ $inventory->last_update }}</td>
                                <td>
                                    <form action="{{ route('inventories.destroy', $inventory->inventory_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('inventories.show', $inventory->inventory_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('inventories.edit', $inventory->inventory_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este inventario?')">Eliminar</button>
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