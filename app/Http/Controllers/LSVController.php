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
use Session, \Response;

class LSVController extends Controller
{
    //about comments
	public function likecomment(Request $request)
	{
		$like_num	=0;
		$dislike_num=0;
		$comment=$request->id;

		$now_user_id=	Session::get('id');
		$like_status = 	Like::where('user_id',$now_user_id)->where('comment_id',$comment)->first();
		$dislike_status = Dislike::where('user_id',$now_user_id)->where('comment_id',$comment)->first();
		
		if($dislike_status != null)
		{
			//$dislike_status->user_id = null;
			//$dislike_status->comment_id= null;
			$dislike_status->delete();

			$r = Comment::where('id' , $comment)->first();
			$r->dislikes = $r->dislikes-1;
			$dislike_num=$r->dislikes;
			$r->save();
		}
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
			$like_num = $comment->likes;
			$comment->save();

			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);

		}
		else
		{
			$like_status->delete();
			//$like_status->save();

			$comment = Comment::where('id' , $comment)->first();
			$comment->likes = $comment->likes-1;
			$like_num = $comment->likes;
			$comment->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);

		}
		return ('error in likecomment in LSVController');		

	}
	public function dislikecomment(Request $request)
	{
		$like_num	=0;
		$dislike_num=0;
		$comment=$request->id;

		$now_user_id=	Session::get('id');
		$dislike_status = 	Dislike::where('user_id',$now_user_id)->where('comment_id',$comment)->first();
		$like_status    =   Like::where('user_id',$now_user_id)->where('comment_id',$comment)->first();

		if($like_status != null)
		{
			$like_status->delete();

			$r = Comment::where('id' , $comment)->first();
			$r->likes = $r->likes-1;
			$like_num=$r->likes;
			$r->save();
			
		} 


		if($dislike_status == null)
		{
			
			$dislike = new Dislike();
			$dislike->reply_id  	=null; 
			$dislike->comment_id   	=$comment;
			$dislike->article_id   	=null;
			$dislike->user_id      	=$now_user_id;
			$dislike->save();
			
			$comment = Comment::where('id' , $comment)->first();
			$comment->dislikes = $comment->dislikes+1;
			$dislike_num=$comment->dislikes;
			$comment->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}
		else
		{
			
			//$dislike_status->user_id = null;
			$dislike_status->delete();

			$comment = Comment::where('id' , $comment)->first();
			$comment->dislikes = $comment->dislikes-1;
			$dislike_num=$comment->dislikes;
			$comment->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}
		return ('error in dislikecomment in LSVController');	

	}
	public function sharecomment(Comment $comment)
	{

	}


	//about articles
	public function likearticle(Request $request)
	{

		$dislike_num = 0;
		$like_num    = 0;
		$article = $request->id ;
		$now_user_id=	Session::get('id');
		$like_status = 	Like::where('user_id',$now_user_id)->where('article_id',$article)->first();
		$dislike_status = Dislike::where('user_id',$now_user_id)->where('article_id',$article)->first();
		

		if($dislike_status != null)
		{
			
			$dislike_status->delete();
			$r = Article::where('id' , $article)->first();
			$r->dislikes = $r->dislikes-1;
			$dislike_num = $r->dislikes;
			$r->save();


		}
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
			$like_num = $article->likes;
			$article->save();

            return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}
		else
		{
			
			$like_status->delete();

			$article = Article::where('id' , $article)->first();
			$article->likes = $article->likes-1;
			$like_num = $article->likes;
			$article->save();

			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}
		//return back();
		return ('eror in likearticle at LSVController');	
	}
	public function dislikearticle(Request $request)
	{
		$dislike_num = 0;
		$like_num    = 0;
		$article=$request->id;
		$now_user_id=	Session::get('id');
		$dislike_status = 	Dislike::where('user_id',$now_user_id)->where('article_id',$article)->first();
		$like_status    = Like::where('user_id',$now_user_id)->where('article_id',$article)->first();
		if($like_status != null)
		{
			$like_status->delete();

			$r = Article::where('id' , $article)->first();
			$r->likes = $r->likes-1;
			$like_num = $r->likes;
			$r->save();

		} 


		if($dislike_status == null)
		{
			//return('entering here');
			$dislike = new Dislike();
			$dislike->reply_id  	=null; 
			$dislike->comment_id   	=null;
			$dislike->article_id   	=$article;
			$dislike->user_id      	=$now_user_id;
			$dislike->save();
			
			$article = Article::where('id' , $article)->first();
			$article->dislikes = $article->dislikes+1;
			$dislike_num =$article->dislikes;
			$article->save();

			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);

		}
		else
		{
			
			$dislike_status->delete();

			$article = Article::where('id' , $article)->first();
			$article->dislikes = $article->dislikes-1;
			$dislike_num =$article->dislikes;
			$article->save();

			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);

		}	

		return ('eror in likearticle at LSVController');

		
	}

	public function sharearticle(Article $article)
	{

	}
	public function viewarticle(Article $article)
	{

	}

	//aboout replies
	public function likereply(Request $request)
	{
		//return($reply);
		$dislike_num = 0;
		$like_num    = 0;
		$reply=$request->id;

		$now_user_id=Session::get('id');
		$like_status =    Like::where('user_id',$now_user_id)->where('reply_id',$reply)->first();
		$dislike_status = Dislike::where('user_id',$now_user_id)->where('reply_id',$reply)->first();
		
		if($dislike_status != null)
		{
			
			$dislike_status->delete();

			$r = Reply::where('id' , $reply)->first();
			$r->dislikes = $r->dislikes-1;
			$dislike_num=$r->dislikes;
			$r->save();

		} //if the person disliked previously
		//return ('dislike undone');
		if($like_status == null)
		{
			
			$like = new Like();
			$like->reply_id    =$reply;
			$like->article_id  =null; 
			$like->comment_id  =null;
			$like->user_id     =$now_user_id;
			$like->save();


			$reply = Reply::where('id' , $reply)->first();
			$reply->likes = $reply->likes+1;
			$like_num=$reply->likes;
			$reply->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}
		else
		{
			
			$like_status->delete();

			$reply = Reply::where('id' , $reply)->first();
			$reply->likes = $reply->likes-1;
			$like_num=$reply->likes;
			$reply->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}

		return ('error in likereply in LSVController');
	}
	public function dislikereply(Request $request)
	{
		$dislike_num = 0;
		$like_num    = 0;
		$reply=$request->id;

		$now_user_id=Session::get('id');
		$dislike_status = Dislike::where('user_id',$now_user_id)->where('reply_id',$reply)->first();
		$like_status    = Like::where('user_id',$now_user_id)->where('reply_id',$reply)->first();
		if($like_status != null)
		{
			$like_status->delete();

			$r = Reply::where('id' , $reply)->first();
			$r->likes = $r->likes-1;
			$like_num=$r->likes;
			$r->save();

		} 
		if($dislike_status == null)
		{
			
			$dislike = new Dislike();
			$dislike->reply_id   	 	=$reply;
			$dislike->article_id  		=null; 
			$dislike->comment_id  	    =null;
			$dislike->user_id     		=$now_user_id;
			$dislike->save();

			$reply = Reply::where('id' , $reply)->first();
			$reply->dislikes = $reply->dislikes+1;
			$dislike_num=$reply->dislikes;
			$reply->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}
		else
		{
			$dislike_status->delete();

			$reply = Reply::where('id' , $reply)->first();
			$reply->dislikes = $reply->dislikes-1;
			$dislike_num=$reply->dislikes;
			$reply->save();
			return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
		}

		return ('error in dislikereply in LSVController');

	}

}
