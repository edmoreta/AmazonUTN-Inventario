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
                                    <input type="text" name="usu_telefono" maxlength="9" minlength="9" pattern="[0-9]+" value="{{$usuario->usu_telefono}}" class="form-control" >
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
                                    <input type="text" name="usu_celular" maxlength="10" minlength="10" pattern="[0-9]+" value="{{$usuario->usu_celular}}" required class="form-control" >
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
                                    <input type="text" name="usu_direccion" maxlength="100" value="{{$usuario->usu_direccion}}" class="form-control" >
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
                                    <input type="email" name="usu_email" maxlength="50" value="{{$usuario->usu_email}}" required class="form-control" >
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
                                        <img src="{{\Storage::url($usuario->usu_foto)}}" style="max-width:250px;">
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