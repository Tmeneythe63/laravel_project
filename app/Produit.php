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
        'user_id',
        'category_id'
      ];

      public function category()
      {
          return $this->belongsTo('App\Category');
      }

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
