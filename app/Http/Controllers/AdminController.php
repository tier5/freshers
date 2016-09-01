<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Creates view for Aadmin index page.
     */
    public function getIndex() {
        return view('admin.index');
    }
}
