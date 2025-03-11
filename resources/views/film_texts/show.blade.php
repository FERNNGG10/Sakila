@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detalles del Texto de Película</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>ID:</strong>
                        {{ $filmText->film_id }}
                    </div>

                    <div class="form-group">
                        <strong>Título:</strong>
                        {{ $filmText->title }}
                    </div>

                    <div class="form-group">
                        <strong>Descripción:</strong>
                        {{ $filmText->description }}
                    </div>

                    <div class="form-group text-right">
                        <a class="btn btn-primary" href="{{ route('film-texts.edit', $filmText->film_id) }}">Editar</a>
                        <a class="btn btn-secondary" href="{{ route('film-texts.index') }}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection