<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemeLike extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function meme()
    {
        return $this->belongsTo('App\Meme');
    }
}
