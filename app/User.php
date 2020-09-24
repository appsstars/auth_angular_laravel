<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
   protected $fillable = [
        'id_tipo_documento','nombres','apellidos','documento', 'email','estado', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipos_documentos()
    {
        return $this->hasMany('App\TipoDocumento');
    }
}