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
            <h3>Editar producto</h3>
            @include('includes.messages')
        </div>
    </div>
    {!! Form::open(['route' => ['productos.update', $producto->pro_id],'method' => 'PATCH','files' => 'true']) !!}
        <input type="hidden" name="pro_codigo" value="{{ $producto->pro_codigo }}">
        <input type="hidden" name="pro_id" value="{{ $producto->pro_id }}">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" value="{{ $producto->pro_codigo }}" disabled class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Tipo</th>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Costo</th>
                            <th>Stock</th>
        
                        </thead>
                        @foreach ($movimientos as $mov)
                        <tr>
                            @if($mov->tipo=='FA')
                            <td>FACTURA</td>
                            @elseif($mov->tipo=='AJ')
                            <td>AJUSTE {{ $mov->ajuste }}</td>
                            @elseif($mov->tipo=='NC')
                            <td>NOTA DE CREDITO</td>
                            @else
                            <td>{{$mov->tipo}}</td>
                            @endif
                            <td>{{ $mov->codigo}}</td>
                            <td>{{ $mov->fecha}}</td>
                            <td>{{ $mov->producto}}</td>
                            <td>{{ $mov->cantidad}}</td>
                            <td>$ {{ $mov->precio}}</td>
                            <td>$ {{ $mov->costo}}</td>
                            <td>{{ $mov->stock}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                {{$movimientos->render()}}
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <select style="width:70px" name="formal" class="form-control" onchange="javascript:handleSelect(this)">
                                        <option value="stock?pag=7"<?php
                                        if ($pag=='7') {
                                            echo 'selected';
                                        }?>>7</option>
                                        <option value="stock?pag=15"<?php
                                        if ($pag=='15') {
                                            echo 'selected';
                                        }?>>15 </option>
                                        <option value="stock?pag=25"<?php
                                        if ($pag=='25') {
                                            echo 'selected';
                                        }?>>25 </option>
                                        <option value="stock?pag=50"<?php
                                        if ($pag=='50') {
                                            echo 'selected';
                                        }?>>50 </option>
                                        <option value="stock?pag=100"<?php
                                        if ($pag=='100') {
                                            echo 'selected';
                                        }?>>100 </option>
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
