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
<?php
$p="";
?> {!!Form::open(array('url'=>'notas_de_credito','method'=>'POST','autocomplete'=>'off'))!!} {{Form::token()}}
<div class="row">
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="nombre">Código Factura</label> {{-- {{dd($documentosFa)}} --}}
            <select name="prv_id" id="prv_id" class="form-control selectpicker" data-live-search="true">
                @foreach($documentosJoin as $doc)
               <option value="{{$doc->doc_codigo}}_{{$doc->prv_nombre}}_{{$doc->doc_fecha}}">{{$doc->doc_codigo}}</option>

               @endforeach
  <?php
  $p=$doc->doc_codigo;
  ?>
               {{-- <option value="{{$doc->doc_codigo}}_{{$doc->prv_nombre}}_{{$doc->doc_fecha}}_{{$doc->pro_nombre}}_{{$doc->mov_cantidad}}_{{$doc->mov_costo}}_{{$doc->mov_precio}}">{{$doc->doc_codigo}}</option>
                  @endforeach --}}
</select>
        </div>
    </div>

    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <input type="text" required name="proveedor" id="proveedor" value="" class="form-control" placeholder="Proveedor">
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="num_comprobante">Fecha</label>
            <input type="date" name="doc_fecha" id="doc_fecha" required value="" class="form-control" placeholder="Numero del Comprobante..">
        </div>
    </div>
    <script>
        let valo=document.getElementById('prv_id').value;
    console.log("log",valo);
    </script>

    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <label for="aceptar">.</label><br>
            <button class="btn btn-danger" type="button" id="bt_add">Aceptar</button>
            <a href="{{URL::action('NotasDeCreditoController@show',$p)}}" id="btn_aceptar" class="">Aceptar  M</a>
        </div>
    </div>

</div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="pro_nombre">Artículo</label>
                    <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" placeholder="Artículo..">
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="mov_cantidad">Cantidad</label>
                    <input type="number" name="mov_cantidad" id="mov_cantidad" class="form-control" placeholder="Cantidad..">
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="mov_costo">Costo</label>
                    <input type="number" name="mov_costo" id="mov_costo" class="form-control" placeholder="Costo..">
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="mov_precio">Precio</label>
                    <input type="number" name="mov_precio" id="mov_precio" class="form-control" placeholder="Precio..">
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="agregar">Agregar</label><br>
                    <button class="btn btn-danger" type="button" id="bt_add">Agregar</button>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input type="number" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal..">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color: #dd4b39">

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
                            <th>
                                <h4 id="total">$/ 0.00</h4>
                            </th>
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
{!!Form::close()!!} @push ('scripts')
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
      console.log('Control');

       $('#prv_id').change(mostrarValores);
// $('select#prv_id').on('change', function(e){
//     console.log(this, this.value, this.options[this.selectedIndex].value, $(this).find("option:selected").val(),);
// });

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


function mostrarValores(){
    console.log('mostrarValores()');

    datosArticulo=document.getElementById('prv_id').value.split('_');
    console.log(document.getElementById('prv_id').value, datosArticulo, $('#doc_fecha'), $('#proveedor'));

//  $('#mov_precio').val(datosArticulo[6]);
//  $('#mov_costo').val(datosArticulo[5]);
//   $('#mov_cantidad').val(datosArticulo[4]);
//  $('#pro_nombre').val(datosArticulo[3]);
    $('#doc_fecha').val(datosArticulo[2]);
    $('#proveedor').val(datosArticulo[1]);
    $('#doc_codigo').val(datosArticulo[0]);
    $('#btn_aceptar').attr("href","http://localhost:8000/notas_de_credito/"+datosArticulo[0]);

}

</script>



























































@endpush
@endsection
