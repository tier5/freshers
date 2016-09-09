<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Requests\SubdomainRequest;
use App\Subdomain;
use Illuminate\Http\Request;

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
        if($subdomain->is_edit == 0) {
            $subdomain->subdomain=$request->subdomain;
        }
        else {
            return redirect()->route('getsubdomain')->with('success','You can not edit Subdomain more than one time');
        }
        $subdomain->theme=$request->theme;
        $subdomain->publish=$request->publish;
        $subdomain->is_edit=1;
        $subdomain->save();
        Return redirect()->route('profile')->with('success','You Successfully publish Your Subdomain');
    }

    public function about()
    {
        return view('subdomain.about');
    }

    public function check_availablity(Request $request)
    {

       $sub=Subdomain::where('subdomain','=',$request->subdomain)->first();

        if($sub) {
            return \Response()->json(['status' => 'exist']);
        }
        else {
            return \Response()->json(['status' => 'notexist']);
        }

    }

}
