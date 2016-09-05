<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['comment_body'];
    public function reply()
    {
    	return $this->hasMany(Reply::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function article()
    {
    	return $this->belongsTo(Article::class);
    }
     public function like()
    {
        return $this->hasMany(Like::class);
    }
    public function share()
    {
        return $this->hasMany(Share::class);
    }
    public function addReply(Note $reply)
    {
    	$this->reply()->save($reply);
    }
}
