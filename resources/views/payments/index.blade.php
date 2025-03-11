@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Pagos</h3>
                    <a href="{{ route('payments.create') }}" class="btn btn-primary float-right">Nuevo Pago</a>
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
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Monto</th>
                                <th>Fecha de Pago</th>
                                <th>Última Actualización</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->payment_id }}</td>
                                <td>{{ $payment->customer->first_name }} {{ $payment->customer->last_name }}</td>
                                <td>{{ $payment->staff->first_name }} {{ $payment->staff->last_name }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>{{ $payment->last_update }}</td>
                                <td>
                                    <form action="{{ route('payments.destroy', $payment->payment_id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('payments.show', $payment->payment_id) }}">Ver</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('payments.edit', $payment->payment_id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este pago?')">Eliminar</button>
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