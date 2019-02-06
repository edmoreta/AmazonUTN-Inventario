<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey="cat_id" ;
    protected $table="inv_categorias" ;
    public $timestamps=true; 
    protected $dates = ['cat_created_at','cat_updated_at'];

    const CREATED_AT="cat_created_at";
    const UPDATED_AT="cat_updated_at";

    protected $fillable = ['cat_codigo','cat_nombre','cat_codigop','cat_estado'];

    protected $hidden = ['pivot'];

    public function productos()
    {
        return $this->hasMany('App\Producto','cat_id');
    }

    public function subcategoria()
    {
        return $this->hasOne('App\Categoria','cat_codigop');
    }

    public function categoriasuperior()
    {
        return $this->belongsTo('App\Categoria','cat_codigop');
    }    

}
