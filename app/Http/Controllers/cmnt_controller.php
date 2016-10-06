<?php


namespace App\Http\Controllers;
use App\Reply;
use App\Article;
use App\User;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
class cmnt_controller extends Controller
{
    //
    public function edit(Request $request)
    {
        //
        return($request);
        $comment=Comment::where('id',$id)->first();
        return view('comments.viewcomments',compact('comment'));

    }
}
