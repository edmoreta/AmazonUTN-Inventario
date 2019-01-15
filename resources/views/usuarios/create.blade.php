@extends ('layouts.inicio')
@section('contenido')
    <div class="card-header"><a class="btn btn-primary" href="{{url('usuarios')}}" title="Regresar al listado" role="button">
            <i class="fa fa-reply" aria-hidden="true"></i>
             </a></div>
         <div class="row">
		     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			        <h3>Nuevo usuario</h3>
                        @include('includes.messages')
                        </div>
                    </div>
                        {!! Form::open(['url' => 'usuarios','files'=>'true']) !!}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_cedula">Cedula</label> <label for="usu_cedula" style="color:red">*</label>
                                    <input type="text" name="usu_cedula" maxlength="10" minlength="10" pattern="[0-9]+" value="{{old('usu_cedula')}}" required class="form-control" placeholder="Cedula...">
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_telefono">Telefono</label> <label for="usu_telefono"></label>
                                    <input type="text" name="usu_telefono" maxlength="9" minlength="9" pattern="[0-9]+" value="{{old('usu_telefono')}}" class="form-control" placeholder="Telefono..">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_nombre">Nombre</label> <label for="usu_nombre" style="color:red">*</label>
                                    <input type="text" name="usu_nombre" maxlength="50" minlength="3" pattern="([a-zA-Z]| )+" value="{{old('usu_nombre')}}" required class="form-control" placeholder="Nombre...">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_celular">Celular</label> <label for="usu_celular" style="color:red">*</label>
                                    <input type="text" name="usu_celular" maxlength="10" minlength="10" pattern="[0-9]+" value="{{old('usu_celular')}}" required class="form-control" placeholder="Celular...">
                                </div>
                            </div>
 
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_apellido">Apellido</label> <label for="usu_apellido" style="color:red">*</label>
                                    <input type="text" name="usu_apellido" maxlength="50" minlength="3" pattern="([a-zA-Z]| )+" value="{{old('usu_apellido')}}" required class="form-control" placeholder="Apellido...">
                                </div>
                            </div>
                       							
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_direccion">Dirección</label>
                                    <input type="text" name="usu_direccion" maxlength="100" value="{{old('usu_direccion')}}" class="form-control" placeholder="Dirección...">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_fechaN">Fecha de nacimiento</label> <label for="usu_fechaN" style="color:red">*</label>
                                    <input type="date" name="usu_fechaN" min="1950-01-01" max="2000-01-01" value="{{old('usu_fechaN')}}" required class="form-control" placeholder="Fecha de N...">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label for="idRol">Rol</label> <label for="idRol" style="color:red">*</label>
                                <select required class="form-control" id="idRol" name="idRol">
                                <option value="">-- Seleccionar --</option>
                                @foreach ($roles as $r)
                                    @if($r->display_name!='Root')
                                        <option value="{{$r->id}}">{{$r->display_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>				
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_email">Email</label> <label for="usu_email" style="color:red">*</label>
                                    <input type="email" name="usu_email" maxlength="50" value="{{old('usu_email')}}" required class="form-control" placeholder="Email...">
                                </div>
                            </div>
                        			
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_foto">Foto</label> <label for="usu_direccion" ></label>
                                    <input type="file" name="usu_foto"   value="{{old('usu_direccion')}}" class="form-control">
                                </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<a class="btn btn-danger" href="{{url('usuarios')}}">Cancelar</a>
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
				</div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
