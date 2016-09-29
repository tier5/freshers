<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    protected $table='meme';

     public function user()
     {
         return $this->belongsTo('App\User');
     }
     public function like()
     {
         return $this->hasMany('App\MemeLike');
     }
}
