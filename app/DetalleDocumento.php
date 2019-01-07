<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleDocumento extends Model
{
    
    protected $primaryKey="mov_id" ;
    protected $table="inv_movimientos" ;
    public $timestamps=false; 



    //atributos llenados por un formulario
    protected $fillable = ['mov_cantidad','mov_costo','mov_precio','mov_estado'];

    protected $hidden = ['mov_id'];


    public function documento()
    {
        return $this->belongsTo('App\Documento', 'doc_id');
    }

}
