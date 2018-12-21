@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Proveedores <a href="{{ url('proveedores/create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Proveedores.search')
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
					<th>Código</th>
					<th>Nombre</th>
					<th>Identificación</th>
					<th>Tipo Id</th>
                    <th>Estado</th>
				</thead>
               @foreach ($proveedores as $pr)
				<tr>
					<td>
						<a href="{{URL::action('ProveedoresController@show',$pr->prv_id)}}"><button class="btn btn-primary">Ver</button></a>
						<a href="{{URL::action('ProveedoresController@edit',$pr->prv_id)}}"><button class="btn btn-success">Editar</button></a>
					</td>
					<td>{{ $pr->prv_codigo }}</td>
                    <td>{{ $pr->prv_nombre }}</td>
                    <td>{{ $pr->prv_identificacion }}</td>
                    <td>{{ $pr->prv_tipo_identificacion }}</td>	
                    <td><?php
                    if ($pr->prv_estado==1) {
                        ?>
                        <a href="" data-target="#modal-{{$pr->prv_id}}" data-name="{{$pr->prv_nombre}}" data-toggle="modal"><i class="fa fa-toggle-on" style="font-size:36px;color:green"></i></a>
                    <?php
                    }else{
                    ?>
                        <a href="{{ url('proveedores/estado/'.$pr->prv_id.'/t') }}"><i class="fa fa-toggle-off" style="font-size:36px;color:gray"></i></a>
                    <?php
                        }
                    ?>
                    </td>
					@include('Proveedores.modal')
				</tr>		
				@endforeach
			</table>
		</div>
		{{$proveedores->render()}}
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
				<div class="form-group">
						<select name="formal" class="form-control" onchange="javascript:handleSelect(this)">
								<option value="lista?pag=7"<?php 
								if ($pag=='7') {
									echo 'selected';
								}?>>7</option>
								<option value="lista?pag=15"<?php 
								if ($pag=='15') {
									echo 'selected';
								}?>>15</option>
								<option value="lista?pag=25"<?php 
								if ($pag=='25') {
									echo 'selected';
								}?>>25</option>
								<option value="lista?pag=50"<?php 
								if ($pag=='50') {
									echo 'selected';
								}?>>50</option>
								<option value="lista?pag=100"<?php 
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