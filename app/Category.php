<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoryName'
    ];
    public function produits()
    {
        return $this->hasMany('App\Produit');
    }
}
