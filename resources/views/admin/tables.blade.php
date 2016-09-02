@extends('layouts.admin')
@section('content')
    <div class="contaner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Table</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Country</th>
                                <th>Contact Number</th>
                                <th>Profile Pictute</th>
                                <th>Edit / Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->date_of_birth}}</td>
                                    <td>{{App\Country::where('id','=',$user->country_id)->first()->name}}</td>
                                    <td>{{$user->contact_number}}</td>
                                    <td><img src="{{URL::to('uploads/profile_pic/'.$user->profile_picture)}}" height=90 width=90> </td>
                                    <td>
                                        @if($user->isadmin==0)
                                            <a href="{{URL::to('/admin/user/edit/'.$user->id)}}"><i class="fa fa-edit"></i> Edit </a><br><a href="{{URL::to('/admin/user/delete/'.$user->id)}}"><i class="fa fa-exclamation-triangle"></i> Delete </a>
                                @else
                                            Admin
                                        @endif
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>

                            </table>
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