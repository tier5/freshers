@extends('layouts.admin')
@section('content')
    <div class="contaner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Profile</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="background-color: cornsilk">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 img-circle pull-right"> <img src="/uploads/profile_pic/{{$user->profile_picture}}" style="height: 120px; width: 120px;  border-radius: 50%" alt="Profile Picture" /></div>
                            <div class="col-xs-12 col-sm-4 pull-left"><h2>{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</h2></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">Email:</div>
                            <div class="col-xs-12 col-sm-6">{{$user->email}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">Date of Birth:</div>
                            <div class="col-xs-12 col-sm-6">
                                @if($user->date_of_birth != null)
                                    {{date('d F Y',strtotime($user->date_of_birth))}}
                                @else
                                    Not Selected
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">Country:</div>
                            <div class="col-xs-12 col-sm-6">
                                @if(count(App\Country::where('id','=',$user->country_id)->first())>0)
                                    {{App\Country::where('id','=',$user->country_id)->first()->name}}
                                @else
                                    Not Selected
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">Phone: </div>
                            <div class="col-xs-12 col-sm-6">
                                @if(count(App\Country::where('id','=',$user->country_id)->first())>0)
                                    {{App\Country::where('id','=',$user->country_id)->first()->isd_prefix.$user->contact_number}}
                                @else
                                    -------------
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper --
    @endsection