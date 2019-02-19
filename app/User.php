<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    protected $primaryKey = "usu_id";
    protected $table = "inv_usuarios";
    public $timestamps = true; 
    protected $dates = ['usu_created_at','usu_updated_at'];

    const CREATED_AT = "usu_created_at";
    const UPDATED_AT = "usu_updated_at";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usu_nombre', 'usu_apellido', 'usu_cedula','usu_fechaN', 'usu_direccion', 'usu_telefono', 'usu_celular', 'usu_email','usu_foto','usu_fototype','usu_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usu_password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->attributes['usu_password'];
    }

}
