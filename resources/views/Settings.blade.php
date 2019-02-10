@extends ('layouts.inicio')
@section('contenido')
<div class="card-header"><a class="btn btn-primary" href="{{url('home')}}" title="Regresar al listado" role="button">
    <i class="fa fa-reply" aria-hidden="true"></i>
    </a>
</div>
        <div align="center">
        <h3>EDITAR INFORMACIÓN</h3>
        <img src="{{ asset('img/default.png') }}" width="150">
        </br>
        </br>
        </div>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                @include('includes.messages')
        </div>
    </div>
{!! Form::open(array('url'=>'User/Updates','method'=>'GET','autocomplete'=>'off')) !!}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_cedula">Nombres</label>
                <input type="text" disabled value="{{Auth::user()->usu_nombre}}"  class="form-control">
            </div>
        </div>	
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_telefono">Dirección</label>
                <input type="text" name="usu_direccion" maxlength="100" value="{{Auth::user()->usu_direccion}}" class="form-control" >
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_nombre">Apellidos</label>
                <input type="text" disabled value="{{Auth::user()->usu_apellido}}"  class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_celular">Email</label>
                <input type="email" name="usu_email" maxlength="50" value="{{Auth::user()->usu_email}}" required class="form-control" >
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_apellido">Cedula</label>
                <input type="text" disabled value="{{Auth::user()->usu_cedula}}"  class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_direccion">Teléfono</label>
                <input type="text" name="usu_telefono" maxlength="9" minlength="9" pattern="[0-9]+" value="{{Auth::user()->usu_telefono}}" class="form-control" >
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_fechaN">Fecha de nacimiento</label>
                <input type="text" disabled value="{{Auth::user()->usu_fechaN}}"  class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usu_email">Celular</label>
                <input type="text" name="usu_cedula" maxlength="10" minlength="10" pattern="[0-9]+" value="{{Auth::user()->usu_cedula}}" required class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <a class="btn btn-info" href="{{route('change_password')}}">Cambiar Contraseña</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <a class="btn btn-danger" href="{{url('home')}}">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </div>
{!! Form::close() !!}  
@endsection
