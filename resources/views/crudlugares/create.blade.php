@extends('layouts.sistema')

@section('title', "Crear lugares")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear lugar</h4>
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

            <form method="POST" action="{{ url('crudlugares') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" class="form-control" name="Descripcion" id="Descripcion" placeholder="Descripcion " value="{{ old('Descripcion') }}">
                </div>

                

                <button type="submit" class="btn btn-primary">Crear Lugar</button>
            </form>
        </div>
    </div>
@endsection