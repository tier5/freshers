<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = ['reply_body'];
    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function dislike()
    {
        return $this->hasMany(Dislike::class);
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }
    public function addReply(Note $reply)
    {
    	$this->replies()->save($reply);
    }
}
