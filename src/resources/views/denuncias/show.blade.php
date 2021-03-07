@extends('layouts.dashboa') 

@section('titulo')
ALP Learning | Denuncias
@endsection

@section('content')
    <div class="row d-flex justify-content-end mr-5 ">
        <a class="btn btn-primary" href={{ route('denuncias.index') }}>Volver</a>
    </div>
    <div class="d-flex mt-4" >
        <div class="row vw-100  justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header ">
                        <div class="row justify-content-between">
                            <div class=>
                                {{__('denuncias.denuncia')}}{{ $denuncia->robo->id }}
                            </div>
                            <div>
                                @if ($denuncia->robo->estado == $estado)
                                    <span class="badge rounded-pill bg-warning text-dark">{{ $denuncia->robo->estado }}</span>    
                                @else
                                    {{__('denuncias.estado')}}<span class="badge rounded-pill bg-success ">{{ $denuncia->robo->estado }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <h6 class="card-title small">Datos de la Persona</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Nombre</h5> <h5 class="ml-3"><strong>{{ $denuncia->nombre }}</strong></h5>
                            </div>
                            <div class="col-md-4">
                                <h5>Apellido</h5><h5 class="ml-3"> <strong>{{ $denuncia->apellido }}</strong></h5>
                            </div>
                            <div class="col-md-4">
                                <h5> Teléfono</h5> <h5 class="ml-3"><strong>{{ $denuncia->telefono }}</strong></h5>
                            </div>
                        </div>
                        <hr class="sidebar-divider d-none d-md-block">
                        <h6 class="card-title small">Datos del vehiculo</h6>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5> Patente</h5>
                                <h5 class="ml-3"><strong>{{ $denuncia->robo->numero_patente }}</strong></h5> 
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h5> Descripción del vehiculo </h5>
                                <h5 class="ml-3"><strong>{{$denuncia->robo->descripcion }}</strong></h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h5> Fecha de registro </h5>
                                <h5 class="ml-3"><strong>{{ $denuncia->robo->fecha_hora }}</strong></h5>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    @include('layouts.footer')
@endsection