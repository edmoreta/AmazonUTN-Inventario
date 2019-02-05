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
        $proveedores = DB::table('inv_proveedores as prv')
            ->where('prv.prv_estado', '=', true)
            ->get();



        $documentosJoin = DB::select('SELECT * FROM inv_documentos d INNER JOIN inv_proveedores p ON  d.prv_id=p.prv_id  AND d.doc_tipo = ?', ['FA']);
       // $documentosJoin = DB::select('SELECT * FROM inv_documentos d INNER JOIN inv_proveedores p ON  d.prv_id=p.prv_id LEFT JOIN inv_movimientos m on d.doc_id=m.doc_id LEFT JOIN inv_productos prod on m.pro_id=prod.pro_id  AND d.doc_tipo = ?', ['FA']);

        //dd($documentosJoin);


        $ProveedorT = DB::table('inv_proveedores as p')
            ->where('p.prv_id', '=', '');

        $productos = DB::table('inv_productos as art')
            ->where('art.pro_estado', '=', true)
            ->get();




        return view('documentos.notaCredito.create', ["proveedores" => $proveedores, "productos" => $productos, "documentosJoin" => $documentosJoin]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $documentosJo = DB::select('SELECT * FROM inv_documentos d WHERE d.doc_tipo=?   AND d.doc_codigo=?', ['FA', $id]);
        dd($documentosJo);

        return view('documentos.notaCredito.create', ["documentosJo" => $documentosJo]);

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
