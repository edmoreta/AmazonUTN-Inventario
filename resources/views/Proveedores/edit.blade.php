@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('proveedores')}}" title="Regresar al listado" role="button">
	<i class="fa fa-reply" aria-hidden="true"></i>
</a></div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h3>Editar proveedor</h3>			
				@include('includes.messages')				
		</div>
	</div>	
	{!!Form::model($proveedor,['method'=>'PATCH','route'=>['proveedores.update',$proveedor->prv_id], 'files'=>'true'])!!}      
	{{Form::token()}}
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="prv_codigo">Código</label>
							<input type="text" name="codigo" disabled required value="{{ $proveedor->prv_codigo }}" class="form-control">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="prv_codigo">Estado</label>
							<select name="prv_estado" class="form-control">
								<option value="t" <?php 
								if ($proveedor->prv_estado==1) {
									echo 'selected';
								}?>>Activo</option>
								<option value="f" <?php 
								if ($proveedor->prv_estado==0) {
									echo 'selected';
								}?>>Inactivo</option>
						</select>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="prv_nombre">Nombre</label> <label for="prv_nombre" style="color:red">*</label>
						<input type="text" name="prv_nombre" maxlength="100" value="{{ $proveedor->prv_nombre }}" required class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="prv_direccion">Dirección</label> <label for="prv_direccion" style="color:red">*</label>
						<input type="text" name="prv_direccion" maxlength="100" required value="{{ $proveedor->prv_direccion }}" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="prv_email">Correo Electrónico</label><label for="prv_email" style="color:red">*</label>
						<input type="email" name="prv_email" maxlength="50" value="{{ $proveedor->prv_email }}" required class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_descripcion">Descripción</label>
						<input type="text" name="prv_descripcion" maxlength="100" value="{{ $proveedor->prv_descripcion }}" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="prv_tipo_identificacion">Tipo Identificación</label><label for="prv_tipo_identificacion" style="color:red">*</label>
						<select name="prv_tipo_identificacion" class="form-control">
							<option value="CI" <?php 
							if ($proveedor->prv_tipo_identificacion=='CI') {
								echo 'selected';
							}?>>CI</option>
							<option value="RUC" <?php 
							if ($proveedor->prv_tipo_identificacion=='RUC') {
								echo 'selected';
							}?>>RUC</option>
							<option value="RISE" <?php 
							if ($proveedor->prv_tipo_identificacion=='RISE') {
								echo 'selected';
							}?>>RISE</option>
						</select>
					</div>
				</div>				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="prv_identificacion">Identificación</label><label for="prv_identificacion" style="color:red">*</label>
						<input type="text" name="prv_identificacion" maxlength="13" pattern="[0-9]+" value="{{ $proveedor->prv_identificacion }}" required class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_celular">Celular</label>
						<input type="text" name="prv_celular" maxlength="10" pattern="[0-9]+" value="{{ $proveedor->prv_celular }}" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="prv_telefono">Teléfono</label>
						<input type="text" name="prv_telefono" maxlength="9" pattern="[0-9]+" value="{{ $proveedor->prv_telefono }}" class="form-control">
					</div>
				</div>

				<input type="hidden" name="prv_codigo" value="{{ $proveedor->prv_codigo }}">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<a class="btn btn-danger" href="{{url('proveedores')}}">Cancelar</a>
							<button class="btn btn-primary" type="submit">Guardar</button>
						</div>
					</div>
				</div>
			</div>
			{!!Form::close()!!}		
@endsection