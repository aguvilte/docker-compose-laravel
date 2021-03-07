@extends('layouts.dashboa')

@section('head')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('titulo')
ALP-LEARNING | Notificación
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h3>Listado de notificaciones </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table hover text-center" id="dt-table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scope="col">Número de patente</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Precisión</th>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notificaciones as $notificacion)
                    <tr>
                        <td>
                            {{ $notificacion->data['numero_patente'] }}
                        </td>
                        
                        <td>
                            {{ $notificacion->data['modelo_patente'] }}
                        </td>
                       
                        <td>
                            {{ $notificacion->data['precision'] }}
                        </td>
                        <td>
                            {{ $notificacion->created_at }}
                        </td>
                        
                        <td>
                            <a href="{{ url("/notificaciones/show/{$notificacion->id}") }}"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>     
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>   
    <script src="{{ asset('js/dataTable.js') }}"></script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
