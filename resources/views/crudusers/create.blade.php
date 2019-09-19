@extends('layouts.sistema')

@section('title', "Crear usuario")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear usuario</h4>
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

            <form method="POST" action="{{ url('crudusers') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Pedro " value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="lastname">Apellidos:</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="López Perez" value="{{ old('lastname') }}">
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 6 caracteres">
                </div>

                <div class="form-group">
                    <label for="numcontrol">Numero de control:</label>
                    <input type="text" class="form-control" name="numcontrol" id="numcontrol" placeholder="Numero de control" value="{{ old('numcontrol') }}">
                </div>

                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </form>
        </div>
    </div>
@endsection
