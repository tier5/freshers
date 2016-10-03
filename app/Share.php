<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    protected $fillable = ['count'];
    public function comment()
    {
        return $this->belongsTo(Comment::class)
    }
    public function article()
    {
        return $this->belongsTo(Article::class)
    }
    public function user()
    {
        return $this->belongsTo(User::class)
    }
    public function meme()
    {
        return $this->hasMany('App\Meme');
    }
}
