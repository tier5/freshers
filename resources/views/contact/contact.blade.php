@extends('layouts.app')

@section('content')
    <div class="row">
    @if(Session::has('success'))
        <p class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success')}}
        </p>
    @endif
        </div>
    <div class="row">
    <div class="container">
    <div class="clearfix" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post" action="{{route('postcontact')}}">
                            <fieldset>
                                <legend class="text-center header">Contact us</legend>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input id="fname" name="first_name" value="{{ old('first_name') }}" type="text" placeholder="First Name *" class="form-control">
                                        @if ($errors->any()) <div style="color:red">{{$errors->first('first_name')}}</div>@endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input id="lname" name="last_name" value="{{old('last_name')}}" type="text" placeholder="Last Name *" class="form-control">
                                        @if ($errors->any()) <div style="color:red">{{$errors->first('last_name')}}</div>@endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input id="email" value="{{ old('email') }}" name="email" type="email" placeholder="Email Address *" class="form-control">
                                        @if ($errors->any()) <div style="color:red">{{$errors->first('email')}}</div>@endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input id="phone" value="{{ old('phone') }}" name="phone" type="text" placeholder="Phone *" class="form-control">
                                        @if ($errors->any()) <div style="color:red">{{$errors->first('phone')}}</div>@endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you within 2 business days *" rows="7">{{old('message')}}</textarea>
                                        @if ($errors->any()) <div style="color:red">{{$errors->first('message')}}</div>@endif
                                    </div>
                                </div>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token()}}"/>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </--div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div>
                        <div class="panel panel-default">
                            <div class="text-center header">Our Office</div>
                            <div class="panel-body text-center">
                                <h4>Address</h4>
                                <div>
                                    Tier5 Technology<br>
                                    Kolkata<br>
                                    Saltlake sector-5 <br>
                                    Tier5.in<br>
                                </div>
    </div>
@endsection