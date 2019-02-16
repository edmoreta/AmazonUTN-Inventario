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
            <label for="nombre">Código Factura</label>
            <input type="hidden" name="facod" value="{{ $id }}">
            <select required name="prv_id" id="prv_id" class="form-control selectpicker" data-live-search="true">
                <option>Seleccionar</option>
                @foreach($documentosJoin as $doc)
                <option value="{{$doc->doc_codigo}}_{{$doc->prv_nombre}}_{{$doc->doc_fecha}}"
                    <?php if ($id==$doc->doc_codigo) {
                    echo 'selected';
                } ?>>
                    {{$doc->doc_codigo}}
                </option>

                @endforeach
                <?php
                    $fe=0;
                    $doc_id=0;
                    $id_prov=0;
                    $p=0;
                    $tot=0;
                ?>
                <!--
               {{-- <option value="{{$doc->doc_codigo}}_{{$doc->prv_nombre}}_{{$doc->doc_fecha}}_{{$doc->pro_nombre}}_{{$doc->mov_cantidad}}_{{$doc->mov_costo}}_{{$doc->mov_precio}}">{{$doc->doc_codigo}}</option>
                  @endforeach --}} -->
            </select>
        </div>
    </div>

    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <input type="text" required disabled name="proveedor" id="proveedor" <?php foreach ($documentosJoin as $d) { if ($id==$d->doc_codigo)
            { echo 'value="'.$d->prv_nombre.'"'; } }?> class="form-control" placeholder="Proveedor">
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="num_comprobante">Fecha</label>
            <input type="date" name="doc_fecha" id="doc_fecha" required disabled <?php foreach ($documentosJoin as $d) { if ($id==$d->doc_codigo)
            { $fe=$d->doc_fecha; echo 'value="'.$d->doc_fecha.'"'; } }?> class="form-control">
        </div>
    </div>
    <script>
        let valo = document.getElementById('prv_id').value;
    console.log("log", valo);
    </script>
    <input type="hidden" name="fechia" value="{{ $fe }}">
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <label for="aceptar"></label><br>
            <!-- <button class="btn btn-danger" type="button" id="bt_add">Aceptar</button> -->
            <a href="{{URL::action('NotasDeCreditoController@show',$p)}}" id="btn_aceptar" class=""><button
                    class="btn btn-danger" type="button">Aceptar</button></a>
        </div>
    </div>

</div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color: #dd4b39">
                            <th>Articulo</th>
                            <th>Cantidad Factura</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Agregar</th>
                            <th>Subtotal</th>
                        </thead>
                        <?php
                            $num=0;
                        ?>
                            @if($documentosJo!=null) @foreach($documentosJo as $dc)
                            <?php
                            $doc_id=$dc->doc_id;
                            $id_prov=$dc->prv_id;
                            $num+=1;
                            $tot+=$dc->mov_precio*$dc->mov_cantidad;
                        ?>
                                <tr>
                                    <input type="hidden" value="{{ $dc->pro_id }}" <?php echo 'id=pro_id' .$num; ?>>
                                    <td><input type="txt" value="{{ $dc->pro_nombre }}" disabled class="form-control" <?php echo
                                            'id=nom' .$num; ?>></td>

                                    <td><input type="number" name="mov_cantidad" value="{{ $dc->mov_cantidad }}" min="1" max="{{ $dc->mov_cantidad }}"
                                            class="form-control" <?php echo 'id=cant' .$num; ?>>
                                        <input type="hidden" value="{{ $dc->mov_cantidad }}" <?php echo 'id=cantR' .$num; ?>>
                                    </td>

                                    <td><input type="txt" value="{{ $dc->mov_costo }}" disabled class="form-control" <?php echo
                                            'id=pc' .$num; ?>></td>
                                    <td><input type="txt" value="{{ $dc->mov_precio }}" disabled class="form-control" <?php echo
                                            'id=pv' .$num; ?>></td>
                                    <td><button class="btn btn-danger" type="button" onclick="AgregarA(this)" <?php echo
                                            'id="'.$num. '"'; ?>>Agregar</button></td>
                                    <td>{{ $dc->mov_precio*$dc->mov_cantidad }}</td>
                                </tr>
                                @endforeach @endif
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <h4>$/ {{ $tot }}</h4>
                                    </th>
                                </tfoot>
                                <tbody>
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="id_prov" value="{{ $id_prov }}">
<input type="hidden" name="doc_id" value="{{ $doc_id }}">
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color: #dd4b39">
                            <th>Opciones</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Cantidad N.C</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
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
            <a class="btn btn-danger" href="{{url('documentos')}}">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </div>
</div>
<p id="demo4" value="2"></p>
{!!Form::close()!!} @push ('scripts')
<script>
    $('#prv_id').change(mostrarValores);

function mostrarValores() {
    console.log('mostrarValores()');
    $("#guardar").hide();
    datosArticulo = document.getElementById('prv_id').value.split('_');
    console.log(document.getElementById('prv_id').value, datosArticulo, $('#doc_fecha'), $('#proveedor'));
    $('#doc_fecha').val(datosArticulo[2]);
    $('#proveedor').val(datosArticulo[1]);
    $('#doc_codigo').val(datosArticulo[0]);
    $('#btn_aceptar').attr("href", "http://app-inventario-amazonutn.herokuapp.com/notas_de_credito/" + datosArticulo[0]);
}

subtotal = [];
total = 0;
canti = [];
$("#guardar").hide();

function AgregarA(campo) {
    a = false;
    a2 = false;
    var id = campo.id;
    var pro_i = document.getElementById("pro_id" + id).value;
    var nom = document.getElementById("nom" + id).value;
    var cant = document.getElementById("cant" + id).value;
    var cantR = document.getElementById("cantR" + id).value;
    var pc = document.getElementById("pc" + id).value;
    var pv = document.getElementById("pv" + id).value;
    //document.getElementById("demo4").innerHTML = "val: "+cant+" "+cantR;
    if (nom != "" && cant != "" && pro_i != "" && cantR != "" && pc != "" && pv != "" && Math.round(parseInt(cant)) == cant) {
        if (parseInt(cant) <= parseInt(cantR) && parseInt(cant) > 0) {
            if (canti[id] != null) {
                if ((parseInt(canti[id]) + parseInt(cant)) > parseInt(cantR)) {
                    a = true;
                } else {
                    canti[id] = parseInt(canti[id]) + parseInt(cant);
                    a2 = true;
                }
            } else {
                canti[id] = cant;
            }
            if (!a) {
                var subt = pv * canti[id];
                subtotal[id] = (pv * cant);
                total = total + subtotal[id];
                subtotal[id]= (pv * canti[id]);
                var fila = '<tr class="selected" id="fila' + id +
                    '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + id +
                    ');">X</button></td><td><input type="hidden" name="pro_id[]" value="' +
                    pro_i + '">' +nom + '</td><td><input type="hidden" id="fil'+id+'"name="cantidad[]" value="' + cant +
                    '"><input type="number" disabled id="fil2'+id+'" name="cantida[]" value="' + cant +
                    '"></td><td><input type="hidden" name="costo[]" value="' + pc +
                    '"><input type="number" disabled name="cost[]" value="' + pc +
                    '"></td><td><input type="hidden" name="precio[]" value="' + pv +
                    '"><input type="number" disabled name="preci[]" value="' + pv +
                    '"></td><td>1</td><td><input type="hidden" id="fils1'+id+'" name="precio[]" value="' + subt +
                    '"><input type="number" disabled name="subt[]" id="fils2'+id+'" value="' + subt + '"></td></tr>';
                //var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="pro_id[]" value="'+pro_id+'">'+producto+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'"><input type="number" disabled name="cantida[]" value="'+cantidad+'"></td><td><input type="hidden" name="costo[]" value="'+costo+'"><input type="number" disabled name="cost[]" value="'+costo+'"></td><td><input type="hidden" name="precio[]" value="'+precio+'"><input type="number" disabled name="preci[]" value="'+precio+'"></td><td>'+subtotal[cont]+'</td></tr>';
                document.getElementById("total").innerHTML = "$/ " + total;
                if (a2) {
                    document.getElementById("fil"+id).setAttribute('value',canti[id]);
                    document.getElementById("fil2"+id).setAttribute('value',canti[id]);
                    document.getElementById("fils1"+id).setAttribute('value',subt);
                    document.getElementById("fils2"+id).setAttribute('value',subt);
                }else{
                    $('#detalles').append(fila);
                }
                $("#guardar").show();
            } else {
                alert("Error, Cantidad excedida");
            }
        } else {
            alert("Error, Cantidad de la factura excedida o menor a 1");
        }

    } else {
        alert("Error, Ingrese la Cantidad Factura");
    }
}

function eliminar(id) {
    total = total - subtotal[id];
    canti[id] = null;
    $("#total").html("S/. " + total);
    $("#fila" + id).remove();
    evaluar();
}

</script>




























































@endpush
@endsection
