<?php

namespace App\Http\Controllers;

use App\MemePhoto;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AppController extends Controller
{
    /**
     * Creates view for Application index page.
     */
    public function getIndex()
    {
        $photos=MemePhoto::latest()->get();
        return view('meme.viewallphoto', ['photos' => $photos]);
    }
}
