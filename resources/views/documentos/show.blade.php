@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('documentos')}}" title="Regresar al listado" role="button">
    <i class="fa fa-reply" aria-hidden="true"></i>    
  </a>
  <center><h3>Detalle Documento</h3></center>
</div>

                <input type="hidden" name"nombre_de_campo" value="                {{$total=0}}   
                @foreach($documento->detalles as $det)

                {{$total=$total+($det->mov_cantidad*$det->mov_costo)}}

                @endforeach" />
            
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                   
                   
                    @if($documento->proveedor==null)
                    
                    @else
                      <label for="nombre">Proveedor</label>
                      <p>{{$documento->proveedor->prv_nombre}}</p>
                    @endif
                </div>
              </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
               <div class="form-group">
                  <label>Tipo Documento</label>
                   <p>{{$documento->doc_tipo}}</p>
              </div>
            </div>
               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                   <div class="form-group">
                      <label for="num_comprobante">Código Documento</label>
                      <p>{{$documento->doc_codigo}}</p> 
                    </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                       <label for="num_comprobante">Fecha</label>
                       <p>{{$documento->doc_fecha}}</p> 
                     </div>
               </div>
            </div>
            <div class="row">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                         
                              <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                  <thead style="background-color: #A9D0F5">                                   
                                      <th>Producto</th>
                                      <th>Cantidad</th>
                                      <th>Costo</th>
                                      <th>Precio</th>
                                      <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">$/ {{$total}}</h4></th>
                                </tfoot>
                                <tbody>   
                                   @foreach($detalles as $det)   
                                   <tr>
                                      <td>{{$det->pro_nombre}}</td>
                                      <td>{{$det->mov_cantidad}}</td>
                                      <td>{{$det->mov_costo}}</td>
                                      <td>{{$det->mov_precio}}</td>
                                      <td>{{$det->mov_cantidad*$det->mov_costo}}</td>

                                   </tr>
                                   @endforeach
                                </tbody>
                          </table>
                      </div>
                </div>
            </div>
          </div>               
         
     
  @endsection