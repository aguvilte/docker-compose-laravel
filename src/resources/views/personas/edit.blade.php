@extends('layouts.dashboa')

@section('titulo')
Editar Persona
@endsection

@section('content')
<form class="formulario" action="{{ action('PersonasRobadasController@update', ['id' => $persona->id]) }}" method="post" name="form-pers" autocomplete="off">
     
    @if(isset($persona) && is_object($persona))
        @method('PUT')
    @endif
    
    {{ csrf_field() }}
    
        <div class="card mt-5 ml-5 mr-5">

            <div class="card-header">
                Editar Persona
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la persona" value="{{ $persona->nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Apellido de la persona" value="{{ $persona->apellido }}" required>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección de la persona" value="{{ $persona->direccion }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono de la persona" value="{{ $persona->telefono }}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="id_patente">Patente</label>
                    <input type="text" class="form-control" name="id_patente" placeholder="Patente" value="{{ $robo->id_patente }}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="fecha_hora">Fecha/Hora</label>
                    <input type="date" class="form-control" name="fecha_hora" placeholder="Fecha" value ="{{ $robo->fecha_hora }}" required>
                </div>
            </div>
        </div>
        <div class="guardar-cancelar text-center mt-3">
            <button type="submit" class="btn btn-primary boton mt-4 mb-4">Guardar</button>
            <a class="btn btn-danger mt-4 ml-2 mb-4" href="{{ action('PersonasRobadasController@index') }}">Cancelar</a>
        </div>
    </form>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection