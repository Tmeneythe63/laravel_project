<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseDon extends Model
{
 
    protected $fillable = [
               'offre_id',
               'description',
               'user_id'
               
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
