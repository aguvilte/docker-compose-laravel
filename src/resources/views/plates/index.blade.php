@extends('layouts.dashboa')

@section('titulo')
ALP-LEARNING | Patentes
@endsection

@section('content')
    <div class="buscador">
        <form  action="{{ action('PatentesController@index') }}" class="form-inline" method="get" autocomplete="off">
            <input class="form-control mr-sm-3" name="buscarpatente" type="text" placeholder="Número de Patente">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table text-center container ">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Número de patente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precision</th>
                    <th scope="col">Fecha y Hora</th>
                </tr>
            </thead>
            <tbody id="bodyTableMovimiento">
                @foreach ($patentes as $pat)
                <tr>
                    <td>{{ $pat->patente->numero }}</td>
                    <td>{{ $pat->patente->modelo }}</td>
                    <td>{{ $pat->precision }}</td>
                    <td>{{ $pat->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table><!--Fin de tabla productos-->
    </div>
    <!--PAGINACIÓN-->
    <div class="row justify-content-center align-items-center">
        {{ $patentes->appends(['buscarpatente' => Request::get('buscarpatente')])->links() }}
    </div>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
@section('javascript')
    <script src="{{ asset('js/echoChanel.js') }}"></script>
@endsection