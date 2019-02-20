<?php

namespace App\Exports;

use App\DetalleDocumento;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class DetalleDocumentoExport implements FromCollection, WithHeadings, WithTitle,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $movimientos = DB::table('inv_movimientos as mov')
        ->join('inv_documentos as doc', 'mov.doc_id', '=', 'doc.doc_id')
        ->join('inv_productos as pro', 'mov.pro_id', '=', 'pro.pro_id')
        ->select('doc.doc_tipo as tipo','doc.doc_codigo as codigo', 'doc.doc_fecha as fecha', 'pro.pro_nombre as producto','mov_ajuste as ajuste', 'mov_cantidad as cantidad','mov_costo as costo', 'mov_precio as precio', 'mov_stock as stock')
        ->orderby('doc.doc_created_at', 'desc');
        return $movimientos->get();
    }
    public function title():string{

        return 'Movimientos';
    }
    public function headings(): array
    {
        return[
            'TIPO DOCUMENTO',
            'CÓDIGO DOCUMENTO',
            'FECHA DOCUMENTO',
            'NOMBRE PRODUCTO',
            'TIPO AJUSTE',
            'CANTIDAD',
            'COSTO',
            'PRECIO',
            'STOCK',
        ];

    }

}
