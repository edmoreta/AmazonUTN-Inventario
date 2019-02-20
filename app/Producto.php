<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey="pro_id" ;
    protected $table="inv_productos" ;
    public $timestamps=true; 
    protected $dates = ['pro_created_at','pro_updated_at'];

    const CREATED_AT="pro_created_at";
    const UPDATED_AT="pro_updated_at";

    protected $fillable = ['pro_codigo','cat_id','pro_nombre','pro_descripcion','pro_caracteristicas','pro_precio','pro_costo','pro_estado','pro_foto','pro_fototype'];

    protected $hidden = ['pro_id'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','cat_id');
    }

    public function movimientos()
    {
        return $this->hasMany('App\DetalleDocumento','pro_id');
    }


}
