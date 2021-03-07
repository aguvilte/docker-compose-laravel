@extends('layouts.dashboa')

@section('titulo')
ALP-LEARNING | Notificación
@endsection

@section('content')
    <div class="row d-flex justify-content-end mr-5 mb-5">
        <a href="{{ route('indexNotificaciones') }}" class="btn btn-primary ">Volver al listado</a>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header primary">
                <h4 class="card-title">Datos de la notificación</h4>
                </div>
                <div class="card-body">
                    
                    <ul>
                        <li>Número de patente: {{ $notificacion->data['numero_patente'] }}</li>
                        <li>Modelo de la patente: {{$notificacion->data['modelo_patente']}}</li>
                        <li>Precisión de reconocimiento: {{ $notificacion->data['precision'] }} %</li>
                        <li>Fecha y hora: {{ $notificacion->created_at->translatedFormat('l j \de F Y, H:i')}}</li>
                    </ul>
                    
                    <div class="row mt-5 mb-2">
                        <a href="{{ route('noti-detalles', $notificacion->id) }}" class="btn btn-primary btn-user btn-block">Ver más detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
