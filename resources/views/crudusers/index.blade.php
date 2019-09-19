@extends('layouts.sistema')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('crudusers.create') }}" class="btn btn-primary">Nuevo usuario</a>
        </p>
    </div>

    @if ($users->isNotEmpty())
    <table class="table" id="tbl" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th scope="col">Numero de Control</th>
            <th scope="col">Habilitar o Deshabilitar Usuario</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr @if($user->activo!=1) class="text-warning" @endif >
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->rol }}</td>
            <td>{{ $user->numcontrol }}</td>
            <td>
                <a href="/crudusers/habilitar/{{ $user->id }}">Habilitar Usuario</a>
                <a href="/crudusers/deshabilitar/{{ $user->id }}">/Deshabilitar Usuario</a>
            </td>
            <td>
                <form action="{{ route('crudusers.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <a href="{{ route('crudusers.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @else
        <p>No hay usuarios registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection
