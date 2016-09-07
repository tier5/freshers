<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function update(Request $request)
    {
        $subdomain = Subdomain::where('user_id', '=', Session::get('id'))->first();
        if ($subdomain->is_edit == 0) {
            $this->validate($request, [
                'subdomain' => 'required|Regex:/^[A-Za-z0-9]+$/|unique:subdomains,subdomain',
                'theme' => 'required',
                'publish' => 'required'
            ]);
            $subdomain->subdomain = $request->subdomain;
            $subdomain->theme = $request->theme;
            $subdomain->publish = $request->publish;
            $subdomain->is_edit = 1;
            $subdomain->save();
            Return redirect()->route('getsubdomain')->with('success', 'You Successfully edited Your Subdomain');
        } else {
            $this->validate($request, [
                'theme' => 'required',
                'publish' => 'required'
            ]);
            $subdomain->theme = $request->theme;
            $subdomain->publish = $request->publish;
            $subdomain->save();
            return redirect()->route('getsubdomain')->with('success', 'You Successfully edited your Subdomain without changing subdomain name');
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
