<?php

namespace App\Http\Controllers;


use App\Meme;
use App\MemePhoto;
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
use \Response;
use Illuminate\Support\Facades\Session;

class MemeController extends Controller
{
    public function create($id)
    {
        $photo=MemePhoto::where('id','=',$id)->first()->name;
        return view('meme.creatememe', ['photo' => $photo]);
    }
    Public function getupload()
    {
        return view('meme.upload');
    }
    public function postupload(Request $request)
    {
        $photo=new MemePhoto();
        $this->validate($request, [
            'file' => 'required|image'
        ]);
        $file=$request->file('file');
        $filename=uniqid().$file->getClientOriginalName();
        $destinationpath='uploads/meme/';
        $file->move($destinationpath,$filename);
        $photo->name=$filename;
        $photo->user_id=Session::get('id');
        $photo->save();
        return redirect()->route('create.meme',['photo' =>$photo->id]);
    }
    public function save(Request $request)
    {
        $usr = Session::get('id');
        $data=$request->image;
        if(preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches))
        {
            $photo=new Meme();
            $imageType = $matches[1];
            $imageData = base64_decode($matches[2]);

            $image = imagecreatefromstring($imageData);
            $filename = md5($imageData) . '.png';

            if(imagepng($image, 'uploads/meme/photo/' . $filename))
            {
                $photo->name=$filename;
                if($usr == '')
                    $photo->user_id = null;
                else
                    $photo->user_id=$usr;
                $photo->save();
                return response()->json([
                    'status' => 'success',
                    'path'   => 'https://makingshitfunny.com/public/uploads/meme/photo/'.$filename,
                ]);
            } else {
                return response()->json(['status' => 'Could not save the file.']);
            }
        } else {
            return response()->json(['status' => 'Invalid data URL.']);
        }
    }
    public function view()
    {
        $meme=Meme::where('user_id','=',Session::get('id'))->get();
        return view('meme.show',[ 'memes' => $meme]);
    }
    public function single($id)
    {
        $meme=Meme::where('id','=',$id)->first();
        //return($meme->like->first());




        if (is_null($meme)) {
            abort(404);
        }
        $present_user = Session::get('id');
        if($present_user != null)
        {
            $view = View::where('meme_id',$meme->id)->where('user_id',$present_user)->first();
            if($view == null) // incrementing the view
            {
                $new_view = new View();
                $new_view->user_id      = Session::get('id');
                $new_view->meme_id   = $meme->id;
                $new_view->count =1;
                $new_view->save();
            }
            else
            {
                $store = $view;
                $store->count++;
                $store->save();
            }
            $meme->views++;
            $meme->save();
        }
        return view('meme.view',['meme' => $meme]);
    }
    public function allmeme()
    {
        $memes=Meme::latest()->get();
        return view('meme.meme', [ 'memes' => $memes]);
    }
    public function like(Request $request)
    {
        $like=new MemeLike();
        $like->like=1;
        $like->meme_id=$request->meme_id;
        $like->user_id=$request->user_id;
        $like->save();
        $count=count(MemeLike::all());
        return response()->json(['status' => 'like','count' => $count]);
    }
    public function dislike()
    {
        $like=MemeLike::where('user_id','=',Session::get('id'))->first();
        $like->delete();
        $count=count(MemeLike::all());
        return response()->json(['status' => 'dislike','count' => $count]);
    }

    public function likememe(Request $request)
    {
        $meme = $request->id ;
        $now_user_id=   Session::get('id');
        $like_status =  Like::where('user_id',$now_user_id)->where('meme_id',$meme)->first();
        $dislike_status = Dislike::where('user_id',$now_user_id)->where('meme_id',$meme)->first();
        $like_num=   meme::where('id',$meme)->first()->likes;
        $dislike_num=meme::where('id',$meme)->first()->dislikes;
        if($dislike_status != null)
        {
            $dislike_status->delete();
            $r = meme::where('id' , $meme)->first();
            $r->dislikes = $r->dislikes-1;
            $dislike_num = $r->dislikes;
            $r->save();
        }
        if($like_status == null)
        {
            $like = new Like();
            $like->reply_id     =null; 
            $like->comment_id   =null;
            $like->meme_id   =$meme;
            $like->user_id      =$now_user_id;
            $like->save();
            $meme = meme::where('id' , $meme)->first();
            $meme->likes = $meme->likes+1;
            $like_num = $meme->likes;
            $meme->save();
            return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
        }
        else
        {
            
            $like_status->delete();
            $meme = meme::where('id' , $meme)->first();
            $meme->likes = $meme->likes-1;
            $like_num = $meme->likes;
            $meme->save();
            return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
        }
        return ('eror in likememe at MemeController');    
    }

    public function dislikememe(Request $request)
    {
        $meme=$request->id;
        $now_user_id=   Session::get('id');
        $dislike_status =   Dislike::where('user_id',$now_user_id)->where('meme_id',$meme)->first();
        $like_status    = Like::where('user_id',$now_user_id)->where('meme_id',$meme)->first();
        $like_num=   meme::where('id',$meme)->first()->likes;
        $dislike_num=meme::where('id',$meme)->first()->dislikes;
        if($like_status != null)
        {
            $like_status->delete();
            $r = meme::where('id' , $meme)->first();
            $r->likes = $r->likes-1;
            $like_num = $r->likes;
            $r->save();
        } 
        if($dislike_status == null)
        {
            $dislike = new Dislike();
            $dislike->reply_id      =null; 
            $dislike->comment_id    =null;
            $dislike->meme_id    =$meme;
            $dislike->user_id       =$now_user_id;
            $dislike->save();
            $meme = meme::where('id' , $meme)->first();
            $meme->dislikes = $meme->dislikes+1;
            $dislike_num =$meme->dislikes;
            $meme->save();
            return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
        }
        else
        {
            $dislike_status->delete();
            $meme = meme::where('id' , $meme)->first();
            $meme->dislikes = $meme->dislikes-1;
            $dislike_num =$meme->dislikes;
            $meme->save();
            return Response()->json(['like'=>$like_num , 'dislike'=>$dislike_num]);
        }   
        return ('eror in dislikememe at MemeController');
    }
}
