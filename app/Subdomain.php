<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdomain extends Model
{
    protected $fillable= [
        'subdomain',
        'publish',
        'theme'
    ];
    /*public function users()
    {
        return $this->belongsTo('App\User');
    }*/
}
