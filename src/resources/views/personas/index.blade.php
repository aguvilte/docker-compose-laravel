@extends('layouts.dashboa')

@section('titulo')
Personas
@endsection

@section('content')
<div class="central">
    
    <div class="row">

        <div class="col-md-2">
                <a href="{{ action('PersonasRobadasController@create') }}" class="btn btn-primary">
                    Agregar Persona
                </a>
        </div>

        <div class="col-md-4">
            <form  action="{{ action('PersonasRobadasController@index') }}" class="form-inline" method="get" autocomplete="off">
                <input class="form-control mr-sm-2" name="buscarnombre" type="text" placeholder="Buscar Persona">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>

    </div>
    
    <h4 class="text-center mb-3 mt-5">
        Personas Robadas
    </h4>

    <table id="tabla-prod" class="table table-hover container text-center tablesorter">

        <thead class="bg-primary text-light">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($personas as $persona)
            
            <tr>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>
                <td>{{ $persona->direccion }}</td>
                <td>{{ $persona->telefono }}</td>
                <td>
                    <a href="{{ action('PersonasRobadasController@edit',['id' => $persona->id] ) }}">
                        <i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table> <!--Fin de tabla productos-->

    <!--PAGINACIÓN-->
    <div class="row justify-content-center align-items-center">
        {{ $personas->appends(['persona' => Request::get('nombre')])->links() }}
    </div>
    
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection