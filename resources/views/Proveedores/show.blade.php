@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('proveedores/lista')}}" title="Regresar al listado" role="button">
	<i class="fa fa-reply" aria-hidden="true"></i> </a>
    <center><strong><h2>Proveedor {{$proveedor->prv_nombre}}</h2></strong></center>
</div>
@include('includes.messages')
<div class="row">
	<center><strong><h3>Datos</h3></strong></center>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Código: </label>						
			</div>
			<h4>{{ $proveedor->prv_codigo }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre: </label>						
			</div>
			<h4>{{ $proveedor->prv_nombre }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Descripción: </label>						
			</div>
			<h4>{{ $proveedor->prv_descripcion }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Identificación: </label>						
			</div>
			<h4>{{ $proveedor->prv_identificacion }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Tipo Id: </label>						
			</div>
			<h4>{{ $proveedor->prv_tipo_identificacion }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Dirección: </label>						
			</div>
			<h4>{{ $proveedor->prv_direccion }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Correo Electrónico: </label>						
			</div>
			<h4>{{ $proveedor->prv_email }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Teléfono: </label>						
			</div>
			<h4>{{ $proveedor->prv_telefono }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Celular: </label>						
			</div>
			<h4>{{ $proveedor->prv_celular }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Estado: </label>						
			</div>
			<h4><?php
			if ($proveedor->prv_estado==1) {
				echo ('Activo.');
			}else{
				echo ('Desactivo.');
			}
			?></h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Fecha de creación: </label>						
			</div>
			<h4>{{ $proveedor->prv_created_at }}.</h4>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">Fecha de modificación: </label>						
			</div>
			<h4>{{ $proveedor->prv_updated_at }}.</h4>
		</div>
</div>
@endsection