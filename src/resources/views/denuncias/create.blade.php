@extends('layouts.dashboa')

@section('head')
    <link href="{{ asset('css/customPersonas.css') }}" rel="stylesheet">
@endsection

@section('titulo')
ALP Learning | Denuncias
@endsection

@section('content')
<form class="user" action="{{ route('denuncias.store') }}" method="post" name="form-pers" autocomplete="off">
     
    {{ csrf_field() }}
    
        <div class="card mt-5 ml-5 mr-5">

            <div class="card-header">
               <strong>Registrar robo de vehículo</strong>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="nombre">Nombre</label>
                        <input type="text" class="form-control form-control-user" name="nombre" placeholder="Nombre de la persona" required value="{{ old('nombre') }}">
                        @foreach ($errors->get('nombre') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>

                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="apellido">Apellido</label>
                        <input type="text" class="form-control form-control-user" name="apellido" placeholder="Apellido de la persona" required value="{{ old('apellido') }}">
                       @foreach ($errors->get('apellido') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="dni">DNI</label>
                        <input type="number" class="form-control form-control-user no-spin" name="dni" placeholder="Ej:22222222" required value="{{ old('dni') }}">
                        @foreach ($errors->get('dni') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div> 
                   <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="telefono">Teléfono</label>
                        <input type="number" class="form-control form-control-user no-spin" name="telefono" placeholder="Ej: 3804666666" required value="{{ old('telefono') }}">
                        @foreach ($errors->get('telefono') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label class="ml-3 mb-1" for="barrio">Barrio</label>
                        <input type="text" class="form-control form-control-user" name="barrio" placeholder="Barrio" required value="{{ old('barrio') }}">
                        @foreach ($errors->get('barrio') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                    <div class="form-group col-md-5">
                        <label class="ml-3 mb-1" for="calle">Calle</label>
                        <input type="text" class="form-control form-control-user" name="calle" placeholder="Calle" value="{{ old('calle') }}">
                       @foreach ($errors->get('calle') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                    <div class="form-group col-md-2">
                        <label class="ml-3 mb-1" for="numero">Número</label>
                        <input type="number" class="form-control form-control-user no-spin" name="numero" placeholder="Nro" value="{{ old('numero') }}">
                        @foreach ($errors->get('numero') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>
              
                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="patente">Patente</label>
                        <input type="text" class="form-control form-control-user" name="patente" placeholder="Ej: AAA 111 o AA 111 AA" required value="{{ old('patente') }}">
                       @foreach ($errors->get('patente') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>

                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="fecha_hora">Fecha/Hora</label>
                        <input type="datetime-local" class="form-control form-control-user datetimepicker" name="fecha_hora" placeholder="Fecha" required value="{{ old('fecha_hora') }}">
                        @foreach ($errors->get('fecha_hora') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="ml-3 mb-1" for="description">Descripcción del vehículo </label>
                        <textarea class="form-control textarea" id="textArea" name="descripcion" rows="3" placeholder="Realice una breve descripción de su vehículo...." value="{{ old('descripcion') }}"></textarea>
                        @foreach ($errors->get('descripcion') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>

                <div class="row mt-3 mb-3 justify-content-center">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block btn-user">Guardar</button>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-danger btn-block btn-user" href="{{ route('denuncias.index') }}">Cancelar</a>
                    </div>
                </div>
            </div>

        </div>
    
</form>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection