@extends('layouts.app')

@section('title')
    Forgot password
@endsection

@section('content')
        <div class="row">
        @if(Session::has('success'))
            <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                <p class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{Session::get('success')}}
                </p>
            </div>
        @endif
            </div>
        <div class="row">
        <div class="container">
    <form action="{{ route('resetpassword') }}" method="POST" class="form-horizontal" role="form">
        <legend>Forgot password</legend>
        <div class="form-group">
            <label for="user_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input type="email" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_email" name="email" placeholder="Email" />
                </div>
                @if ($errors->any()) <div style="color:red">{{$errors->first('email')}}</div>@endif
            </div>
        </div>
        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                <button type="submit" class="btn btn-success btn-md pull-right">Submit</button>
            </div>
        </div>
    </form>
    </div>
    </div>
@endsection