<!-- resources/views/actors/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear Actor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('actors.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> ¡Ups!</h5>
                            Hay algunos problemas con tus datos:
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ingrese nombre" value="{{ old('first_name') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ingrese apellido" value="{{ old('last_name') }}">
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('actors.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection