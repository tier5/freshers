<?php

namespace App\Http\Controllers;

use App\MemePhoto;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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

        $file=$request->file('file');
        $filename=uniqid().$file->getClientOriginalName();
        $destinationpath='uploads/meme';
        $file->move($destinationpath,$filename);
        $photo->name=$filename;
        $photo->user_id=1;
        $photo->save();
        return redirect()->route('create.meme',['photo' =>$photo->id]);
    }
}
