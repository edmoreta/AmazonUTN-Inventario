<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use App\Proveedor;
use App\Http\Requests\ProveedorRequest;

class ProveedoresController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $pag = trim($request->get('pag'));
            if ($pag=="") {
                $pag=7;
            }
            $proveedores = DB::table('inv_proveedores as ip')
            ->orWhere('ip.prv_nombre', 'LIKE', '%' . $query . '%')
            ->orWhere('ip.prv_identificacion', 'LIKE', '%' . $query . '%')
            ->orderby('prv_updated_at','desc')
            ->paginate($pag);
            return view('proveedores.index', ["proveedores" => $proveedores, "searchText" => $query,"pag" => $pag]);
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
        $proveedores = DB::select('SELECT * FROM inv_proveedores ORDER BY prv_id');
        foreach ($proveedores as $prv) {
            $proveedor=$prv;
        }
        $cod = substr($proveedor->prv_codigo, 4);
        $cod+=1;
        return view('proveedores.create', ["cod" => $cod]);
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
            if ($proveedor->prv_identificacion=='CI') {
                $prov_buscar = DB::table('inv_proveedores')
                ->orWhere('prv_codigo', '=', $proveedor->prv_codigo)
                ->orWhere('prv_identificacion', '=', $proveedor->prv_identificacion)
                ->orWhere('prv_nombre', '=', $proveedor->prv_nombre)
                ->orWhere('prv_email', '=', $proveedor->prv_email)
                ->paginate();
            }else{
                $prov_buscar = DB::table('inv_proveedores')
                ->orWhere('prv_codigo', '=', $proveedor->prv_codigo)
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
                return back()->with('error_prov', 'Es posible que el usuario ' . $nombre . ' esté usando el código, cédula, nombre o correo electrónico')->withInput();
            } else {
                $proveedor->save();
                return redirect('proveedores')->with('success', 'Proveedor ' . $proveedor->prv_nombre . ' registrado con éxito');
            }
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view("proveedores.show", compact('proveedor'));
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
            
        } catch (Exception $e) {
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
        $proveedor = Proveedor::findOrFail($id);
        return view("proveedores.edit", compact('proveedor'));
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
            if ($proveedor->prv_tipo_identificacion=='CI' & strlen($proveedor->prv_identificacion)>10) {
                return back()->with('error_prov', 'La cedula exede el maximo de 10 caracteres')->withInput();
            }else{
                $proveedor->update();
                return redirect('proveedores')->with('success', 'Proveedor Actualizado con éxito');
            }
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

}
