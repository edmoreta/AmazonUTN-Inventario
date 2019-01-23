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
    {!! Form::open(['url' => 'productos','files'=>'true']) !!}
        <input type="hidden" name="pro_codigo" value="{{ 'PRO-'.$cod }}">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" value="{{ 'PRO-'.$cod }}" disabled class="form-control">
                </div>
            </div>
        </div>

        <div class="row">								
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="cat_id">Categoría</label> <label for="cat_id" style="color:red">*</label>
                    <select name="cat_id" id="pro_id" class="form-control selectpicker" data-live-search="true">
                        <option value="-1">--   Seleccione  --</option>
                        @if($categorias != null)
                            @foreach ($categorias as $c)
                                <option value="{{$c->cat_id}}">{{$c->cat_nombre}}</option>
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
                    <input type="text" name="pro_nombre" maxlength="200" value="{{old('pro_nombre')}}" required class="form-control" placeholder="Nombre...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="pro_descripcion">Descripción</label> <label for="pro_descripcion" style="color:red">*</label>
                    <input type="text" name="pro_descripcion" maxlength="300" value="{{old('pro_descripcion')}}" required class="form-control" placeholder="Descripción...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="pro_caracteristicas">Características</label> <label for="pro_caracteristicas" style="color:red">*</label>                    
                    <textarea class="form-control" name="pro_caracteristicas" value="{{old('pro_caracteristicas')}}"></textarea><br>
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
                    <input type="number" name="pro_costo" value="{{old('pro_costo')}}" step="0.01" min="0.01" max="99999999.99" required class="form-control" placeholder="Costo...">
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
                    <input type="number" name="pro_precio" value="{{old('pro_precio')}}" step="0.01" min="0.01" max="99999999.99" required class="form-control" placeholder="Precio...">
                </div>                

                <div class="row"> 
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="pro_stock">Stock</label> <label for="pro_stock" style="color:red">*</label>
                            <input type="number" name="pro_stock" value="{{old('pro_stock')}}" step="1" readonly min="0" max="2147483647" required class="form-control" placeholder="Stock...">
                        </div>
                    </div>
                </div>

            </div>
        {{-- </div> --}}
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    @if(true)
                        -
                        <img src="" alt="">
                    @else
                        {{-- <img src="{{\Storage::url($pel->imagen)}}" style="max-width:75px;"> --}}
                    @endif
                </div>
            </div>

        </div> {{-- row costo --}}
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
