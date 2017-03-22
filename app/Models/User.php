<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','auth_token','auth_token_expired_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password','auth_token','auth_token_expired_at'];
    protected $visible = ['id', 'name', 'email'];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = md5($password);
    }

    public function preJson($other=true) {
        if(!$other) {
            $this->makeVisible('auth_token')->makeVisible('auth_token_expired_at')->toArray();
        }
        return ["user" => $this];
    }
}
