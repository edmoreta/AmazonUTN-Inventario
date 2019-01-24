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

        $documentosFa = DB::table('inv_documentos as doc')
            ->where('doc.doc_tipo', '=', 'FA')
            ->get();

        $productos = DB::table('inv_productos as art')
            ->where('art.pro_estado', '=', true)
            ->get();




        return view('documentos.notaCredito.create', ["proveedores" => $proveedores, "productos" => $productos, "documentosFa" => $documentosFa]);

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