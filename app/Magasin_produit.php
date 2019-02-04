<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magasin_produit extends Model
{
    protected $fillable = [
        'produit_id', 'magasin_id','quantite'
    ];
   // public $table="magasin_produit";
}
