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
    public function index(Request $request)
    {
        try{
            $categorias = Categoria::orderByDesc('cat_updated_at')->paginate(7);
            
            if ($request->display == 'activos') {
                $categorias = Categoria::where('cat_estado',1)->orderByDesc('cat_updated_at')->paginate(7);
            } else if ($request->display == 'inactivos') {
                $categorias = Categoria::where('cat_estado',0)->orderByDesc('cat_updated_at')->paginate(7);
            }

            if (Categoria::all()->isEmpty()) {
                $cod = 1;
                $cats = null;
                $id = null;
            } else {
                $cat = Categoria::latest()->first();
                $id = $cat->cat_id;
                $cod = substr($cat->cat_codigo,4) + 1;
                $cats = Categoria::doesntHave('categoriasuperior')->get();
                foreach ($cats as $c) {
                    //info($c);
                }
            }
            return view('categorias.index',compact('categorias','cod','cats','id'));
        }catch(\Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        try{
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
        }catch(\Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
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
        }catch (\Exception $e) {
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
    public function update(CategoriaRequest $request, $id)
    {                        
        try{            
            if ($request->cat_codigop != -1) {
                //info('updatecontroller!!!!!!! '.$id);
                if ($request->cat_id != $request->cat_codigop) {
                    $categoria=Categoria::updateOrCreate(['cat_id'=>$id],$request->all());
                } else {
                    return redirect('categorias')->withErrors(['Categoría no actualizada']);
                }                
            } else {
                $categoria=Categoria::updateOrCreate(['cat_id'=>$id],
                    ['cat_codigop' => null, 'cat_nombre' => $request->cat_nombre, 'cat_estado' => $request->cat_estado, ]);
                info($request->cat_codigo.'/'.$request->cat_nombre.'**'.$request->cat_estado);
                //$categoria->cat_codigop = null;
            }
            
            return redirect('categorias')->with('success','Categoría actualizada');
        }catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
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
