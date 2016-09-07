<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubdomainRequest;
use App\Subdomain;
//use Illuminate\Http\Request;

//use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class SubdomainController extends Controller
{
    public function getsubdomain()
    {
        $sub=Subdomain::where('user_id','=',(Session::get('id')))->first();
        if(count($sub)>0) {
            return view('subdomain.edit.edit',compact('sub'));
        }
    }

    public function update(SubdomainRequest $request)
    {
        $subdomain=Subdomain::where('user_id','=',Session::get('id'))->first();
        //$subdomain->subdomain=$request->subdomain;
        $subdomain->theme=$request->theme;
        $subdomain->publish=$request->publish;
        $subdomain->save();
        Return redirect()->route('profile')->with('success','You Successfully publish Your Subdomain');
    }

    public function about()
    {
        return view('subdomain.about');
    }

}
