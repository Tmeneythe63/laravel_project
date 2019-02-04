<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    protected $fillable = [
        'magasinName', 'labo_id'
    ];
    
    public function produits()
    {
        return $this->belongsToMany('App\Produit')->withPivot('quantite');
                                
    }

    public function labo()
    {
        return $this->belongsTo('App\Labo');
    }
}
