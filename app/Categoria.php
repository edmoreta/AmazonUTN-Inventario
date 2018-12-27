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

    protected $fillable = ['cat_nombre','cat_codigop'];

    protected $hidden = ['cat_id'];

    public function productos()
    {
        return $this->hasMany('App\Producto','cat_id');
    }

}
