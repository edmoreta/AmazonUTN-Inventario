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
        <h3>Nueva Nota de Crédito</h3>
    </div>
 </div>
   
   {!!Form::open(array('url'=>'facturas_ingreso','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
 <div class="row">
     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
         <div class="form-group">
             <label for="nombre">Código Factura</label>
{{-- 
             {{dd($documentosFa)}}  --}}
             {{dd($proveedores)}}
             <select name="prv_id" id="prv_id" class="form-control selectpicker" data-live-search="true">
                @foreach($documentosFa as $doc)
                  <option value="{{$doc->doc_codigo}}">{{$doc->doc_codigo}}</option>
              @endforeach 
              </select>
          </div>
     </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                 <label for="proveedor">Proveedor</label>
            <input type="text" required name="proveedor" id="proveedor" value="" class="form-control" placeholder="Proveedor">
            </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
             <div class="form-group">
                  <label for="num_comprobante">Fecha</label>
                  <input type="date" name="doc_fecha" id="doc_fecha" required value="" class="form-control" placeholder="Numero del Comprobante..">
            </div>
      </div>
 </div>
 <div class="row">
      <div class="panel panel-primary">
           <div class="panel-body">
                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                      <div class="form-group">
                          <label>Articulo</label>
                          <select name="pro_id" id="pro_id" class="form-control selectpicker" data-live-search="true">
                              @foreach($productos as $pro)
                              <option value="{{$pro->pro_id}}">{{$pro->pro_nombre}}</option>
                              @endforeach
                          </select>
                      </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                      <div class="form-group">
                          <label for="cantidad">Cantidad</label>
                          <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad..">
                      </div>
              </div>
              <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                      <div class="form-group">
                          <label for="costo">Costo</label>
                          <input type="number" name="costo" id="costo" class="form-control" placeholder="Costo..">
                      </div>
             </div>
              <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                      <div class="form-group">
                          <label for="precio">Precio</label>
                          <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio..">
                      </div>
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
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>  
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">$/ 0.00</h4></th>
                                 </tfoot>
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
                      <button class="btn btn-danger" type="reset">Cancelar</button>
                      <button class="btn btn-primary" type="submit">Guardar</button>
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
      total=0;
      subtotal=[];
      $("#guardar").hide();

      function agregar(){
          pro_id=$("#pro_id").val();
          producto=$("#pro_id option:selected").text();
          cantidad=$("#cantidad").val();
          costo=$("#costo").val();
          precio=$("#precio").val();

          if (pro_id!="" && cantidad!="" && cantidad>0 && costo!="" && precio!="")
          {

                subtotal[cont]=(cantidad*costo);
                total=total+subtotal[cont];
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="pro_id[]" value="'+pro_id+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="costo[]" value="'+costo+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td><td>'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                $('#total').html("$/ " + total);
                evaluar();
                $('#detalles').append(fila);
          }
         else
         {
              alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
          }  
      }

      function limpiar(){
        $("#cantidad").val("");
        $("#precio").val("");
        $("#costo").val("");
      }

      function evaluar()
      {
        if (total>0)
        {
          $("#guardar").show();
        }
        else
        {
          $("#guardar").hide(); 
        }
      }

      function eliminar(index){
        total=total-subtotal[index]; 
        $("#total").html("S/. " + total);   
        $("#fila" + index).remove();
        evaluar();

      }
  </script>
@endpush
@endsection﻿