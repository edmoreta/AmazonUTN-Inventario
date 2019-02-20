<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modalCreate">
	{{ Form::open(array('url' => 'categorias')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Nueva Categoría</h4>
			</div>
			<div class="modal-body">
                <input type="hidden" name="cat_codigo" value="{{ 'CAT-'.$cod }}">
				<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cat_codigo">Código</label>
                            <input type="text" name="cat_codigo" value="{{ 'CAT-'.$cod }}" disabled class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">								
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cat_nombre">Nombre</label> <label for="cat_nombre" style="color:red">*</label>
                            <input type="text" name="cat_nombre" maxlength="100" value="{{old('cat_nombre')}}" required class="form-control" placeholder="Ej: Libros">
                        </div>
                    </div>
                </div>
                <div class="row">								
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cat_codigop">Categoría Superior</label> <label for="cat_codigop" style="color:red"></label>
                            <select name="cat_codigop" class="form-control selectpicker">
                                <option value="-1">--   Seleccione  --</option>
                                @if($cats != null)
                                    @foreach ($cats as $c)
                                        <option value="{{$c->cat_id}}">{{$c->cat_nombre}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>