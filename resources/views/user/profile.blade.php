@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
<div class="container">
    @if(Session::has('success'))
        <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
            <p class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success')}}
            </p>
        </div>
    @endif

        <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4"> <img src="uploads/profile_pic/{{$user->profile_picture}}" style="height: 120px; width: 120px" alt="Profile Picture" /></div>
                        <div class="col-xs-12 col-sm-6"><h1>{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</h1></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">Email:</div>
                        <div class="col-xs-12 col-sm-6">{{$user->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">Date of Birth:</div>
                        <div class="col-xs-12 col-sm-6">{{date('d F Y',strtotime($user->date_of_birth))}}</div>
                    </div>
                    <div class="row">
                         <div class="col-xs-12 col-sm-4">Country:</div>
                        <div class="col-xs-12 col-sm-6">{{App\Country::where('id','=',$user->country_id)->select('name')->first()->name}}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">Contact No: </div>
                        <div class="col-xs-12 col-sm-6">{{App\Country::where('id','=',$user->country_id)->select("isd_prefix")->first()->isd_prefix.$user->contact_number}}</div>
                    </div>
                </div>
</div>
@endsection