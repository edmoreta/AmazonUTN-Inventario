@extends ('layouts.inicio')
@section('contenido')
<div class="card-header"> 
    <a class="btn btn-success" href="{{route('Config')}}" title="Regresar al listado" role="button">
	    <i class="fa fa-reply" aria-hidden="true"></i>
    </a>
</div>
<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h3>Cambiar contraseña</h3>			
		</div>
</div>
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        @include('includes.messages')
    </div>
</div>
{!! Form::open(['url' => 'User/update_password','method' => 'POST']) !!}					
<div class="row">	
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="password_now">Contraseña actual:</label><label for="password_now" style="color:red">*</label>
            <input required type="password" class="form-control" id="password_now" name="password_now" minlength="8" maxlength="25">
        </div>
    </div>	    
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="password">Nueva contraseña:</label><label for="password" style="color:red">*</label>
            <input required type="password" class="form-control" id="password" name="password" minlength="8" maxlength="25">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="password_confirmed">Repetir nueva contraseña:</label><label for="password_confirmed" style="color:red">*</label>
            <input required type="password" class="form-control" id="password_confirmed" name="password_confirmation" minlength="8" maxlength="25">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <a class="btn btn-danger" href="{{route('Config')}}">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </div>
</div>
{!! Form::close() !!}  
@endsection