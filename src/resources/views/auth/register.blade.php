@extends('layouts.admin')
@section('content')
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6  col-md-6" >
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Crea una cuenta</h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Nombre"
                      name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" id="lastname" placeholder="Apellido"
                        name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Nombre de usuario"
                      name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" 
                      placeholder="Correo electónico" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" 
                        name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Contraseña">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <input type="password"  class="form-control form-control-user" id="password-confirm" placeholder="Repetir contraseña"
                        name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Registrarte</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection