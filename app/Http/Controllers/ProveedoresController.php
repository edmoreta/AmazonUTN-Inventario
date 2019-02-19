<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use App\Proveedor;
use App\Http\Requests\ProveedorRequest;
use Illuminate\Validation\Validator as LaravelValidator;
use Tavo\ValidadorEc as ValidatorEcPackage;

class ProveedoresController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
        if ($request) {
            $query = trim($request->get('searchText'));
            $pag = trim($request->get('pag'));
            if ($pag=="") {
                $pag=7;
            }
            $estado=$request->get('estado');
            if ($estado!="0"&$estado!="1") {
                $proveedores = DB::table('inv_proveedores as ip')
                ->orWhere('ip.prv_nombre', 'ILIKE', '%' . $query . '%')
                ->orWhere('ip.prv_identificacion', 'ILIKE', '%' . $query . '%')
                ->orderby('prv_updated_at','desc')
                ->paginate($pag);
            }else{
                $proveedores = DB::table('inv_proveedores as ip')
                ->orWhere('ip.prv_nombre', 'ILIKE', '%' . $query . '%')->where('ip.prv_estado', '=',$estado)
                ->orWhere('ip.prv_identificacion', 'ILIKE', '%' . $query . '%')->where('ip.prv_estado', '=',$estado)
                ->orderby('prv_updated_at','desc')
                ->paginate($pag);
            }
            return view('Proveedores.index', ["proveedores" => $proveedores, "searchText" => $query,"pag" => $pag]);
        }
    }catch (\Exception $e) {
        return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $proveedores = DB::select('SELECT * FROM inv_proveedores ORDER BY prv_id');
        $proveedor="0";
        foreach ($proveedores as $prv) {
            $proveedor=$prv;
        }
        $cod="1";
        if ($proveedor!="0") {
            $cod = substr($proveedor->prv_codigo, 4);
            $cod+=1;
        }
        
        return view('Proveedores.create', ["cod" => $cod]);
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        try {
            $proveedor = new Proveedor();
            $proveedor->prv_codigo = $request->get('prv_codigo');
            $proveedor->prv_nombre = $request->get('prv_nombre');
            $proveedor->prv_descripcion = $request->get('prv_descripcion');
            $proveedor->prv_identificacion = $request->get('prv_identificacion');
            $proveedor->prv_tipo_identificacion = $request->get('prv_tipo_identificacion');
            $proveedor->prv_direccion = $request->get('prv_direccion');
            $proveedor->prv_email = $request->get('prv_email');
            $proveedor->prv_telefono = $request->get('prv_telefono');
            $proveedor->prv_celular = $request->get('prv_celular');
            $proveedor->prv_estado=true;
            $validatorEc = new ValidatorEcPackage();
            if ($proveedor->prv_tipo_identificacion=='CI') {
                $isValid = $validatorEc->validarCedula($proveedor->prv_identificacion);
                if (!$isValid) {
                    return back()->with('error_prov', 'La cédula es INCORRECTA')->withInput();
                }
                $prov_buscar = DB::table('inv_proveedores')
                ->orWhere('prv_identificacion', '=', $proveedor->prv_identificacion)
                ->orWhere('prv_nombre', '=', $proveedor->prv_nombre)
                ->orWhere('prv_email', '=', $proveedor->prv_email)
                ->paginate();
            }else{
                $isValid1 = $validatorEc->validarRucPersonaNatural($proveedor->prv_identificacion);
                $isValid2 = $validatorEc->validarRucSociedadPublica($proveedor->prv_identificacion);
                $isValid3 = $validatorEc->validarRucSociedadPrivada($proveedor->prv_identificacion);
                if (!$isValid1&&!$isValid2&&!$isValid3) {
                    return back()->with('error_prov', 'El RUC es INCORRECTA')->withInput();
                }
                $prov_buscar = DB::table('inv_proveedores')
                ->orWhere('prv_nombre', '=', $proveedor->prv_nombre)
                ->orWhere('prv_email', '=', $proveedor->prv_email)
                ->paginate();
            }
            $cont = 0;
            $estdo = 0;
            $nombre = '';
            foreach ($prov_buscar as $pr) {
                $estdo = $pr->prv_estado;
                $nombre = $pr->prv_nombre;
                $cont++;
            }

            if ($proveedor->prv_tipo_identificacion=='CI' & strlen($proveedor->prv_identificacion)>10) {
                return back()->with('error_prov', 'La cédula debe tener 10 dígitos')->withInput();
            } else if ($estdo = 1 & $cont >= 1) {
                return back()->with('error_prov', 'Es posible que el usuario ' . $nombre . ' esté usando la cédula, nombre o correo electrónico')->withInput();
            } else {
                $proveedor->save();
                return redirect('proveedores')->with('success', 'Proveedor ' . $proveedor->prv_nombre . ' registrado con éxito');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function estado($id,$est)
    {
        try {
            //$query = trim($request->get('id'));
            //$est = trim($request->get('est'));
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->prv_estado = $est;
            $proveedor->update();
            if ($est=='f') {
                return redirect('proveedores')->with('success', 'Proveedor Desactivado con éxito','3000');
            }else{
                return redirect('proveedores')->with('success', 'Proveedor Activado con éxito');
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $proveedor = Proveedor::findOrFail($id);
        return view("Proveedores.edit", compact('proveedor'));
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request, $id)
    {

        try {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->prv_codigo = $request->get('prv_codigo');
            $proveedor->prv_nombre = $request->get('prv_nombre');
            $proveedor->prv_descripcion = $request->get('prv_descripcion');
            $proveedor->prv_identificacion = $request->get('prv_identificacion');
            $proveedor->prv_tipo_identificacion = $request->get('prv_tipo_identificacion');
            $proveedor->prv_direccion = $request->get('prv_direccion');
            $proveedor->prv_email = $request->get('prv_email');
            $proveedor->prv_telefono = $request->get('prv_telefono');
            $proveedor->prv_celular = $request->get('prv_celular');
            $proveedor->prv_estado = $request->get('prv_estado');
            $validatorEc = new ValidatorEcPackage();
            if ($proveedor->prv_tipo_identificacion=='CI') {
                $isValid = $validatorEc->validarCedula($proveedor->prv_identificacion);
                if (!$isValid) {
                    return back()->with('error_prov', 'La cédula es INCORRECTA')->withInput();
                }
                $proveedor->update();
                return redirect('proveedores')->with('success', 'Proveedor Actualizado con éxito');
            }else{
                $isValid1 = $validatorEc->validarRucPersonaNatural($proveedor->prv_identificacion);
                $isValid2 = $validatorEc->validarRucSociedadPublica($proveedor->prv_identificacion);
                $isValid3 = $validatorEc->validarRucSociedadPrivada($proveedor->prv_identificacion);
                if (!$isValid1&&!$isValid2&&!$isValid3) {
                    return back()->with('error_prov', 'El RUC es INCORRECTA')->withInput();
                }
                $proveedor->update();
                return redirect('proveedores')->with('success', 'Proveedor Actualizado con éxito');
            }
        }catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

}