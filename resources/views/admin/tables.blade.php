@extends('layouts.admin')
@section('content')
    <div class="contaner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Management</h1>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name.' '.$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->isadmin==0)
                                            <p class="user">User</p>
                                @else
                                           <p class="admin">Admin</p>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-info-circle fa-fw"></i> Info</button></a>
                                    <a href="#"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</button></a>
                                    <form class="form form-inline" action="#" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o fa-fw"></i> Delete</button>
                                    </form>
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