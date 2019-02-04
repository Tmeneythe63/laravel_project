<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labo extends Model
{
    protected $fillable = [
        'laboName', 'user_id'
    ];
    public function magasin()
    {
        return $this->hasOne('App\Magasin');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
