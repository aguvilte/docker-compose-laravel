@extends('layouts.dashboa')

@section('titulo')
ALP-LEARNING | Notificación
@endsection

@section('content')
     <div class="row d-flex justify-content-end mr-5 ">
        <a class="btn btn-primary" href={{ route('indexNotificaciones') }}>Volver a Notificaciones</a>
    </div>
    <div class="d-flex mt-4" >
        <div class="row vw-100  justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header ">
                        <div class="row justify-content-between">
                            <div class=>
                                {{__('notificacion.all')}}
                            </div>
                            <div>
                                @if ($robo->estado == $estado)
                                    {{__('notificacion.estado')}}<span class="badge rounded-pill bg-warning text-dark">{{ $robo->estado }}</span>    
                                @else
                                    {{__('notificacion.estado')}}<span class="badge rounded-pill bg-success ">{{ $robo->estado }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <h6 class="card-title small">Detalles de la notificación</h6>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5> Patente</h5>
                                <h5 class="ml-3"><strong>{{ $robo->numero_patente }}</strong></h5> 
                            </div>
                            <div class="col-md-6">
                                <h5> Precisión de detección</h5>
                                <h5 class="ml-3"><strong>{{ $notificacion->data['precision'] }} %</strong></h5> 
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5> Modelo de la patente </h5>
                                <h5 class="ml-3"><strong>{{$notificacion->data['modelo_patente'] }}</strong></h5>
                            </div>
                            <div class="col-md-6">
                                <h5> Fecha de detección</h5>
                                <h5 class="ml-3"><strong>{{$notificacion->created_at->translatedFormat('l j \de F Y, H:i') }} hs.</strong></h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h5> Descripción del vehiculo </h5>
                                <h5 class="ml-3"><strong>{{$robo->descripcion }}</strong></h5>
                            </div>
                        </div>
                       
                        <hr class="sidebar-divider d-none d-md-block">
                        <h6 class="card-title small">Datos de la Persona que denuncio el vehiculo</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Nombre</h5> <h5 class="ml-3"><strong>{{ $robo->denuncia->nombre }}</strong></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Apellido</h5><h5 class="ml-3"> <strong>{{ $robo->denuncia->apellido }}</strong></h5>
                            </div>
                          
                        </div>
                         <div class="row mt-3">
                            <div class="col-md-6">
                                <h5> Teléfono</h5> <h5 class="ml-3"><strong>{{ $robo->denuncia->telefono }}</strong></h5>
                            </div>
                            <div class="col-md-6">
                                <h5> Fecha de la denuncia </h5>
                                <h5 class="ml-3"><strong>{{ $robo->fecha_hora }}</strong></h5>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection