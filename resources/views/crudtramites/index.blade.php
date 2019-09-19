@extends('layouts.sistema')

@section('title', 'tramites','username')

@section('content')

<script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Desea seguir?"))
        {
            return true;
        }
        else
        {
            return false;
        }
     }
</script> 

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('crudtramites.create') }}" class="btn btn-primary">Nuevo Tramite</a>
        </p>
    </div>

    @if ($tramites->isNotEmpty())
    <table class="table" id="tbl" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr >
            <th scope="col">#</th>
            <th scope="col">Tramites</th>
            <th scope="col">Creó</th>
            <th scope="col">Status</th>
            <th scope="col">Cambiar Estado del Trámite</th>
            <th scope="col">Historico</th>
            <th scope="col">Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($tramites as $tramite)
        <tr @if($tramite->status!='Pendiente') class="text-warning" @endif >
            <th scope="row">{{ $tramite->id }}</th>
            <td>{{ $tramite->nombre }}</td>
            <td>{{ $tramite->userTramite->name }}</td>
            <td>{{ $tramite->status }}</td>
            <td>
                <a onclick="confirmation()" href="/crudtramites/cambiar/{{ $tramite->id }}">Poner trámite en pendiente</a>
                <a onclick="confirmation()" href="/crudtramites/deshabilitar/{{ $tramite->id }}">/Finalizar Trámite </a>
            </td>
            <td>
                <a href="/crudtramites/ver/{{ $tramite->id }}" class="btn btn-link"><span class="oi oi-eye"></span>

            </td>
            <td>
                <form action="{{ route('crudtramites.destroy', $tramite) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <a href="{{ route('crudtramites.edit', $tramite) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
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