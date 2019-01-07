@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('documentos')}}" title="Regresar al listado" role="button">
		<i class="fa fa-reply" aria-hidden="true"></i>
	</a></div>
 <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			@include('includes.messages')        
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">		
        <h3>Nuevo Ajuste</h3>
    </div>
 </div>

 {!!Form::open(array('url'=>'ajustes','method'=>'POST','autocomplete'=>'off'))!!}
 {{Form::token()}}
<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

	 </div>
	 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

	 </div>
	 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			   <div class="form-group">
					  <label for="serieComprobante">Codigo De Ajuste</label>
					  <input type="number" name="doc_codigo" id="doc_codigo" required value="{{old('doc_codigo')}}" class="form-control" placeholder="Serie del Comprobante..">
			   </div>
	 </div>
	 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			   <div class="form-group">
					 <label for="doc_fecha">Fecha De Ajuste</label>
					 <input type="date" name="doc_fecha" id="doc_fecha" required value="{{$fecha_actual}}" class="form-control" placeholder="Numero del Comprobante..">
			   </div>
	 </div>
</div>
<div class="row">
	 <div class="panel panel-primary">
			   <div class="panel-body">
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								<div class="form-group">
									<label>Producto</label>
									<select name="ppro_id" id="ppro_id" class="form-control selectpicker" data-live-search="true">
										@foreach($productos as $prod)
										<option value="{{$prod->pro_id}}_{{$prod->pro_stock}}_{{$prod->pro_costo}}_{{$prod->pro_precio}}">{{$prod->pro_nombre}}</option>
										@endforeach
									</select>
								 </div>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								  <div class="form-group">
									  <label for="pcantidad">Cantidad</label>
									  <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
								  </div>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								  <div class="form-group">
									  <label for="stock">Stock</label>
									  <input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock..">
								  </div>
					   </div>
					   <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
							<div class="form-group">
								  <label for="pcosto">Costo</label>
								  <input type="number"  disabled name="pcosto" id="pcosto" class="form-control" placeholder="Costo..">
							</div>
					 </div>
					   <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								  <div class="form-group">
										<label for="pprecio">Precio</label>
										<input type="number"   name="pprecio" id="pprecio" class="form-control" placeholder="Precio..">
								  </div>
					   </div>

					   <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								  <div class="form-group">
									  <label for="ptipo_ajuste">Tipo Ajuste</label><br>
									  <select name="ptipo_ajuste" id="ptipo_ajuste" class="form-control selectpicker" data-live-search="true">
											<option value="Positivo">Positivo</option>
											<option value="Negativo">Negativo</option>											
									</select>
								  </div>
					   </div>
					   <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">				
						</div>
					   <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								   <div class="form-group">
										<button class="btn btn-danger" type="button" id="bt_add">Agregar</button>
								   </div>
					   </div>
					   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								 <div class="table-responsive">
										 <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
											  <thead style="background-color: #dd4b39">
												   <th>Opciones</th>
												   <th>Producto</th>
												   <th>Cantidad</th>
												   <th>Stock</th>
												   <th>Costo</th>
												   <th>Precio</th>
												   <th>Tipo Ajuste</th>
											 </thead>
											  <tbody>              
											  </tbody>
										  </table>
								   </div>
						 </div>
		</div>
  </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">         
		  <div class="form-group">
				   <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				   <button class="btn btn-primary" type="submit">Guardar</button>
				   <button class="btn btn-danger" type="reset">Cancelar</button>
		  </div>
  </div>
</div>
{!!Form::close()!!}  


@push ('scripts')
<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
	   agregar();
	   });
	 });

  var cont=0;

  $("#guardar").hide();
  $('#ppro_id').change(mostrarValores);

 function mostrarValores(){
	datosArticulo=document.getElementById('ppro_id').value.split('_');
	$('#pprecio').val(datosArticulo[3]);  
	$('#pcosto').val(datosArticulo[2]);
	$('#pstock').val(datosArticulo[1]);
  }

function agregar(){
  datosArticulo2=document.getElementById('ppro_id').value.split('_');
  pro_id=datosArticulo2[0];
  producto=$("#ppro_id option:selected").text();
  cantidad=$("#pcantidad").val();
  tipo_ajuste=$("#ptipo_ajuste").val();
  precio=$("#pprecio").val();
  costo=$("#pcosto").val();
  stock=$('#pstock').val();
  if (pro_id!="" && cantidad!="" && cantidad>=1  && tipo_ajuste!="" && precio!="" && costo!="")
  {   
	  if(parseInt(cantidad)<=parseInt(stock)){
		 
		var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button"  class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="pro_id[]" value="'+pro_id+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="stock[]" value="'+stock+'"></td><td><input type="number" name="costo[]" value="'+costo+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td><td><input type="text" name="tipo_ajuste[]" value="'+tipo_ajuste+'"></td></tr>';
		  cont++;
		  limpiar();
		  evaluar();
		  $('#detalles').append(fila);
	  }
	  else
	  {

		  alert('La cantidad de compra supera el stock');
	  }
  }
  else
  {
	alert("Error al ingresar el detalle la venta, revise los datos del producto");
  }

}

function limpiar(){
  $("#pcantidad").val("");

  $("#pprecio").val("");

  $("#pstock").val("");

  $("#pcosto").val("");
}

function evaluar()
{
  if (cont>0)
  {
	$("#guardar").show();
  }
  else
  {
	$("#guardar").hide(); 
  }
 }

 function eliminar(index){
  
  $("#fila" + index).remove();
  cont--;
  evaluar();

}
</script>


@endpush
@endsection