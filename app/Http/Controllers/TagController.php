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

        return view('tag.tags', ['tags' => $tags]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
