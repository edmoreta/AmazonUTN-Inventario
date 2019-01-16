<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\DetalleDocumento;
use App\Documento;
use App\Producto;
use Carbon\Carbon;
use App\Http\Requests\FacturaIngresoRequest;
use Illuminate\Validation\Rule;

class FacturaIngresoController extends Controller
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
        $proveedores = DB::table('inv_proveedores as prv')
            ->where('prv.prv_estado', '=', true)
            ->get();
        $productos = DB::table('inv_productos as art')
            ->where('art.pro_estado', '=', true)
            ->get();
        $fecha_actual = date("Y-m-d");
        return view('documentos.ingresos.create', ["proveedores" => $proveedores, "productos" => $productos, "fecha_actual" => $fecha_actual]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaIngresoRequest $request)
    {


        try {
            //Registrando Cabecera jiji
            DB::beginTransaction();
            $ingreso = new Documento;
            $ingreso->prv_id = $request->get('prv_id');
            $ingreso->doc_codigo = 'FA-' . $request->get('doc_codigo');
            $ingreso->doc_fecha = $request->get('doc_fecha');
            $mytime = Carbon::now('America/Bogota');
            $ingreso->doc_created_at = $mytime->toDateTimeString();
            $ingreso->doc_tipo = 'FA';

            $ingreso_buscar = DB::select('SELECT * FROM inv_documentos doc WHERE doc.doc_codigo=? AND doc.prv_id=? AND doc.doc_tipo=?', [$ingreso->doc_codigo, $ingreso->prv_id, $ingreso->doc_tipo]);
            if ($ingreso_buscar != null) {
                return back()->with('errores', 'La factura ya existe')->withInput();
            } else {

                $ingreso->save();
                $pro_id = $request->get('pro_id');
                $cantidad = $request->get('cantidad');
                $costo = $request->get('costo');
                $precio = $request->get('precio');

                $cont = 0;

                while ($cont < count($pro_id)) {
                    //Registrando detalle jojo
                    $movimiento = new DetalleDocumento();
                    $movimiento->doc_id = $ingreso->doc_id;
                    $movimiento->pro_id = $pro_id[$cont];
                    $movimiento->mov_cantidad = $cantidad[$cont];
                    $movimiento->mov_costo = $costo[$cont];
                    $movimiento->mov_precio = $precio[$cont];
                    $movimiento->save();
                    //Modificando producto JEJE xd
                    $producto = Producto::findOrFail($pro_id[$cont]);
                    $producto->pro_costo = $costo[$cont];
                    $producto->pro_precio = $precio[$cont];
                    $producto->pro_stock = $producto->pro_stock + $cantidad[$cont];
                    $producto->update();
                    $cont = $cont + 1;
                }

                DB::commit();
                return redirect('documentos')->with('success', 'Factura ' . $ingreso->doc_codigo . ' registrada con éxito');

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