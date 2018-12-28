<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $primaryKey="doc_id" ;
    protected $table="inv_documentos" ;
    public $timestamps=true; 
    protected $dates = ['doc_created_at','doc_updated_at'];

    const CREATED_AT="doc_created_at";
    const UPDATED_AT="doc_updated_at";
    //atributos llenados por un formulario
    protected $fillable = ['doc_codigo','doc_tipo','doc_fecha'];

    protected $hidden = ['doc_id'];

    public function producto()
    {
        return $this->hasMany('App\Producto','cat_id');
    }
    

}
