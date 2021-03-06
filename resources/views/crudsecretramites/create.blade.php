@extends('layouts.home')



@section('title', "tramites")



@section('content')

    <div class="card">

        <h4 class="card-header">Crear tramiter</h4>

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



            <form method="POST" action="{{ url('crudsecretramites') }}">

                {{ csrf_field() }}



                <div class="form-group">

                    <label for="nombre">Nombre del Tramite:</label>

                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tramite " value="{{ old('nombre') }}">

                </div>



                



                <button type="submit" class="btn btn-primary">Crear tramite</button>

            </form>

        </div>

    </div>

@endsection