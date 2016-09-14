@extends('layouts.admin')

@section('title')
    Contact Management
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="page-header">Contact Management</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>s
            </div>
    @endif
    <!-- /.row -->
        <div class="row">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contact Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="clearfix">&nbsp;</div>
                            <table width="100%" class="table table-striped table-bordered table-hover ">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($contacts as $contact)
                                    <tr>
                                    <td>{{ $contact->first_name.' '.$contact->last_name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection