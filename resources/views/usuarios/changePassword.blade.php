@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('usuarios')}}" title="Regresar al listado" role="button">
	<i class="fa fa-reply" aria-hidden="true"></i>
</a></div>
<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h3>Cambiar contraseña</h3>			
				@include('includes.messages')				
		</div>
	</div>