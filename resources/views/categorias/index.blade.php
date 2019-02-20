@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3><center>Categorías</center></h3>
		
		<a class="btn btn-success" href="#" data-target="#modalCreate" 
			data-name="{{ $cod }}" data-cats="{{ $cats }}" 
			data-action="{{url('categorias/store')}}" data-toggle="modal">Nuevo</a>
		{{-- @include('categorias.search') --}}
		@include('categorias.create')
		@include('categorias.edit')
	</div>
</div>
<br>
<div class="row">
	{!! Form::open(array('url' => 'categorias/search', 'method' => 'GET')) !!}
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
	<a class="btn btn-link {{strpos(Request::fullUrl(), 'categorias?display=all') ? 'disabled' : ''}}" href="{{url('categorias?display=all')}}">Todos</a> | 
	<a class="btn btn-link {{strpos(Request::fullUrl(), 'categorias?display=activos') ? 'disabled' : ''}}" href="{{URL::action('CategoriaController@index',['display'=>'activos'])}}">Activos</a> | 
	<a class="btn btn-link {{strpos(Request::fullUrl(), 'categorias?display=inactivos') ? 'disabled' : ''}}" href="{{URL::action('CategoriaController@index',['display'=>'inactivos'])}}">Inactivos</a>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th style="width:130px">Opciones</th>                    
                    <th>Estado</th>
                    <th>Código</th>
					<th>Categoría Superior</th>
					<th>Nombre</th>
					<th>Fecha de creación</th>
					<th>Última modificación</th>                    
				</thead>
				@if(isset($categorias))
					@foreach ($categorias as $cat)
					<tr>
						<td>							
							{{-- <a href="{{URL::action('CategoriaController@show',$cat->cat_id)}}"><button class="btn btn-primary">Ver</button></a> --}}
							<a href="" data-target="#modalEdit" data-id="{{ $cat->cat_id }}" 
								data-codigo="{{ $cat->cat_codigo }}" data-nombre="{{ $cat->cat_nombre }}" 
								data-action="{{ route('categorias.update', $cat->cat_id) }}"
								data-codigop="{{ $cat->cat_codigop == null ? "":$cat->cat_codigop }}"
								data-estado="{{ $cat->cat_estado == true ? 1:0 }}"
								data-toggle="modal"><button class="btn btn-success">Editar</button></a>
						</td>						
						@if($cat->cat_estado)						
							<td>Activo</td>
						@else
							<td>Inactivo</td>
						@endif
						<td>{{ $cat->cat_codigo }}</td>
						@if($cat->categoriasuperior != null)
							<td>{{ $cat->categoriasuperior->cat_codigo }}</td>
						@else
							<td>{{ $cat->cat_codigop }}</td>
						@endif
						<td>{{ $cat->cat_nombre }}</td>
						<td>{{ $cat->cat_created_at }}</td>
						<td>{{ $cat->cat_updated_at }}</td>	                    					
					</tr>		
					@endforeach
				@endif
			</table>
		</div>
		{{$categorias->render()}}
		
	</div>
</div>
@endsection

@push('modals')
<script type="text/javascript">
	$(document).ready(function () {       
        $('#modalCreate').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);			
            var name = button.data('name');            
            var modal = $(this);
            modal.find(".modal-content #name").val(name);
        });
    });
    $(document).ready(function () {       
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
			var action = button.data('action');
            var id = button.data('id');
            var codigo = button.data('codigo');
            var codigop = button.data('codigop');
            var nombre = button.data('nombre');
            var estado = button.data('estado');
			var modal = $(this);
            modal.find(".modal-content #id").val(id);
            modal.find(".modal-content #codigo").val(codigo);
            modal.find(".modal-content #nombre").val(nombre);			
			modal.find(".modal-content form").attr('action', action);
			//console.log(codigopp);
			if (codigop != "") {				
				modal.find('#cat_codigop option[value='+codigop+']').prop('selected', true)
			} else {								
				modal.find('#cat_codigop option[value=-1]').prop('selected', true)
			}
			if (estado == 1) {
				modal.find('#cat_estado option[value=1]').prop('selected', true)
			} else {
				modal.find('#cat_estado option[value=0]').prop('selected', true)
			}
						
        });
    });
</script>
@endpush
