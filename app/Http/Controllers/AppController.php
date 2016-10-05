<?php

namespace App\Http\Controllers;

use App\Meme;
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
        $photos=Meme::latest()->get();
        return view('meme.viewallphoto', ['photos' => $photos]);
    }
}
