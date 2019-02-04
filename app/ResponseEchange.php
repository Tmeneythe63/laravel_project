<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseEchange extends Model
{
    protected $fillable = [
            'offre_id',
            'description',
            'user_id',
            'quantite',
            'produitEchangeID'
               
    ];
    
    public function user()
    {
         return $this->belongsTo('App\User');
    }
    public function offre()
    {
        return $this->belongsTo('App\Offre');
    }
}
