<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DetalleDocumento;
use App\Documento;
use App\Producto;
use Carbon\Carbon;
use App\Http\Requests\FacturaIngresoRequest;
use Illuminate\Validation\Rule;

class NotasDeCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentosJoin = DB::select('SELECT * FROM inv_documentos d INNER JOIN inv_proveedores p ON  d.prv_id=p.prv_id  AND d.doc_tipo = ?', ['FA']);
       // $documentosJoin = DB::select('SELECT * FROM inv_documentos d INNER JOIN inv_proveedores p ON  d.prv_id=p.prv_id LEFT JOIN inv_movimientos m on d.doc_id=m.doc_id LEFT JOIN inv_productos prod on m.pro_id=prod.pro_id  AND d.doc_tipo = ?', ['FA']);
        return view('documentos.notaCredito.create', ["documentosJoin" => $documentosJoin,"documentosJo" => null,"id"=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('cantidad')!=null) {
            $docs = DB::select('SELECT * FROM inv_documentos d WHERE d.doc_tipo=? ORDER BY doc_id',["NC"]);
            $doc="0";
            foreach ($docs as $dc) {
                $doc=$dc;
            }
            $cod="1";
            if ($doc!="0") {
                $cod = substr($doc->doc_codigo, 3);
                $cod+=1;
            }
            $ingreso = new Documento;
            $ingreso->doc_tipo = 'NC';
            $ingreso->prv_id=$request->get('id_prov');
            $ingreso->doc_codigo='NC-'.$cod;
            $ingreso->doc_fecha=$request->get('fechia');
            $mytime = Carbon::now('America/Bogota');
            $ingreso->doc_created_at = $mytime->toDateTimeString();
            $ingreso->save();
            $doc_id=$request->get('doc_id');
            $docum = DB::select('SELECT * FROM inv_documentos d WHERE d.doc_codigo=?',['NC-'.$cod]);
            $docu=$docum[0];
            //pro_id, doc_id, mov_cantidad, mov_costo, mov_precio, mov_estado
            $pro_id=$request->get('pro_id');
            $doc_idS=$docu->doc_id;
            $cantidad=$request->get('cantidad');
            $costo=$request->get('costo');
            $precio=$request->get('precio');
            $in=0;
            foreach ($pro_id as $proi) {
                DB::table('inv_movimientos')
                ->where('doc_id', $doc_id)
                ->where('pro_id', $proi)
                ->update(['mov_estado' => false]);
                $produc = Producto::findOrFail($proi);
                $produc->pro_stock=$produc->pro_stock-$cantidad[$in];
                $produc->update();
                $movimiento = new DetalleDocumento();
                $movimiento->doc_id = $doc_idS;
                $movimiento->pro_id = $proi;
                $movimiento->mov_cantidad = $cantidad[$in];
                $movimiento->mov_costo = $costo[$in];
                $movimiento->mov_precio = $precio[$in];
                $movimiento->save();
                $in++;
            }
            return redirect('documentos')->with('success', 'Nota de Credito ' . $ingreso->doc_codigo . ' registrada con éxito');
        }else{
            return back()->with('error_prov', 'No ha agregado los productos')->withInput();
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
        $documentosJo = DB::select('SELECT p.pro_id, p.pro_nombre,m.mov_cantidad, m.mov_costo, m.mov_precio, d.prv_id, d.doc_id
        FROM inv_productos p, inv_movimientos m, inv_documentos d
        WHERE p.pro_id=m.pro_id AND d.doc_id=m.doc_id AND d.doc_tipo=? AND d.doc_codigo=? AND m.mov_estado=true', ["FA",$id]);
        $documentosJoin = DB::select('SELECT * FROM inv_documentos d INNER JOIN inv_proveedores p ON  d.prv_id=p.prv_id  AND d.doc_tipo = ?', ['FA']);
        return view('documentos.notaCredito.create', ["documentosJoin" => $documentosJoin,"documentosJo" => $documentosJo,"id"=>$id]);
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