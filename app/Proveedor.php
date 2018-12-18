<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Proveedor extends Authenticatable
{
    use Notifiable;
    protected $guard='prov';
    protected $primaryKey="prv_id" ;
    protected $table="inv_proveedores" ;
    public $timestamps=false; 
    protected $dates = ['prv_updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prv_nombre','prv_identificacion','prv_tipo_identificacion','prv_direccion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'prv_id'
    ];
}
