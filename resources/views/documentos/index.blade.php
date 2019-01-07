@extends ('layouts.inicio')
@section ('contenido')
<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<center><h2>Documentos</h2></center> 
		@include('documentos.search')
		
	</div>
	<div  class="col-lg-4 col-md-4 col-sm-4 col-xs-12 menu " >
		<a href="{{ url('ajustes/create') }}"><button class="btn btn-success"> + Ajuste</button></a></h3>
		<a href="{{ url('facturas_ingreso/create') }}"><button class="btn btn-success"> + F. Ingreso</button></a></h3>
		<a href="{{ url('notas_de_credito/create') }}"><button class="btn btn-success"> + Nota Crédito</button></a></h3>
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
					<th style="width:110px">Detalle</th>
					<th>Proveedor</th>
					<th>Código</th>
					<th>Tipo</th>
					<th>Fecha</th>
                   
				</thead>
               @foreach ($documentos as $doc)
				<tr>
					<td>
						<center>
						<a href="{{URL::action('DocumentoController@show',$doc->doc_id)}}"><i title="Detalle" class="fa fa-folder-open-o" style="font-size:30px;color:#3c8dbc"></i></a>
						</center>
					</td>
					<td>{{ $doc->prv_nombre}}</td>
					<td>{{ $doc->doc_codigo }}</td>
					@if($doc->doc_tipo=='FA')
						<td>FACTURA</td>
					@elseif($doc->doc_tipo=='AJ')
						<td>AJUSTE</td>
					@elseif($doc->doc_tipo=='NC')
						<td>NOTA DE CREDITO</td>
					@else
						 <td>{{$doc->doc_tipo}}</td>
					@endif					
                    <td>{{ $doc->doc_fecha}}</td>	

					@include('documentos.modal')
				</tr>		
				@endforeach
			</table>
		</div>
		{{$documentos->render()}}
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