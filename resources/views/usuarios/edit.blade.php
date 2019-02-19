@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('usuarios')}}" title="Regresar al listado" role="button">
	<i class="fa fa-reply" aria-hidden="true"></i>
</a>
<div align="right">
<a class="btn btn-info" href="{{ url('User/Resend/'.$usuario->usu_id) }}">Restablecer contraseña</a> 
</div>
</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h3>Editar Usuario</h3>			
				@include('includes.messages')				
		</div>
	</div>
	{!! Form::open(['route' => ['usuarios.update', $usuario->usu_id],'method' => 'PATCH','files' => 'true']) !!}				
	<input type="hidden" name="usu_id" value="{{ $usuario->usu_id }}">
    <div class="row">	
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_cedula">Cédula</label> <label for="usu_cedula" style="color:red">*</label>
                                    <input type="text" name="usu_cedula" maxlength="10" minlength="10" pattern="[0-9]+" value="{{$usuario->usu_cedula}}" required class="form-control" >
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_telefono">Teléfono</label> <label for="usu_telefono"></label>
                                    <input type="text" name="usu_telefono" 
                                    maxlength="12" minlength="9" 
                                    pattern="([+]593|0)([0-9]{8})"
                                    oninvalid="setCustomValidity('Si el número de teléfono contiene +593 debe tener 12 caracteres, si no debe contener 9 digitos Ej: 068954569 o +59368954569')"
                                    oninput="setCustomValidity('')"
                                    title="Debe contener solo números y +593 Ej: 068954569 o +59368954569"
                                    value="{{$usuario->usu_telefono}}" class="form-control" >
                                </div>
                            </div>						
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_nombre">Nombre</label> <label for="usu_nombre" style="color:red">*</label>
                                    <input type="text" name="usu_nombre" maxlength="50" minlength="3" pattern="([a-zA-Z]| |ñ|Ñ|á|Á|é|É|í|Í|ó|Ó|ú|Ú)+" value="{{$usuario->usu_nombre}}" required class="form-control" >
                                </div>
                            </div>
                          
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_celular">Celular</label> <label for="usu_celular" style="color:red">*</label>
                                    <input type="text" name="usu_celular" 
                                    maxlength="13" minlength="10"
                                    pattern="([+]593|0)([0-9]{9})"
                                        oninvalid="setCustomValidity('El celular debe contener solo números y +593 Ej: 0985645723 o +593985645723')"
                                        oninput="setCustomValidity('')"
                                        title="Debe contener solo números y +593 Ej: 0985645723 o +593985645723"
                                    value="{{$usuario->usu_celular}}" required class="form-control" >
                                </div>
                            </div>
 
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_apellido">Apellido</label> <label for="usu_apellido" style="color:red">*</label>
                                    <input type="text" name="usu_apellido" maxlength="50" minlength="3" pattern="([a-zA-Z]| |ñ|Ñ|á|Á|é|É|í|Í|ó|Ó|ú|Ú)+" value="{{$usuario->usu_apellido}}" required class="form-control" >
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_direccion">Dirección</label> <label for="usu_direccion" style="color:red">*</label>
                                    <input type="text" name="usu_direccion" 
                                    pattern="[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü ]+"
                                    oninvalid="setCustomValidity('La dirección solo debe contener letras, números, guiones medios y puntos Ej: Av. 13 de Julio - Ibarra')"
                                    oninput="setCustomValidity('')"
                                    title="Solo debe contener letras, números, guiones medios y puntos Ej: Av. 13 de Julio - Ibarra"
                                    id="direccion" maxlength="100" required value="{{old('usu_direccion')}}" class="form-control"
                                   
                                     value="{{$usuario->usu_direccion}}" class="form-control" >
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_fechaN">Fecha de nacimiento</label> <label for="usu_fechaN" style="color:red">*</label>
                                    <input type="date" name="usu_fechaN" min="1950-01-01" max="2000-01-01" value="{{$usuario->usu_fechaN}}" required class="form-control" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label for="idRol">Rol</label> <label for="idRol" style="color:red">*</label>
                                <select required class="form-control" id="idRol" name="idRol">
                               		@foreach ($roles as $r)
                                        @if($r->display_name!='Root')
                                            @if($r->id == $usuario->roles->first()->id)
                                                <option value="{{$r->id}}" selected>{{$r->display_name}}</option>
                                            @else
                                                <option value="{{$r->id}}" >{{$r->display_name}}</option>
                                            @endif
                                        @endif
                                	@endforeach
                           		</select>
                            </div>
                        </div>									
                        	
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usu_email">Email</label> 
                                    <input type="email" name="usu_email" 
                                    maxlength="50" 
                                    pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$"
                                    oninvalid="setCustomValidity('El correo debe contener el nombre de usuario, el signo @ y el dominio Ej: juan@dominio.com')"
                                    oninput="setCustomValidity('')"
                                    title="Debe contener el nombre de usuario, el signo @ y el dominio Ej: juan@dominio.com"
                                    value="{{$usuario->usu_email}}" required class="form-control" >
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
                                    <label for="usu_estado">Estado</label> <label for="usu_estado" style="color:red">*</label>
									<select required class="form-control" id="usu_estado" name="usu_estado">
                                    <option value="true" <?php 
                                            if($usuario->usu_estado){
                                            echo 'selected'; }?>>Activo</option>
                                                    <option value="false" <?php 
                                             	if (!$usuario->usu_estado) {  
                                                    echo 'selected';
                                                }?>>Inactivo</option>     
									</select>
                                </div>
                            </div>	
                            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    @if($usuario->usu_foto == null)
                                        -								
                                    @else
                                        
                                        <img src="{{ "data:image/" . $usuario->usu_fototype . ";base64," . $usuario->usu_foto }}" style="max-width:250px;">
                                    @endif
                                </div>
                            </div>
                           
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<a class="btn btn-danger" href="{{url('usuarios')}}">Cancelar</a>
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
				</div>
				</div>
			</div>
			{!!Form::close()!!}		
@endsection