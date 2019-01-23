@extends('layouts.loginLay')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    <span class="login100-form-title">
        Inicia Sesión
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input id="usu_email" type="email" name="usu_email" value="{{ old('usu_email') }}" required class="input100" type="text" name="email" placeholder="Email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input class="input100" type="password" name="pass" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Login
        </button>
    </div>

    <div class="text-center p-t-12">
        <span class="txt1">
            Forgot
        </span>
        <a class="txt2" href="#">
            Password?
        </a>
    </div>
    <div class="text-center p-t-136">
    </div>
</form>
@endsection
