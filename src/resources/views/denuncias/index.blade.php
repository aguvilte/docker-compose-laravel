@extends('layouts.dashboa')

@section('head')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('titulo')
ALP Learning | Denuncias
@endsection

@section('content')
 
    <div class="row mb-4 d-flex justify-content-end mr-2">
        <a href="{{ route('denuncias.create') }}" class="btn btn-primary btn-user">
            Crear Denuncia
        </a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h3>Listado de denuncias </h3>
        </div>
        <div class="card-body">
         <div class="table-responsive">
            <table id="dt-denuncias"  class="table hover text-center " style="width:100%">
        
                <thead class="bg-primary text-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($denuncias as $denuncia)
                    
                    <tr>
                        <td>{{ $denuncia->nombre }}</td>
                        <td>{{ $denuncia->apellido }}</td>
                        <td>{{ $denuncia->telefono }}</td>
                        @if ($denuncia->robo->estado === $estado)
                            <td> <span class="badge rounded-pill bg-warning text-dark">{{ $denuncia->robo->estado }}</span></td>    
                        @else
                            <td> <span class="badge rounded-pill bg-success ">{{ $denuncia->robo->estado }}</span></td>
                        @endif
                        
                        <td>{{ $denuncia->created_at }}</td>
                        <td>
                            <a class="mr-3" href="{{ route('denuncias.show',['id' => $denuncia->id]) }}">
                                <i class="far fa-eye"></i>
                            <a>
                            <a href="{{ route('denuncias.edit',['id' => $denuncia->id] ) }}">
                                <i class="fas fa-edit"></i>
                            </a>
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