@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Personal</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Ups!</strong> Hay algunos problemas con tus datos.<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('staffs.update', $staff->staff_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="first_name">Nombre:</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $staff->first_name) }}" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Apellido:</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $staff->last_name) }}" placeholder="Apellido">
                        </div>

                        <div class="form-group">
                            <label for="address_id">Dirección:</label>
                            <select name="address_id" class="form-control">
                                @foreach($addresses as $address)
                                    <option value="{{ $address->address_id }}" {{ $staff->address_id == $address->address_id ? 'selected' : '' }}>{{ $address->address }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="store_id">Tienda:</label>
                            <select name="store_id" class="form-control">
                                @foreach($stores as $store)
                                    <option value="{{ $store->store_id }}" {{ $staff->store_id == $store->store_id ? 'selected' : '' }}>{{ $store->store_id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="active">Activo:</label>
                            <select name="active" class="form-control">
                                <option value="1" {{ $staff->active ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ !$staff->active ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Nombre de Usuario:</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username', $staff->username) }}" placeholder="Nombre de Usuario">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        </div>

                        <div class="form-group text-right">
                            <a class="btn btn-secondary" href="{{ route('staffs.index') }}">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection