<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','aproved'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profile()
    {
         return $this->hasOne('App\Profile');
    }

    public function offres()
    {
         return $this->hasMany('App\Offre');
    }
    public function produits()
    {
         return $this->hasMany('App\Produit');
    }

    public function labo()
    {
         return $this->hasOne('App\Labo');
    }

    public function response_echange()
    {
         return $this->hasOne('App\ResponseEchange');
    }
    public function response_don()
    {
         return $this->hasOne('App\ResponseDon');
    }
    
}
