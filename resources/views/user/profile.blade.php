@extends('layouts.app')

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
                        <div class="col-xs-12 col-sm-4"> <img src="uploads/profile_pic/{{$user->profile_picture}}" height=100 width=100></div>
                        <div class="col-xs-12 col-sm-6"><h1>{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</h1></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">Email:</div>
                        <div class="col-xs-12 col-sm-6">{{$user->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">Date of Birth:</div>
                        <div class="col-xs-12 col-sm-6">{{$user->date_of_birth}}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">Contact No: </div>
                        <div class="col-xs-12 col-sm-6">{{$user->country.$user->contact_no}}</div>
                    </div>
                </div>
</div>
@endsection