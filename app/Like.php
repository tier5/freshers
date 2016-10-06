<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //

    protected $fillable = ['count'];
    public function reply()
    {
    	return $this->belongsTo(Reply::class);
    }
    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }
    public function article()
    {
    	return $this->belongsTo(Article::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function meme()
    {
        return $this->hasMany('App\Meme');
    }
}
