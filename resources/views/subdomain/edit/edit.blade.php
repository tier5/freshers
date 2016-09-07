@extends('layouts.app')

@section('title')
    Manage your Subdomain
@endsection

@section('content')
    <h1 class="panel-heading">Manage your Subdomain</h1>
    <div class="container ">
    <form class="form-horizontal" role="form" method="POST" action="{{route('updatesubdomain')}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="user_subdomain" class="control-label col-md-3 col-sm-3 col-xs-12">Your Subdomain</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input name="subdomain" id="user_subdomain" value="{{$sub->subdomain.'.laravelsite.dev'}}" class="form-control col-md-6 col-sm-6 col-xs-12" readonly/>
                    @if ($errors->any()) <div style="color:red">{{$errors->first('subdomain')}}</div>@endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="theme" class="control-label col-md-3 col-sm-3 col-xs-12">Select a Theme</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="radio-inline">
                        <input type="radio" name="theme" id="theme" value=1>
                       Theme 1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="theme" id="theme" value=2>
                       Theme 2
                    </label>
                </div>
                @if ($errors->any()) <div style="color:red">{{$errors->first('theme')}}</div>@endif
            </div>
        </div>
        <div class="form-group">
            <label for="publish" class="control-label col-md-3 col-sm-3 col-xs-12">Publish</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <select name="publish" id="publish" class="form-control col-md-6 col-sm-6 col-xs-12">
                        <option value="{{$sub->publish}}" selected>---Select--</option>
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                    @if ($errors->any()) <div style="color:red">{{$errors->first('publish')}}</div>@endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                <button type="reset" class="btn btn-warning btn-md pull-left">Reset</button>
                <button type="submit" class="btn btn-success btn-md pull-right">Submit</button>
            </div>
        </div>

    </form>
    </div>
@endsection