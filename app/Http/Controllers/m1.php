<?php

namespace App\Http\Controllers;

use App\Dislike;
use App\Like;
use App\Share;
use App\View;
use App\Reply;
use App\Article;
use App\User;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session; 
use \Response;

class m1 extends Controller
{
    //
    public function test()
    {
    	$x = View::where('article_id',11)->where('user_id',1)->first()->count;
        return($x);
        foreach($x as $y)
        {
            return($y->user->id);
        }
    }
    
}
