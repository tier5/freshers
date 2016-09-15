<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Country;
use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        return view('admin.user.tables',compact('users'));
    }

    public function deleteuser($id) {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function getedituser($id) {
        $user=User::find($id);
        $contries=Country::all();
        return view('admin.user.user_edit',['user' => $user,'countries'=>$contries]);
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
        return redirect()->route('admin.user.index')->with('success','You are Successfully Update Profile');
    }
    public function viewuser($id)
    {
        $user=User::find($id);
        return view('admin.user.profile',['user' => $user]);
    }

    public function contactmanagement()
    {
        $contacts=ContactUs::latest()->get();
        return view('contact.admincontact',[ 'contacts' => $contacts]);
    }
    public function blogmanagement()
    {
        $blogs=Article::latest()->get();
        return view('admin.blog', ['blogs' => $blogs]);
    }

    public function blogbardata()
    {
        $data=Article::select([
                    DB::raw('COUNT(*) as value'),
                    DB::raw('DATE(created_at) as date')])
                    ->groupBy('date')
                    ->orderBy('date', 'ASC')
                    ->get();
        return \Response::json($data);
    }

    public function registrationbardata()
    {
        $reg=User::select([
            DB::raw('COUNT(*) as value'),
            DB::raw('DATE(created_at) as date')])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        return \Response::json($reg);
    }
    public function demoteadmin($id)
    {
        $user=User::find($id);
        $user->isadmin=0;
        $user->save();
        return redirect()->route('admin.user.index')->with('success','Demoted Successfully');
    }
    public function promoteuser($id)
    {
        $user=User::find($id);
        $user->isadmin=1;
        $user->save();
        return redirect()->route('admin.user.index')->with('success','Promoted Successfully');
    }
    public function getemailbody($id)
    {
        $contact=ContactUs::find($id);
        return view('admin.email.body',['contact' => $contact]);
    }
    public function postreply(Request $request)
    {
       $email=$request->email;
        $subject=$request->subject;
        $geatings=$request->geeting;
        $body=$geatings.'  '.$request->body;

        Mail::raw($email, function ($m) use ($email, $subject,$body,$geatings) {
            $m->to($email,$geatings)
                ->subject($subject)
                ->setBody($body);
        });

        return redirect()->route('contactmanagement')->with('success', 'Mail Send');
    }


}
