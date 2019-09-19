@extends('layouts.sistema')

@section('title', "Usuario {$user->id}")

@section('content')
    <h1>Usuario #{{ $user->id }}</h1>

    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Apellido del usuario: {{ $user->lastname }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>

    <p>
        <a href="{{ route('crudusers.index') }}">Regresar al listado de usuarios</a>
    </p>
@endsection