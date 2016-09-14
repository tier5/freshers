<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //
    protected $fillable = ['count'];
    public function article()
    {
    	return $this->belongsTo(Article::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
