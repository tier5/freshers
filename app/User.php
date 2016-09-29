<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'date_of_birth',
        'country',
        'contact_no',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
     public function comment()//--added from here
    {
        return $this->hasMany(Comment::class);
    }
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }

    /*public function subdomain()
    {
        return $this->belongsTo('App\Subdomain');
    }*/
    public function meme()
    {
        return  $this->hasMany('App\Meme');
    }

    public function memelike()
    {
        return $this->hasMany('App\MemeLike');
    }
}
