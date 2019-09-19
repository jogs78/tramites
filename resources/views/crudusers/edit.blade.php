@extends('layouts.sistema')

@section('title', "Editar usuario")

@section('content')
    <div class="card">
        <h4 class="card-header">Editar usuario</h4>
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

    <form method="POST" action="{{ url("crudusers/{$user->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Juan" value="{{ old('name', $user->name) }}">

         <div class="form-group">
            <label for="lastname">Apellidos:</label>
            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="López Perez" value="{{ old('lastname', $user->lastname) }}">
         </div>

         <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="pedro@example.com" value="{{ old('email', $user->email) }}">    
         </div>
        
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Mayor a 6 caracteres">
        </div>

        <div class="form-group">
            <label for="numcontrol">Numero de control:</label>
            <input type="text" name="numcontrol" id="numcontrol" placeholder="Numero de control" class="form-control" value="{{ old('numcontrol', $user->numcontrol) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
    </form>
        </div>
    </div>
@endsection
