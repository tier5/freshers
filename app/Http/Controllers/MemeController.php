<?php

namespace App\Http\Controllers;

use App\MemeLike;
use App\MemePhoto;
use App\Meme;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
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
                $photo->user_id=Session::get('id');
                $photo->save();
                return response()->json([
                    'status' => 'success',
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
}
