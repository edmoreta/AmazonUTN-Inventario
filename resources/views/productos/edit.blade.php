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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="cat_id">Categoría</label> <label for="cat_id" style="color:red">*</label>
                    <select name="cat_id" id="pro_id" class="form-control selectpicker" data-live-search="true">
                        @if($categorias != null)
                            @foreach ($categorias as $c)
                                @if($c->cat_id == $producto->cat_id)
                                    <option value="{{$c->cat_id}}" selected>{{$c->cat_nombre}}</option>
                                @else
                                    <option value="{{$c->cat_id}}">{{$c->cat_nombre}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="pro_nombre">Nombre</label> <label for="pro_nombre" style="color:red">*</label>
                    <input type="text" name="pro_nombre" maxlength="200" value="{{ $producto->pro_nombre }}" required class="form-control" placeholder="Nombre...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="pro_descripcion">Descripción</label> <label for="pro_descripcion" style="color:red">*</label>
                    <input type="text" name="pro_descripcion" maxlength="300" value="{{ $producto->pro_descripcion }}" required class="form-control" placeholder="Descripción...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="pro_caracteristicas">Características</label> <label for="pro_caracteristicas" style="color:red">*</label>                    
                    <textarea class="form-control" name="pro_caracteristicas" id="pro_caracteristicas">
                        {{ $producto->pro_caracteristicas }}
                    </textarea>
                    <script>
                        CKEDITOR.replace('pro_caracteristicas');                        
                    </script>
                </div>
            </div>
        </div>                                
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="pro_costo">Costo</label> <label for="pro_costo" style="color:red">*</label>
                    <input type="number" name="pro_costo" value="{{ $producto->pro_costo }}" step="0.01" min="0.01" max="99999999.99" required class="form-control" placeholder="Costo...">
                </div>
            </div>
        {{-- </div> --}}
        {{-- <div class="row"> --}}
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="pro_foto">Foto</label> <label for="pro_foto" ></label>
                    <input type="file" name="pro_foto" id="pro_foto" class="form-control">
                </div>
            </div>
        {{-- </div> --}}
        {{-- <div class="row"> --}}
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="pro_precio">Precio</label> <label for="pro_precio" style="color:red">*</label>
                    <input type="number" name="pro_precio" value="{{ $producto->pro_precio }}" step="0.01" min="0.01" max="99999999.99" required class="form-control" placeholder="Precio...">
                </div>                

                <div class="row"> 
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="pro_stock">Stock</label> <label for="pro_stock" style="color:red">*</label>
                            <input type="number" name="pro_stock" value="{{ $producto->pro_stock }}" step="1" readonly min="0" max="2147483647" required class="form-control" placeholder="Stock...">
                        </div>
                    </div>
                </div>

            </div>
        {{-- </div> --}}
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    @if($producto->pro_foto == null)
                        -								
                    @else
                        {{-- <img src="{{\Storage::url($producto->pro_foto)}}" style="max-width:250px;"> --}}
                        <img src="{{ "data:image/" . $producto->pro_fototype . ";base64," . $producto->pro_foto }}" style="max-width:250px;">
                    @endif
                </div>
            </div>

        </div> {{-- row costo --}}
        <div class="row">            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="pro_estado">Estado</label> <label for="pro_estado" style="color:red"></label>
                    <select name="pro_estado" class="form-control selectpicker" id="pro_estado">
                        @if ($producto->pro_estado == true)
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                        @else
                            <option value="1">Activo</option>
                            <option value="0" selected>Inactivo</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <a class="btn btn-danger" href="{{url('productos')}}">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
                    
@endsection
