<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use App\Proveedor;
use App\Http\Requests\ProveedorRequest;

class PrincipalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $proveedores = DB::table('inv_proveedores as ip')
            ->orWhere('ip.prv_nombre', 'LIKE', '%' . $query . '%')
            ->orWhere('ip.prv_identificacion', 'LIKE', '%' . $query . '%')
            ->orderby('prv_id')
            ->paginate(7);
            return view('Proveedores.proveedores', ["proveedores" => $proveedores, "searchText" => $query]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Proveedores.create');
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
            $prov_buscar = DB::table('inv_proveedores')
            ->orWhere('prv_codigo', '=', $proveedor->prv_codigo)
            ->orWhere('prv_identificacion', '=', $proveedor->prv_identificacion)
            ->orWhere('prv_email', '=', $proveedor->prv_email)
            ->paginate();
            $cont = 0;
            $estdo = 0;
            $nombre = '';
            $aidi=1;
            foreach ($prov_buscar as $pr) {
                $estdo = $pr->prv_estado;
                $nombre = $pr->prv_nombre;
                $aidi=$pr->prv_id;
                $cont++;
            }
            if ($estdo = 1 & $cont >= 1) {
                return back()->with('error_prov', 'Es posible que el usuario ' . $nombre . ' este usando el codigo, identificación o correo electronico')->withInput();
            } else {
                $proveedor->save();
                return redirect('proveedores/lista')->with('success', 'Proveedor ' . $proveedor->prv_nombre . ' registrado con éxito');
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
        return view("Proveedores.show", compact('proveedor'));
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
                return redirect('proveedores/lista')->with('success', 'Proveedor Desactivado con éxito');
            }else{
                return redirect('proveedores/lista')->with('success', 'Proveedor Activado con éxito');
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
        return view("Proveedores.edit", compact('proveedor'));
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
            $proveedor->update();
            return redirect('proveedores/lista')->with('success', 'Proveedor Actualizado con éxito');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

}
