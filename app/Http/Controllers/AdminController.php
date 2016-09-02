<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Creates view for Aadmin index page.
     */
    public function getIndex() {
        return view('admin.index');
    }
    public function usertable() {
        $users=User::all();
        return view('admin.tables',compact('users'));
    }

    public function deleteuser($id) {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function getedituser($id) {
        return view('user.editprofile',compact('id'));
    }
    public function postedituser(Requests\UserUpdateRequest $request,$id)
    {
        $user=User::find($id);
        $temp=$user->profile_picture;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->country_id=$request->country_id;
        $user->contact_number=$request->contact_number;
        if($request->hasFile('profile_picture')) {
            $destinationPath = 'uploads/profile_pic';
            $imgName = $request->profile_picture->getClientOriginalName();
            $request->profile_picture->move($destinationPath, $imgName);
            $user->profile_picture=$imgName;
        }
        else
            $user->profile_picture=$temp;
        $user->save();
        return redirect()->route('usertable')->with('success','You are Successfully Update Profile');
    }
}
