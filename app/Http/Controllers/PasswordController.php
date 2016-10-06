<?php

namespace App\Http\Controllers;

use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use \App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use App\password_resets;


class PasswordController extends Controller
{

    public function resetpassword()
    {
        return view('user.forgotpassword');
    }


    public function postresetpassword(Requests\PasswordResetRequest $request)
    {
        $reset = new password_resets();
        $reset->email = $request->email;
        $reset->token = $request->_token;
        $reset->save();

        $name = User::where('email', '=', $request->email)->first()->first_name;
        Mail::send('emails.resetpassword', ['request' => $request->_token, 'name' => $name, 'email' => $request->email], function ($m) use ($request, $name) {
            $m->to($request->email, $name)->subject('Reset Password link!');
        });
        return redirect()->route('login')->with('success', 'Check youe Mail Inbox For Password Reset Link');
    }


    public function getreset($token)
    {
       $email=$this->validate_reminder_token($token);
        return view('user.resetpassword')->with('email', $email);
    }


    public function postReset(Requests\ForgotPasswordRequest $request)
    {
        $user=User::where('email','=',$request->email)->first();
        $user->password=$request->password;
        $user->save();
        return redirect()->route('login')->with('success','Your Password Reset Successfully');
    }

    function validate_reminder_token($token)
    {
        $res =password_resets::where('token', '=', $token)
            ->where('created_at', '>', Carbon::now()->subMinutes(10))
            ->first()->email;
        if (empty($res) || $res === null)
            return false;
        else
            return $res;

    }
}