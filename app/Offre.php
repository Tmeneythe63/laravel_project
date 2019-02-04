<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'quantite'   ,
        'typeOffre'  ,
        'typeEnonce' ,
        'image'      ,
        'description',
        'user_id'    ,
        'produit_id' 
        
        
      ];

      public function user()
      {
          return $this->belongsTo('App\User');
      }

      public function produit()
      {
         return $this->belongsTo('App\Produit');
      }

      public function response_echanges()
      {
        return $this->hasMany('App\ResponseEchange');
      }
      public function response_dons()
      {
        return $this->hasMany('App\ResponseDon');
      }
}
