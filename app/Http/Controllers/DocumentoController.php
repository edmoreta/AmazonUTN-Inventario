<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Documento;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {




            if ($request) {
                $query = trim($request->get('searchText'));
                $pag = trim($request->get('pag'));
                if ($pag == "") {
                    $pag = 7;
                }
                $documentos = DB::table('inv_documentos as doc')
                    ->leftJoin('inv_proveedores as p', 'doc.prv_id', '=', 'p.prv_id')
                    ->select('p.prv_nombre', 'doc_codigo', 'doc.doc_tipo', 'doc_fecha', 'doc.doc_id')
                    ->orWhere('doc.doc_codigo', 'LIKE', '%' . $query . '%')
                    ->orWhere('doc.doc_tipo', 'LIKE', '%' . $query . '%')
                    ->orderby('doc.doc_created_at', 'desc')
                    ->paginate($pag);
                return view('documentos.index', ["documentos" => $documentos, "searchText" => $query, "pag" => $pag]);
            }
        } catch (\Throwable $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }
    public function stock(Request $request)
    {

        try {

            if ($request) {
                $query = trim($request->get('searchText'));
                $pag = trim($request->get('pag'));
                if ($pag == "") {
                    $pag = 7;
                }


                $movimientos = DB::table('inv_movimientos as mov')
                    ->join('inv_documentos as doc', 'mov.doc_id', '=', 'doc.doc_id')
                    ->join('inv_productos as pro', 'mov.pro_id', '=', 'pro.pro_id')
                    ->select('doc.doc_tipo as tipo', 'doc.doc_codigo as codigo', 'doc.doc_fecha as fecha', 'pro.pro_nombre as producto', 'mov_cantidad as cantidad', 'mov_precio as precio', 'mov_costo as costo')
                    ->orWhere('doc.doc_codigo', 'LIKE', '%' . $query . '%')
                    ->orWhere('doc.doc_tipo', 'LIKE', '%' . $query . '%')
                    ->orderby('doc.doc_created_at', 'desc')
                    ->paginate($pag);
                return view('documentos.stock', ["movimientos" => $movimientos, "searchText" => $query, "pag" => $pag]);
            }
        } catch (\Throwable $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {


            $documento = Documento::with('proveedor')->findOrFail($id);


            $detalles = DB::table('inv_movimientos as mov')
                ->join('inv_productos as pro', 'mov.pro_id', '=', 'pro.pro_id')
                ->select(
                    'pro.pro_nombre',
                    'mov.mov_ajuste',
                    'mov.mov_cantidad',
                    'mov.mov_precio',
                    'mov.mov_costo'
                )
                ->where('mov.doc_id', '=', $id)
                ->get();

            return view("documentos.show", ["documento" => $documento, "detalles" => $detalles]);
        } catch (\Throwable $th) {
            return back()->withErrors(['exception' => $th->getMessage()])->withInput();
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
