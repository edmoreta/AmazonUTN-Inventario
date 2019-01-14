@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Usuarios <a href="{{url('usuarios/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('usuarios.search')
	</div>
		</div>
<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				@include('includes.messages')
		</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
		
		
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th style="width:130px">Opciones</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Cedula</th>
					<th>Email</th>
					<th>Estado</th>
                    <th>Rol</th>
				</thead>
				<tbody>
				@foreach ($usuarios as $u)
					<tr>
						<td>
							<a href="{{URL::action('UserController@edit',$u->usu_id)}}"><button class="btn btn-success">Editar</button></a>
						</td>
						<td>{{$u->usu_nombre}}</td>
						<td>{{$u->usu_direccion}}</td>
						<td>{{$u->usu_cedula}}</td>
						<td>{{$u->usu_email}}</td>
							@if($u->usu_estado)
							<?php
								$estado='activo';
							?>
							@elseif(!$u->usu_estado)
							<?php
								$estado='inactivo';
							?>
							@endif
							<td>{{$estado}}</td>
                        <td>
                            {{$u->display_name}}
                        </td>
					</tr>		
				@endforeach
				</tbody>
			</table>
		</div>
		{{$usuarios->render()}}
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
						<select style="width:70px" name="formal" class="form-control" onchange="javascript:handleSelect(this)">
							<option value="usuarios?pag=7"<?php 
								if ($pag=='7') {
									echo 'selected';
								}?>>7</option>
								<option value="usuarios?pag=15"<?php 
								if ($pag=='15') {
									echo 'selected';
								}?>>15</option>
								<option value="usuarios?pag=25"<?php 
								if ($pag=='25') {
									echo 'selected';
								}?>>25</option>
								<option value="usuarios?pag=50"<?php 
								if ($pag=='50') {
									echo 'selected';
								}?>>50</option>
								<option value="usuarios?pag=100"<?php 
								if ($pag=='100') {
									echo 'selected';
								}?>>100</option>
						</select>
				</div>
			</div>
	</div>
</div>
@endsection
@section ('script')
<script type="text/javascript">
	function handleSelect(elm){
		window.location = elm.value+"";
	}
</script>