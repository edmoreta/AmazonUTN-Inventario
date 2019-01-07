<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use Auth;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::latest()->paginate(7);
        if (Categoria::all()->isEmpty()) {
            $cod = 1;
        } else {
            $cat = Categoria::latest()->first();
            $cod = substr($cat->cat_codigo,4) + 1;
        }
        $cats = Categoria::doesntHave('categoriasuperior')->get();
        foreach ($cats as $c) {
            //info($c);
        }
        return view('categorias.index',compact('categorias','cod','cats'));
    }

    public function search(Request $request)
    {
        $buscar = $request->get('buscar');        
        $categorias=Categoria::where('cat_nombre','ILIKE','%' . $buscar . '%')->latest()->paginate(7);

        if (Categoria::all()->isEmpty()) {
            $cod = 1;
        } else {
            $cat = Categoria::latest()->first();
            $cod = substr($cat->cat_codigo,4) + 1;
        }
        $cats = Categoria::doesntHave('categoriasuperior')->get();
        return view('categorias.index',compact('categorias','cod','cats'));
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
    public function store(CategoriaRequest $request)
    {
        try{                       
            $categoria = new Categoria();            
            $categoria->cat_codigo = $request->cat_codigo;
            if ($request->cat_codigop != -1) {
                $categoria->cat_codigop = $request->cat_codigop;
            } else {
                $categoria->cat_codigop = null;
            }            
            $categoria->cat_nombre = $request->cat_nombre;
            //info($request->cat_codigo);
            $categoria->save();                        
            return redirect('categorias')->with('success','Categoría creada');
        }catch(Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
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
        try{                       
            $categoria = Categoria::findOrFail($id);            
            $categoria->cat_codigo = $request->cat_codigo;
            if ($request->cat_codigop != -1) {
                $categoria->cat_codigop = $request->cat_codigop;
            } else {
                $categoria->cat_codigop = null;
            }            
            $categoria->cat_nombre = $request->cat_nombre;
            //info($request->cat_codigo);
            $categoria->save();                        
            return redirect('categorias')->with('success','Categoría creada');
        }catch(Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
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
