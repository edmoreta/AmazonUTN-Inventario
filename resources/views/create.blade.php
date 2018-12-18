@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('proveedores/lista')}}" title="Regresar al listado" role="button">
	<i class="fa fa-reply" aria-hidden="true"></i>
</a></div>
	<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<h3>Nuevo Proveedor</h3>			
				@include('includes.messages')
		</div>
	</div>	
	{!! Form::open(['url' => 'proveedores','files'=>'true']) !!}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_codigo">Código</label>
						<input type="text" name="prv_codigo" required value="{{old('prv_codigo')}}" class="form-control" placeholder="Codigo...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_direccion">Dirección</label>
						<input type="text" name="prv_direccion" required value="{{old('prv_direccion')}}" class="form-control" placeholder="Dirección...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_nombre">Nombre</label>
						<input type="text" name="prv_nombre" value="{{old('prv_nombre')}}" required class="form-control" placeholder="Nombre...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_email">Correo Electrónico</label>
						<input type="text" name="prv_email" value="{{old('prv_email')}}" required class="form-control" placeholder="E-mail...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_descripcion">Descripción</label>
						<input type="text" name="prv_descripcion" value="{{old('prv_descripcion')}}" class="form-control" placeholder="Descripción...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_telefono">Teléfono</label>
						<input type="text" name="prv_telefono" value="{{old('prv_telefono')}}" class="form-control" placeholder="Teléfono...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_identificacion">Identificación</label>
						<input type="text" name="prv_identificacion" value="{{old('prv_identificacion')}}" required class="form-control" placeholder="Identificación...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_celular">Celular</label>
						<input type="text" name="prv_celular" value="{{old('prv_celular')}}" class="form-control" placeholder="Celular...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_tipo_identificacion">Tipo Identificación</label>
						<input type="text" name="prv_tipo_identificacion" value="{{old('prv_tipo_identificacion')}}" required class="form-control" placeholder="Tipo ID...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Crear</button>
						<a class="btn btn-danger" href="{{url('proveedores/lista')}}">Cancelar</a>
					</div>
				</div>
			</div>
			{!!Form::close()!!}		
@endsection