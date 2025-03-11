@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Personal</h3>
                    <a href="{{ route('staffs.create') }}" class="btn btn-primary float-right">Nuevo Personal</a>
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
                                <th>Dirección</th>
                                <th>Tienda</th>
                                <th>Activo</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staffs as $staff)
                            <tr>
                                <td>{{ $staff->staff_id }}</td>
                                <td>{{ $staff->first_name }}</td>
                                <td>{{ $staff->last_name }}</td>
                                <td>{{ $staff->address->address }}</td>
                                <td>{{ $staff->store->store_id }}</td>
                                <td>{{ $staff->active ? 'Sí' : 'No' }}</td>
                                <td>{{ $staff->last_update }}</td>
                                <td>
                                    <form action="{{ route('staffs.destroy', $staff->staff_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('staffs.show', $staff->staff_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('staffs.edit', $staff->staff_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este personal?')">Eliminar</button>
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