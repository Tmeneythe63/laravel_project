<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'produitName',
        'formuleChimique',
        'unite',
        'dateExp',
        'user_id'
      ];

      

      public function magasins()
      {
          return $this->belongsToMany('App\Magasin')->withPivot('quantite');
                        
      }


      public function offre()
      {
          return $this->hasOne('App\Offre');
      }
      public function user()
      {
          return $this->belongsTo('App\User');
      }

}
