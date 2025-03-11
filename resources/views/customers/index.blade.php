@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Clientes</h3>
                    <a href="{{ route('customers.create') }}" class="btn btn-primary float-right">Nuevo Cliente</a>
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
                                <th>Email</th>
                                <th>Activo</th>
                                <th>Tienda</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->customer_id }}</td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->active ? 'Sí' : 'No' }}</td>
                                <td>{{ $customer->store->store_id }}</td>
                                <td>{{ $customer->last_update }}</td>
                                <td>
                                    <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('customers.show', $customer->customer_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('customers.edit', $customer->customer_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este cliente?')">Eliminar</button>
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