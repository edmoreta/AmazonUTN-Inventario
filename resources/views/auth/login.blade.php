@extends('layouts.loginLay')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    <span class="login100-form-title">
        AMAZON UTN
    </span>
    @csrf
    @if ($errors->has('usu_email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('usu_email') }}</strong>
            </span>
    @endif
    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input id="usu_email" type="email" placeholder="Correo electrónico" class="input100 form-control{{ $errors->has('usu_email') ? ' is-invalid' : '' }}" name="usu_email" value="{{ old('usu_email') }}" required autofocus>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
        
    </div>
    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input id="password" type="password" placeholder="Contraseña" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>    
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    </div>
    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <div align="center">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Recuérdame') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            {{ __('Iniciar sesión') }}
        </button>
    </div>
   
    <div class="text-center p-t-136">
    </div>
</form>
@endsection
