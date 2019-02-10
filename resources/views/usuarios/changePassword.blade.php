@extends ('layouts.inicio')
@section('contenido')
<div class="card-header"> <a class="btn btn-success" href="" title="Regresar al listado" role="button">
	<i class="fa fa-reply" aria-hidden="true"></i>
</a></div>
<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h3>Cambiar contraseña</h3>			
		</div>
	</div>
					
	<div class="row">	
    {!! Form::open(['url' => \LaravelLocalization::getCurrentLocale().'/change_password']) !!}
                                            <div class="form-group row">
                                                <label for="password_now" class="col-sm-2 col-form-label">Contraseña actual</label>
                                                <div class="col-sm-10">
                                                    <input required type="password" class="form-control" id="password_now" name="password_now" minlength="8" maxlength="25">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Nueva contraseña</label>
                                                <div class="col-sm-10">
                                                    <input required type="password" class="form-control" id="password" name="password" minlength="8" maxlength="25">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password_confirmed" class="col-sm-2 col-form-label">Confirmar contraseña</label>
                                                    <div class="col-sm-10">
                                                    <input required type="password" class="form-control" id="password_confirmed" name="password_confirmation" minlength="8" maxlength="25">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}						
                            
    </div>
                            
@endsection