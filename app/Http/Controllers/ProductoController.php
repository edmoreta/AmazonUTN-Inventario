<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;
use App\Http\Requests\ProductoRequest;
use Image;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $pag = trim($request->get('pag'));
            if ($pag=="") {  
                $pag=7;
                $productos = Producto::orderByDesc('pro_updated_at')->paginate($pag);
            }        
            if ($pag != null) {
                $productos = Producto::orderByDesc('pro_updated_at')->paginate($pag);
            } 
            if ($request->display == 'activos') {
                $productos = Producto::where('pro_estado',1)->orderByDesc('pro_updated_at')->paginate($pag);
            } else if ($request->display == 'inactivos') {
                $productos = Producto::where('pro_estado',0)->orderByDesc('pro_updated_at')->paginate($pag);
            }
            
            $prods = $productos;
            return view('productos.index',compact('productos','pag','prods'));
        }catch(\Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        try{
            $pag = trim($request->get('pag'));
            $buscar = $request->get('buscar');
            if ($pag=="") {  
                $pag=7;
            }   
            $productos=Producto::where('pro_nombre','ILIKE','%' . $buscar . '%')->latest()->paginate($pag);     
            if ($pag != null) {
                $productos=Producto::where('pro_nombre','ILIKE','%' . $buscar . '%')->latest()->paginate($pag);
            }                 
            return view('productos.index',compact('productos','pag'));
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
        try{
            $categorias = Categoria::orderByDesc('cat_updated_at')->with('categoriasuperior')->get();
            info($categorias);
            if (Producto::all()->isEmpty()) {
                $cod = 1;                       
            } else {
                $pro = Producto::latest()->first();            
                $cod = substr($pro->pro_codigo,4) + 1;            
            }
            return view('productos.create',compact('cod','categorias'));
        }catch(\Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        try{
            info($request);
            if ($request->cat_id != -1) {
                $producto = Producto::create($request->all());
                //$producto->pro_stock = 0;
                //$producto->save();

                if ($request->hasFile('pro_foto')) {
                    //$producto->pro_foto = $request->file('pro_foto')->store('public/productos');
                    //$producto->save();

                    $image = $request->file( 'pro_foto' );
                    $imageType = $image->getClientOriginalExtension();
                    $imageStr = (string) Image::make( $image )->
                                            resize( 300, null, function ( $constraint ) {
                                                $constraint->aspectRatio();
                                            })->encode( $imageType );

                    $producto->pro_foto = base64_encode( $imageStr );
                    $producto->pro_fototype = $imageType;
                    $producto->save();
                }
                
            } else {
                return back()->withErrors(['El campo categoría no debe estar vacío']);
            }
            return redirect('productos')->with('success','Producto creado');
        }catch(\Exception | QueryException $e){
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
        echo "Claro que llego";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $categorias = Categoria::orderByDesc('cat_updated_at')->with('categoriasuperior')->get();
            $producto = Producto::findOrFail($id);
            return view('productos.edit',compact('producto','categorias'));
        }catch(\Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        try{
            $producto = Producto::updateOrCreate(['pro_id'=>$id],$request->except('pro_foto'));
            if ($request->hasFile('pro_foto')) {
                $image = $request->file( 'pro_foto' );
                $imageType = $image->getClientOriginalExtension();
                $imageStr = (string) Image::make( $image )->
                                        resize( 300, null, function ( $constraint ) {
                                            $constraint->aspectRatio();
                                        })->encode( $imageType );
                $producto->pro_foto = base64_encode( $imageStr );
                $producto->pro_fototype = $imageType;
                $producto->save();
            }
            return redirect('productos')->with('success','Producto actualizado');
        }catch(\Exception $e){
            return back()->withErrors(['exception'=>$e->getMessage()])->withInput();
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
