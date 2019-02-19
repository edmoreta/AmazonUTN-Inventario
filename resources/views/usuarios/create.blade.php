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
                                    <label for="usu_cedula">Cédula</label> <label for="usu_cedula" style="color:red">*</label>
                                    <input type="text" name="usu_cedula" maxlength="10" minlength="10" pattern="[0-9]+" 
                                   
                                   
                                    value="{{old('usu_cedula')}}" required class="form-control" placeholder="Ej: 1002003001">
                                
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_telefono">Teléfono</label> <label for="usu_telefono"></label>
                                    <input type="text" name="usu_telefono" maxlength="12" minlength="9" 
                                    pattern="([+]593|0)([0-9]{8})"
                                    oninvalid="setCustomValidity('Si el número de teléfono contiene +593 debe tener 12 caracteres, si no debe contener 9 digitos Ej: 068954569 o +59368954569')"
                                    oninput="setCustomValidity('')"
                                    title="Debe contener solo números y +593 Ej: 068954569 o +59368954569"
                                    value="{{old('usu_telefono')}}" class="form-control" placeholder="Ej: 068954569 o +59368954569">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_nombre">Nombre</label> <label for="usu_nombre" style="color:red">*</label>
                                    <input type="text" name="usu_nombre" maxlength="50" minlength="3" pattern="([a-zA-Z]| |ñ|Ñ|á|Á|é|É|í|Í|ó|Ó|ú|Ú)+" value="{{old('usu_nombre')}}" required class="form-control" placeholder="Ej: José ">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_celular">Celular</label> <label for="usu_celular" style="color:red">*</label>
                                    <input type="text" name="usu_celular" maxlength="13" minlength="10"
                                    pattern="([+]593|0)([0-9]{9})"
                                        oninvalid="setCustomValidity('El celular debe contener solo números y +593 Ej: 0985645723 o +593985645723')"
                                        oninput="setCustomValidity('')"
                                        title="Debe contener solo números y +593 Ej: 0985645723 o +593985645723"
                                        value="{{old('usu_celular')}}" class="form-control" placeholder="Ej: 0985645723 o +593985645723">
                                </div>
                            </div>
 
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_apellido">Apellido</label> <label for="usu_apellido" style="color:red">*</label>
                                    <input type="text" name="usu_apellido" maxlength="50" minlength="3" pattern="([a-zA-Z]| |ñ|Ñ|á|Á|é|É|í|Í|ó|Ó|ú|Ú)+" value="{{old('usu_apellido')}}" required class="form-control" placeholder="Ej: Fernandez">
                                </div>
                            </div>
                       							
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_direccion">Dirección</label>
                                    <input type="text" name="usu_direccion" 
                                    pattern="[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü ]+"
                                    oninvalid="setCustomValidity('La dirección solo debe contener letras, números, guiones medios y puntos Ej: Av. 13 de Julio - Ibarra')"
                                    oninput="setCustomValidity('')"
                                    title="Solo debe contener letras, números, guiones medios y puntos Ej: Av. 13 de Julio - Ibarra"
                                    id="direccion" maxlength="100" required value="{{old('usu_direccion')}}" class="form-control"
                                    placeholder="Ej: Av. 13 de Octubre - Otavalo">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_fechaN">Fecha de nacimiento</label> <label for="usu_fechaN" style="color:red">*</label>
                                    <input type="date" name="usu_fechaN" min="1950-01-01" max="2000-01-01" value="2000-01-01" required class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label for="idRol">Rol</label> <label for="idRol" style="color:red">*</label>
                                <select required class="form-control" id="idRol" name="idRol">
                                <option value="">-- Seleccionar --</option>
                                @foreach ($roles as $r)
                                    @if($r->display_name!='Root')
                                        <option value="{{$r->id}}"  {{ (old('idRol') == $r->id ? "selected":"") }}>{{$r->display_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>				
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_email">Email</label> <label for="usu_email" style="color:red">*</label>
                                    <input type="email" name="usu_email" 
                                    maxlength="50" 
                                    pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$"
                                    oninvalid="setCustomValidity('El correo debe contener el nombre de usuario, el signo @ y el dominio Ej: juan@dominio.com')"
                                    oninput="setCustomValidity('')"
                                    title="Debe contener el nombre de usuario, el signo @ y el dominio Ej: juan@dominio.com"
                                    value="{{old('usu_email')}}" required
                                    class="form-control" placeholder="Ej: juan@dominio.com">
                                </div>
                            </div>
                        			
                            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_foto">Foto</label> <label for="usu_foto" ></label>
                                    <input type="file" name="usu_foto" id="usu_foto" class="form-control">
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
