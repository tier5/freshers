<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRequest $request)
    {
        $user =new User();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->contact_number=$request->contact_no;
        $user->date_of_birth=$request->date_of_birth;
        $user->country=$request->country;
        if($request->hasFile('profile_picture')) {
            $destinationPath = 'uploads/profile_pic';
            $imgName = $request->profile_picture->getClientOriginalName();
            $request->profile_picture->move($destinationPath, $imgName);
            $user->profile_picture=$imgName;
        }
        else
            $user->profile_picture='default.jpg';
        $user->save();
        return redirect()->route('login')->with('success','You are Successfully Register Yourself');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect(route('profile'));
        }
        return view('user.login');
    }
    public function postLogin(Requests\UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            $user=User::where('email','=',$request->email)->first();
            Session::flash('success','You are Successfully Logged in');
            Session::put('id',$user->id);
            return redirect()->route('profile');
        }
        else
            return redirect()->back()->with('Err','Enter a valid email or password');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login')->with('success','You are Successfully Logged out from your Account');
    }

    public function profile()
    {
        $id=Session('id');
        $user=User::where('id','=',$id)->first();
        if($user->count())
        {
            return view('user.profile')->with('user',$user);
        }
        return App::abort(404);
    }
}
