<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
   protected $fillable = [
        'nombres','apellidos','direccion','estado', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}