@extends('layouts.sistema')

@section('title', 'lugares')

@section('content')


    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('crudlugares.create') }}" class="btn btn-primary">Nuevo Lugar</a>
        </p>
    </div>

    @if ($lugar->isNotEmpty())
    <table class="table" id="tbl" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($lugar as $lugares)
        <tr>
            <th scope="row">{{ $lugares->id }}</th>
            <td>{{ $lugares->Descripcion }}</td>
            <td>
                <form action="{{ route('crudlugares.destroy', $lugares) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <a href="{{ route('crudlugares.edit', $lugares) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay Lugares registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection