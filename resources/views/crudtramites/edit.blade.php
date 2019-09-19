@extends('layouts.sistema')

@section('title', "Editar tramite")

@section('content')
    <div class="card">
        <h4 class="card-header">Editar el nombre del tramite</h4>
        <div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los errores debajo:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url("crudtramites/{$tramite->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Trámite:</label>
            <input type="text" name="nombre" class="form-control" id="nombre"  value="{{ old('nombre', $tramite->nombre) }}">
        </div>

         
        <button type="submit" class="btn btn-primary">Actualizar trámite</button>
    </form>
        </div>
    </div>
@endsection
