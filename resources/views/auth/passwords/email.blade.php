@extends('layouts.loginLay')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" class="login100-form validate-form" action="{{ route('password.email') }}">
    <span class="login100-form-title">
        Restablecer la contraseña
    </span>
    @csrf
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input id="usu_email" name="email"  type="email"  class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            {{ __('Enviar contraseña') }}
        </button>
    </div>
    <div class="text-center p-t-136">
    </div>
    <div class="text-center p-t-136">
    </div>
</form>
@endsection
