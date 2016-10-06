<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get();

        return view('admin.tag.tags', ['tags' => $tags]);
    }

    public function show($id)
    {
        $tag=Tag::find(Hashids::decode($id));
        return view('admin.tag.show', ['tag' => $tag[0]]);
    }
    public function edit($id)
    {
        $tag=Tag::find(Hashids::decode($id));
        return view('admin.tag.edit',['tag' => $tag[0]]);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, ['name' => 'required|unique:tags,name']);

        $tag = Tag::find(Hashids::decode($id));
        $tag[0]->name = $request->name;
        $tag[0]->save();

        return redirect()->route('admin.tag.index');
    }
    public function destroy($id)
    {
        $tag = Tag::find(Hashids::decode($id));
        $tag[0]->delete();

        return redirect()->route('admin.tag.index');
    }

}
