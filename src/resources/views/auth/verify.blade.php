@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center p-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tú E-Mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de iniciar sesión, por favor revise su email para verificar su cuenta.') }}
                    {{ __('Si no recibiste este email') }}, <a href="{{ route('verification.resend') }}">{{ __('click aquí') }}</a>.
                </div>
            </div>
        </div>
    </div>
@endsection
