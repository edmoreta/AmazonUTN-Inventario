@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Usuarios <a href="{{url('usuarios/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
	
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
					<th>Celular</th>
					<th>Email</th>
                    <th>Rol</th>
				</thead>
				<tbody>
				@foreach ($usuarios as $u)
					<tr>
						<td>
							<a href="#"><button class="btn btn-primary">Ver</button></a>
							<a href="#"><button class="btn btn-success">Editar</button></a>
						</td>
						<td>{{$u->usu_nombre}}</td>
						<td>{{$u->usu_direccion}}</td>
						<td>{{$u->usu_celular}}</td>
						<td>{{$u->usu_email}}</td>
                        
                        
                        <td>
                            @foreach ($u->roles as $r)
                             	{{$r->display_name}}
                            @endforeach
                        </td>

						
						
					</tr>		
				@endforeach
				</tbody>
			</table>
		</div>

</div>
@endsection
