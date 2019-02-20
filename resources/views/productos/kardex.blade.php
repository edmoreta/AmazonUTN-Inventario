@extends ('layouts.inicio')
@section('contenido')
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>    
    <div class="card-header">
        <a class="btn btn-primary" href="{{url('productos')}}" title="Regresar al listado" role="button">
            <i class="fa fa-reply" aria-hidden="true"></i>
        </a>
    </div>
    <div class="row ">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <h3>Kardex Producto</h3>
            <h4> {{ $producto->pro_nombre}}</h4>
            @include('includes.messages')
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
         </div>
    </div>


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Documento</th>
                            <th>Código</th>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Naturaleza</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Precio</th>
                            <th>Stock</th>
        
                        </thead>
                        @foreach ($movimientos as $mov)
                        <tr>
                            @if($mov->tipo=='FA')
                            <td>FACTURA</td>
                            @elseif($mov->tipo=='AJ')
                            <td>AJUSTE</td>
                            @elseif($mov->tipo=='NC')
                            <td>NOTA DE CREDITO</td>
                            @else
                            <td>{{$mov->tipo}}</td>
                            @endif
                            <td>{{ $mov->codigo}}</td>
                            <td>{{ $mov->fecha}}</td>
                            <td>{{ $mov->producto}}</td>
                            @if($mov->tipo=='FA')
                            <td>(+)</td>
                            @elseif($mov->tipo=='AJ' && $mov->ajuste=="Positivo" )
                            <td>(+) </td>
                            @elseif($mov->tipo=='AJ' && $mov->ajuste=="Negativo" )
                            <td>(-) </td>
                            @elseif($mov->tipo=='NC')
                            <td>(-)</td>
                            @else
                            <td>(-)</td>
                            @endif
                            <td>{{ $mov->cantidad}}</td>
                            <td>$ {{ $mov->costo}}</td>
                            <td>$ {{ $mov->precio}}</td>                            
                            <td>{{ $mov->stock}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                {{$movimientos->render()}}

            </div>
        </div>
@endsection
@section ('script')
<script type="text/javascript">
    function handleSelect(elm){
		window.location = elm.value+"";
	}

</script>
