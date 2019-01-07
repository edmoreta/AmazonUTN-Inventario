<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\DetalleDocumento;
use App\Documento;
use App\Producto;
use Carbon\Carbon;
use App\Proveedor;
use App\Http\Requests\AjusteRequest;

class AjustesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = DB::table('inv_proveedores')->get();
        $productos = DB::table('inv_productos as art')
            ->where('art.pro_estado', '=', true)
            ->get();
        $fecha_actual = date("Y-m-d");
        return view('documentos.ajustes.create', ["proveedores" => $proveedores, "productos" => $productos, "fecha_actual" => $fecha_actual]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AjusteRequest $request)
    {
        try {
            //Registrando Cabecera jiji
            DB::beginTransaction();
            $ajuste = new Documento;
            $ajuste->doc_codigo = 'AJ-' . $request->get('doc_codigo');
            $ajuste->doc_fecha = $request->get('doc_fecha');
            $ajuste->doc_tipo = "AJ";
          // $ajuste->prv_id='1';

            $mytime = Carbon::now('America/Bogota');
            $ajuste->doc_created_at = $mytime->toDateTimeString();

            $ajuste_buscar = DB::select('SELECT * FROM inv_documentos doc WHERE doc.doc_codigo=?  AND doc.doc_tipo=?', [$ajuste->doc_codigo, $ajuste->doc_tipo]);
            if ($ajuste_buscar != null) {
                return back()->with('errores', 'El Codigo del ajuste ya existe')->withInput();
            } else {
               $ajuste->save();

                $pro_id = $request->get('pro_id');
                $cantidad = $request->get('cantidad');
                $tipo_ajuste = $request->get('tipo_ajuste');
                $precio = $request->get('precio');
                $costo = $request->get('costo');

                $cont = 0;


                while ($cont < count($pro_id)) {
                //Registrando Detalle jojo

                    $movimiento = new DetalleDocumento();
                    $movimiento->doc_id = $ajuste->doc_id;
                    $movimiento->pro_id = $pro_id[$cont];
                    $movimiento->mov_cantidad = $cantidad[$cont];
                    $movimiento->mov_costo = $costo[$cont];
                    $movimiento->mov_precio = $precio[$cont];
                    $movimiento->mov_estado = true;

                    echo $costo[$cont];
                    $movimiento->save();
                //Modificando producto JEJE xd
                    $producto = Producto::findOrFail($pro_id[$cont]);
                    $producto->pro_precio = $precio[$cont];
                    if ($tipo_ajuste[$cont] == "Positivo") {
                        $producto->pro_stock = $producto->pro_stock + $cantidad[$cont];
                    } else {
                        $producto->pro_stock = $producto->pro_stock - $cantidad[$cont];
                    }
                    $producto->update();

                    $cont = $cont + 1;


                }

                DB::commit();
                return redirect('documentos')->with('success', 'Ajuste ' . $ajuste->doc_codigo . ' registrado con éxito');
            }
        } catch (Exception $e) {
            DB::rollback();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
