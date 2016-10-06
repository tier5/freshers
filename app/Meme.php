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
         return $this->hasMany('App\Like');
     }
     public function dislike()
     {
         return $this->hasMany('App\Dislike');
     }
     public function view()
     {
         return $this->hasMany('App\View');
     }
     public function share()
     {
         return $this->hasMany('App\Share');
     }
     public function comment()
     {
         return $this->hasMany('App\Comment');
     }
}
