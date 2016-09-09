<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function user()//--changed from here
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }
    public function share()
    {
        return $this->hasMany(Share::class);
    }
    public function view()
    {
         return $this->hasMany(View::class);
    }
    public function dislike()
    {
        return $this->hasMany(Dislike::class);
    }
}
