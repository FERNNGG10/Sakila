@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detalles del Personal</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>ID:</strong>
                        {{ $staff->staff_id }}
                    </div>

                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $staff->first_name }}
                    </div>

                    <div class="form-group">
                        <strong>Apellido:</strong>
                        {{ $staff->last_name }}
                    </div>

                    <div class="form-group">
                        <strong>Dirección:</strong>
                        {{ $staff->address->address }}
                    </div>

                    <div class="form-group">
                        <strong>Tienda:</strong>
                        {{ $staff->store->store_id }}
                    </div>

                    <div class="form-group">
                        <strong>Activo:</strong>
                        {{ $staff->active ? 'Sí' : 'No' }}
                    </div>

                    <div class="form-group">
                        <strong>Nombre de Usuario:</strong>
                        {{ $staff->username }}
                    </div>

                    <div class="form-group">
                        <strong>Última Actualización:</strong>
                        {{ $staff->last_update }}
                    </div>

                    <div class="form-group text-right">
                        <a class="btn btn-primary" href="{{ route('staffs.edit', $staff->staff_id) }}">Editar</a>
                        <a class="btn btn-secondary" href="{{ route('staffs.index') }}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection