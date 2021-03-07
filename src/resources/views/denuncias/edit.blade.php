@extends('layouts.dashboa')
@section('head')
    <link href="{{ asset('css/customPersonas.css') }}" rel="stylesheet">
@endsection

@section('titulo')
ALP Learning | Denuncias
@endsection

@section('content')
    <div class="row d-flex justify-content-between mr-5 ml-5">
        <div>
            <a class="btn btn-primary" href={{ route('denuncias.estado', $denuncia->id) }}>Cambiar de estado</a>
        </div>
        <div>
            <a class="btn btn-primary" href={{ route('denuncias.index') }}>Volver</a>
        </div>
    </div>

<form class="user" action="{{ route('denuncias.update', ['id' => $denuncia->id]) }}" method="post" name="form-pers" autocomplete="off">
     
    @if(isset($denuncia) && is_object($denuncia))
        @method('PUT')
    @endif
    
    {{ csrf_field() }}
    
        <div class="card mt-4 ml-5 mr-5">

            <div class="card-header">
                <strong>Editar Denuncia</strong>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="nombre">Nombre</label>
                        <input type="text" class="form-control form-control-user" name="nombre"  value="{{ $denuncia->nombre }}" required>
                        @foreach ($errors->get('nombre') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>

                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="apellido">Apellido</label>
                        <input type="text" class="form-control form-control-user" name="apellido" value="{{ $denuncia->apellido }}" required>
                        @foreach ($errors->get('apellido') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="dni">DNI</label>
                        <input type="number" class="form-control form-control-user no-spin" name="dni" value="{{ $denuncia->dni }}" required>
                         @foreach ($errors->get('dni') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="telefono">Teléfono</label>
                        <input type="number" class="form-control form-control-user no-spin" name="telefono" value="{{ $denuncia->telefono }}" required>
                        @foreach ($errors->get('telefono') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label class="ml-3 mb-1" for="barrio">Barrio</label>
                        <input type="text" class="form-control form-control-user" name="barrio" value="{{ $denuncia->direccion->barrio }}" required>
                        @foreach ($errors->get('barrio') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                    <div class="form-group col-md-5">
                        <label class="ml-3 mb-1" for="calle">Calle</label>
                        <input type="text" class="form-control form-control-user" name="calle"  value="{{ $denuncia->direccion->calle }}" >
                         @foreach ($errors->get('calle') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                    <div class="form-group col-md-2">
                        <label class="ml-3 mb-1" for="numero">Número</label>
                        <input type="number" class="form-control form-control-user no-spin" name="numero" value="{{ $denuncia->direccion->numero }}" >
                         @foreach ($errors->get('numero') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="patente">Patente</label>
                        <input type="text" class="form-control form-control-user" name="patente" value="{{ $denuncia->robo->numero_patente }}" required>
                        @foreach ($errors->get('patente') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>

                    <div class="form-group col-md-6">
                        <label class="ml-3 mb-1" for="fecha_hora">Fecha/Hora</label>
                        <input type="datetime-local" class="form-control form-control-user" name="fecha_hora" value ="{{date('Y-m-d\TH:i:s', strtotime( $denuncia->robo->fecha_hora))  }}" required>
                        @foreach ($errors->get('fecha_hora') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="ml-3 mb-1" for="description">Descripcción del vehículo </label>
                        <textarea class="form-control textarea" id="textArea" name="descripcion" rows="3" required>{{  $denuncia->robo->descripcion }}</textarea>
                        @foreach ($errors->get('descripcion') as $error)
                            <p class="error-span"><small><strong>{{ $error }}</strong></small></p>
                        @endforeach
                    </div>
                </div>
                <div class="row justify-content-center mt-4 mb-3">
                    <div class="form-group col-md-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-user btn-block ">Actualizar</button>
                    </div>
                    <div class="form-group col-md-4 mt-2">
                        <a class="btn btn-user btn-danger btn-block" href="{{ route('denuncias.index') }}">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection