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
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        //return ('reached here');
        $user_id=Session::get('id');
       $this->validate($request, [
                'comment_body'=>'required|max:2000|min:1'
        ]);
        

        $comment = new Comment();
        $comment->comment_body = $request->comment_body;
        $comment->article_id  = $request->article_id; //hidden variable
        $comment->user_id = $user_id;
        $comment->likes = 0;
        $comment->dislikes=0;
        $comment->shares= 0;
        $comment->approved = 1;
        $comment->save();

        $request->session()->flash('success', 'Commented Successfully!');
        return back();
        //return redirect()->route('article.show', [$article->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $comment=Comment::where('id',$request->comment_id)->first();
        if($request->submit_stat == 1)
        {    
            $comment->comment_body = $request->comment_body;
            $comment->save();
            return $request->comment_body;
        }
        else if($request->cancel_stat == 1)
        {
            //
            return $comment->comment_body;
        }
        else
        {
            return("oh! snap..  error in CommentController@edit");
        }
        

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //return($id);
        $comment = Comment::where('id',$id)->first();
        $comment->delete();
        return back();

    }
}
