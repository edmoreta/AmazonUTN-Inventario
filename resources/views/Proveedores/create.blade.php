@extends ('layouts.inicio')
@section ('contenido')
<div class="card-header"> <a class="btn btn-success" href="{{url('proveedores')}}" title="Regresar al listado"
        role="button">
        <i class="fa fa-reply" aria-hidden="true"></i>
    	</a>
</div>
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <h3>Nuevo Proveedor</h3>
        @include('includes.messages')
    </div>
</div>
{!! Form::open(['url' => 'proveedores','files'=>'true']) !!}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_codigo">Código</label>
            <input type="text" name="codigo" value="{{ 'PRV-'.$cod }}" disabled class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_nombre">Nombre</label> <label for="prv_nombre" style="color:red">*</label>
            <input type="text" name="prv_nombre" id="nombre" maxlength="100" minlength="3"
                pattern="[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]+"
                oninvalid="setCustomValidity('El nombre solo debe contener letras mayúsculas y minúsculas ej. Juan Perez y debe contener más de 3 letras')"
				oninput="setCustomValidity('')"
				title="Solo debe contener letras mayúsculas y minúsculas ej. Juan Perez"
                value="{{old('prv_nombre')}}" required class="form-control" placeholder="Ej: Juan Perez">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_direccion">Dirección</label> <label for="prv_direccion" style="color:red">*</label>
            <input type="text" name="prv_direccion" 
				pattern="[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü ]+"
                oninvalid="setCustomValidity('La dirección solo debe contener letras, números, guiones medios y puntos Ej: Av. 13 de Julio - Ibarra')"
				oninput="setCustomValidity('')"
				title="Solo debe contener letras, números, guiones medios y puntos Ej: Av. 13 de Julio - Ibarra"
                id="direccion" maxlength="100" required value="{{old('prv_direccion')}}" class="form-control"
                placeholder="Ej: Av. 13 de Julio - Ibarra">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_email">Correo Electrónico</label><label for="prv_email" style="color:red">*</label>
            <input type="email" name="prv_email" 
                maxlength="50" 
				pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$"
				oninvalid="setCustomValidity('El correo debe contener el nombre de usuario, el signo @ y el dominio Ej: juan@dominio.com')"
				oninput="setCustomValidity('')"
				title="Debe contener el nombre de usuario, el signo @ y el dominio Ej: juan@dominio.com"
				value="{{old('prv_email')}}" required
                class="form-control" placeholder="Ej: juan@dominio.com">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_descripcion">Descripción</label>
            <input type="text" name="prv_descripcion" maxlength="100" value="{{old('prv_descripcion')}}"
				pattern="[a-zA-Z0-9 ]*"
				oninvalid="setCustomValidity('La descripción solo debe contener letras y números')"
				oninput="setCustomValidity('')"
				title="Solo debe contener letras y números"
                class="form-control" placeholder="Descripción...">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_tipo_identificacion">Tipo Identificación</label><label for="prv_tipo_identificacion"
                style="color:red">*</label>
            <select name="prv_tipo_identificacion" class="form-control">
                <option value="CI">CI</option>
                <option value="RUC">RUC</option>
                <option value="RISE">RISE</option>
            </select>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_identificacion">Identificación</label><label for="prv_identificacion"
                style="color:red">*</label>
            <input type="text" name="prv_identificacion" maxlength="13" minlength="10" pattern="[0-9]+"
				oninvalid="setCustomValidity('La identificación solo debe contener números Ej: 1002003001')"
				oninput="setCustomValidity('')"
				title="Solo debe contener números Ej: 1002003001"
                value="{{old('prv_identificacion')}}" required class="form-control" placeholder="Ej: 1002003001">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_celular">Celular</label>
            <input type="text" name="prv_celular" maxlength="13" minlength="10"
				pattern="([+]593|0)([0-9]{9})"
				oninvalid="setCustomValidity('El celular debe contener solo números y +593 Ej: 0985645723 o +593985645723')"
				oninput="setCustomValidity('')"
				title="Debe contener solo números y +593 Ej: 0985645723 o +593985645723"
                value="{{old('prv_celular')}}" class="form-control" placeholder="Ej: 0985645723 o +593985645723">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="prv_telefono">Teléfono</label>
            <input type="text" name="prv_telefono"  maxlength="12" minlength="9"
				pattern="([+]593|0)([0-9]{8})"
				oninvalid="setCustomValidity('Si el teléfono contiene +593 debe tener 12 caracteres, si no debe contener 9 digitos Ej: 068954569 o +59368954569')"
				oninput="setCustomValidity('')"
				title="Debe contener solo números y +593 Ej: 068954569 o +59368954569"
                value="{{old('prv_telefono')}}" class="form-control" placeholder="Ej: 068954569 o +59368954569">
        </div>
    </div>

    <input type="hidden" name="prv_codigo" value="{{ 'PRV-'.$cod }}">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <a class="btn btn-danger" href="{{url('proveedores')}}">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection