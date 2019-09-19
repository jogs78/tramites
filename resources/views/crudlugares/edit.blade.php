@extends('layouts.sistema')

@section('title', "Editar lugar")

@section('content')
    <div class="card">
        <h4 class="card-header">Editar la descripción del lugar</h4>
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

    <form method="POST" action="{{ url("crudlugares/{$lugar->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="Descripcion">Lugar:</label>
            <input type="text" name="Descripcion" class="form-control" id="Descripcion"  value="{{ old('Descripcion', $lugar->Descripcion) }}">
        </div>

         
        <button type="submit" class="btn btn-primary">Actualizar lugar</button>
    </form>
        </div>
    </div>
@endsection
