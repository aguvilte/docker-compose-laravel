@extends('layouts.dashboa')

@section('titulo')
Personas
@endsection

@section('content')
<form class="formulario" action="{{ action('PersonasRobadasController@save') }}" method="post" name="form-pers" autocomplete="off">
     
    {{ csrf_field() }}
    
        <div class="card mt-5 ml-5 mr-5">

            <div class="card-header">
                Agregar Persona
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la persona" required>
                    </div>
                
                    
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido de la persona" required>
                    </div>

                </div>

                <div class="row">
                
                    <div class="form-group col-md-6">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección de la persona" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono de la persona" required>
                    </div>

                </div>

                
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="patente">Patente</label>
                        <input type="text" class="form-control" name="patente" placeholder="Patente" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_hora">Fecha/Hora</label>
                        <input type="date" class="form-control" name="fecha_hora" placeholder="Fecha" required>
                    </div>

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