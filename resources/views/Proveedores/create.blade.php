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
				<input type="text" name="codigo" value="{{ 'PRV-'.$cod }}" disabled class="form-control">
			</div>
		</div>
	</div>		
			<div class="row">								
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_nombre">Nombre</label> <label for="prv_nombre" style="color:red">*</label>
						<input type="text" name="prv_nombre" maxlength="100" value="{{old('prv_nombre')}}" required class="form-control" placeholder="Nombre...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_direccion">Dirección</label> <label for="prv_direccion" style="color:red">*</label>
						<input type="text" name="prv_direccion" maxlength="100" required value="{{old('prv_direccion')}}" class="form-control" placeholder="Dirección...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_email">Correo Electrónico</label><label for="prv_email" style="color:red">*</label>
						<input type="email" name="prv_email" maxlength="50" value="{{old('prv_email')}}" required class="form-control" placeholder="E-mail...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_descripcion">Descripción</label>
						<input type="text" name="prv_descripcion" maxlength="100" value="{{old('prv_descripcion')}}" class="form-control" placeholder="Descripción...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_telefono">Teléfono</label>
						<input type="text" name="prv_telefono" maxlength="10" pattern="[0-9]+" value="{{old('prv_telefono')}}" class="form-control" placeholder="Teléfono...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_identificacion">Identificación</label><label for="prv_identificacion" style="color:red">*</label>
						<input type="text" name="prv_identificacion" maxlength="13" pattern="[0-9]+" value="{{old('prv_identificacion')}}" required class="form-control" placeholder="Identificación...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_celular">Celular</label>
						<input type="text" name="prv_celular" maxlength="10" pattern="[0-9]+" value="{{old('prv_celular')}}" class="form-control" placeholder="Celular...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_tipo_identificacion">Tipo Identificación</label><label for="prv_tipo_identificacion" style="color:red">*</label>
						<select name="prv_tipo_identificacion" class="form-control">
							<option value="CI">CI</option>
							<option value="RUC">RUC</option>
						</select>
					</div>
				</div>

				<input type="hidden" name="prv_codigo" value="{{ 'PRV-'.$cod }}">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Crear</button>
						<a class="btn btn-danger" href="{{url('proveedores/lista')}}">Cancelar</a>
					</div>
				</div>
			</div>
			{!!Form::close()!!}		
@endsection