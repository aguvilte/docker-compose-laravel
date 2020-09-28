@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center p-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Cambiar contraseña') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="user">
                            @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <div class="col-md-8" style="margin-right:auto; margin-left:auto;">
                                <label for="email" class="col-md-8 col-form-label text-md-left">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8" style="margin-right:auto; margin-left:auto;">
                                <label for="password" class="col-md-8 col-form-label text-md-left">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8" style="margin-right:auto; margin-left:auto;">
                                <label for="password-confirm" class="col-md-8 col-form-label text-md-left">{{ __('Confirmar contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin-left:8rem;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
