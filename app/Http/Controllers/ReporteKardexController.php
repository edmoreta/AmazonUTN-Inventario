<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleDocumento;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Exports\DetalleDocumentoExport;
use Excel;

class ReporteKardexController extends Controller
{
    


public function reporteUsuariosExcel(){

  //  $exporter = app()->makeWith(DetalleDocumentoExport::class, compact('id'));   
   // return $exporter->download('kardex.xlsx');
   return Excel::download(new DetalleDocumentoExport, 'Movimientos.xlsx');
}


}
