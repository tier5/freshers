<?php

namespace App\Http\Controllers;

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

class LSVController extends Controller
{
    //about comments
	public function likecomment($comment)
	{

		$now_user_id=	Session::get('id');
		$like_status = 	Like::where('user_id',$now_user_id)->where('comment_id',$comment)->first();
		if($like_status == null)
		{
			//return('entering here');
			$like = new Like();
			$like->reply_id  	=null; 
			$like->article_id  	=null; 
			$like->comment_id   =$comment;
			$like->user_id      =$now_user_id;
			$like->save();

			$comment = Comment::where('id' , $comment)->first();
			$comment->likes = $comment->likes+1;
			$comment->save();

		}
		return back();		

	}
	public function sharecomment(Comment $comment)
	{

	}


	//about articles
	public function likearticle($article)
	{
		$now_user_id=	Session::get('id');
		$like_status = 	Like::where('user_id',$now_user_id)->where('article_id',$article)->first();
		if($like_status == null)
		{
			//return('entering here');
			$like = new Like();
			$like->reply_id  	=null; 
			$like->comment_id   =null;
			$like->article_id   =$article;
			$like->user_id      =$now_user_id;
			$like->save();
			
			$article = Article::where('id' , $article)->first();
			$article->likes = $article->likes+1;
			$article->save();

		}
		return back();	
	}
	public function sharearticle(Article $article)
	{

	}
	public function viewarticle(Article $article)
	{

	}

	//aboout replies
	public function likereply($reply)
	{
		//return($reply);
		$now_user_id=Session::get('id');
		$like_status = Like::where('user_id',$now_user_id)->where('reply_id',$reply)->first();
		
		if($like_status == null)
		{
			//return('entering here');
			$like = new Like();
			$like->reply_id    =$reply;
			$like->article_id  =null; 
			$like->comment_id  =null;
			$like->user_id     =$now_user_id;
			$like->save();

			$reply = Reply::where('id' , $reply)->first();
			$reply->likes = $reply->likes+1;
			$reply->save();

		}
		return back();
	}
}
