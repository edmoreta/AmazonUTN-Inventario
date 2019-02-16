@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3><center>Productos</center></h3>
		
		<a class="btn btn-success" href="{{ url('productos/create') }}" >Nuevo</a>		
		
	</div>
</div>
<br>
<div class="row">
	{!! Form::open(array('url' => 'productos/search', 'method' => 'GET')) !!}
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="input-group">
				<input type="search" name="buscar" class="form-control" value="{{request('buscar')}}"/>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-success">Buscar</button>
				</span>
			</div>
		</div>
	{!! Form::close() !!}
</div>
<div class="row">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
		@include('includes.messages')
	</div>
</div>
<div class="row">		
	<a class="btn btn-link {{strpos(Request::fullUrl(), 'productos?display=all') ? 'disabled' : ''}}" href="{{url('productos?display=all')}}">Todos</a> | 
	<a class="btn btn-link {{strpos(Request::fullUrl(), 'productos?display=activos') ? 'disabled' : ''}}" href="{{URL::action('ProductoController@index',['display'=>'activos'])}}">Activos</a> | 
	<a class="btn btn-link {{strpos(Request::fullUrl(), 'productos?display=inactivos') ? 'disabled' : ''}}" href="{{URL::action('ProductoController@index',['display'=>'inactivos'])}}">Inactivos</a>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th style="width:130px">Opciones</th>                    
                    <th>Estado</th>
                    <th>Código</th>					
					<th>Nombre</th>
					<th>Costo</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Fecha de creación</th>
					<th>Última modificación</th>                    
				</thead>
				@if(isset($productos))
					@foreach ($productos as $pro)
					<tr>
						<td>														
							<a href="{{route('productos.edit',$pro->pro_id)}}"><button class="btn btn-success">Editar</button></a>
						</td>						
						@if($pro->pro_estado)						
							<td>Activo</td>
						@else
							<td>Inactivo</td>
						@endif
						<td>{{ $pro->pro_codigo }}</td>						
						<td>{{ $pro->pro_nombre }}</td>
						<td>$ {{ $pro->pro_costo }}</td>
						<td>$ {{ $pro->pro_precio }}</td>
						<td>{{ $pro->pro_stock }}</td>
						<td>
							@if($pro->pro_foto == null)
								-								
							@else
								{{-- <img src="{{\Storage::url($pro->pro_foto)}}" style="max-width:75px;"> --}}
								<img src="{{ "data:image/" . $pro->pro_fototype . ";base64," . $pro->pro_foto }}" style="max-width:75px;">
							@endif
						</td>
						<td>{{ $pro->pro_created_at }}</td>
						<td>{{ $pro->pro_updated_at }}</td>	                    					
					</tr>		
					@endforeach
				@endif
			</table>
		</div>
		{{$productos->render()}}
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<select style="width:70px" name="formal" class="form-control" onchange="javascript:handleSelect(this)">
					<option value="productos?pag=7"<?php 
						if ($pag=='7') {
							echo 'selected';
						}?>>7</option>
						<option value="productos?pag=15"<?php 
						if ($pag=='15') {
							echo 'selected';
						}?>>15</option>
						<option value="productos?pag=25"<?php 
						if ($pag=='25') {
							echo 'selected';
						}?>>25</option>
						<option value="productos?pag=50"<?php 
						if ($pag=='50') {
							echo 'selected';
						}?>>50</option>
						<option value="productos?pag=100"<?php 
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
@endsection