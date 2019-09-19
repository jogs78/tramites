@extends('layouts.home')
@section('title', 'seguimiento', 'tramite')
@section('content')

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
    </div>

    @if ($seguimiento->isNotEmpty())

    <table class="table" id="tbl" class="table table-striped table-bordered" style="width:100%">

        <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Quién hizo el seguimiento</th>
            <th scope="col">Lugares en los que ha pasado</th>
            <th scope="col">Momento</th>
            <th scope="col">Direccion</th>
            <!--<th scope="col">Acciones</th>-->
        </tr>
        </thead>
        <tbody>
        @foreach($seguimiento as $tramite)
        <tr>
            <th scope="row">{{ $tramite->id }}</th>
            <td >{{ $tramite->userTramite->name }}</td>
            <td >{{ $tramite->lugarTramite->Descripcion }}</td>
            <td >{{ $tramite->momento }}</td>
            <td >{{ $tramite->direccion }}</td>
             <!--<td>
                <form action="{{ route('crudseguimiento.destroy', $tramite) }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>

                </form>

            </td>-->

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