@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3><center>Categorías</center></h3>
		{{-- <a href="{{ url('categorias/create') }}"><button class="btn btn-success">Nuevo</button></a> --}}
	<a class="btn btn-success" href="" data-target="#modalCreate" data-name="{{ $cod }}" data-cats="{{$cats}}" data-action="{{url('categorias/store')}}" data-toggle="modal"><i class="fa fa-plus" ></i>Nuevo</a>
		{{-- @include('categorias.search') --}}
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
               	@foreach ($categorias as $cat)
				<tr>
					<td>
						<a href="{{URL::action('CategoriaController@show',$cat->cat_id)}}"><button class="btn btn-primary">Ver</button></a>
					<a href="" data-target="#modalEdit" data-codigo="{{ $cat->cat_codigo }}" data-nombre="{{ $cat->cat_nombre }}" data-action="{{URL::action('CategoriaController@update',$cat->cat_id)}}" data-toggle="modal"><button class="btn btn-success">Editar</button></a>
                    </td>
                    <td>{{ $cat->estado }}</td>
                    <td>{{ $cat->cat_codigo }}</td>
                    @if($cat->categoriasuperior != null)
                        <td>{{ $cat->categoriasuperior->cat_codigo }}</td>
                    @else
                        <td>{{ $cat->cat_codigop }}</td>
                    @endif
                    <td>{{ $cat->cat_nombre }}</td>
                    <td>{{ $cat->cat_created_at }}</td>
                    <td>{{ $cat->cat_updated_at }}</td>	
                    
					@include('categorias.create')
					@include('categorias.edit')
				</tr>		
				@endforeach
			</table>
		</div>
		{{$categorias->render()}}
		
	</div>
</div>
@endsection
@section ('script')
<script type="text/javascript">
	function handleSelect(elm){
		window.location = elm.value+"";
	}
</script>
<script type="text/javascript">
    $(document).ready(function () {       
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            //var action = button.data('action');
            var codigo = button.data('codigo');
            var nombre = button.data('nombre');
            //var idRol = button.data('rol');
            var modal = $(this);
            modal.find(".modal-content #codigo").val(codigo);
            modal.find(".modal-content #nombre").val(nombre);
            //modal.find(".modal-content #idRol").val(idRol);
            //modal.find(".modal-content form").attr('action', action);
        });
    });
</script>
@endsection