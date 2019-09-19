@extends('layouts.sistema')

@section('title', 'seguimiento')

@section('content')


    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>

    </div>

    @if ($seg->isNotEmpty())
    <table class="table" id="tbl" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tramite</th>
            <th scope="col">Quién</th>
            <th scope="col">Lugar</th>
            <th scope="col">Momento</th>
            <th scope="col">Direccion</th>
            <th scope="col">Acciones</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($seg as $seguimiento)
 
        <tr>
            <th scope="row">{{ $seguimiento->id }}</th>
            <td >{{ $seguimiento->tramite_seguir }}</td>
            <td >{{ $seguimiento->quien }}</td>
            <td >{{ $seguimiento->lugar }}</td>
            <td >{{ $seguimiento->momento }}</td>
            <td >{{ $seguimiento->direccion }}</td>
            <td>
                <form action="{{ route('crudseguimiento.destroy', $seguimiento) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay seguimientos realizados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection