@extends('layouts.dashboa')

@section('titulo')
ALP-LEARNING
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
             Datos de la Patente
        </div>

        <div class="card-body">
           <div class="row">

            <div class="col-md-6 pl-5">
                <br><br>
                
                <p><strong>Número de patente: </strong> {{ $datos_patente->numero_patente }}</p>
                <p><strong>Tipo de vehículo: </strong> {{ $datos_patente->tipo_vehiculo }}</p>
                <p><strong>Región: </strong> {{ $datos_patente->region }}</p>
                <p><strong>Porcentaje de precisión: </strong> {{ $datos_patente->precision }}%</p>
            
            </div>

            <?php $ruta_imagen = 'upload/'.$datos_patente->ruta_imagen; ?>

            <div class="col-md-6" align="center">
                <br>
                <img src= "{{ asset($ruta_imagen) }}" class="rounded" width="250px" height="250px" alt="Imagen de patente">
            </div>

        </div>
        
    </div>

    <br><br>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection