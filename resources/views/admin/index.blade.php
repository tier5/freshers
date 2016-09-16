@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 pull-left">
            <h3> Welcome! {{ucfirst($user->first_name)}}</h3>
        </div>
        <div class="col-lg-4 col-md-4 pull-right">
            <div data-type="plugin"></div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Bar chart For Blog Posts
                </div>
                <div class="panel-body">
                    <div id="bar-Blog"></div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Line Charts for User Registration
                </div>
                <div class="panel-body">
                    <div id="bar-Registration"></div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
        </div>

    <script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('getbarforblog') }}",
            dataType: 'JSON',
            type: 'GET',
            data: {get_values: true},
            success: function(data) {
                Morris.Bar({
                    element: 'bar-Blog',
                    data: data,
                    xkey: 'date',
                    ykeys: ['value'],
                    labels: ['Post'],
                    hideHover: 'auto',
                    resize: true
                });
            }
         });

        $.ajax({
            url: "{{ route('getbarforregisttration') }}",
            dataType: 'JSON',
            type: 'GET',
            data: {get_values: true},
            success: function(reg) {
                Morris.Line({
                    element: 'bar-Registration',
                    data: reg,
                    xkey: 'date',
                    ykeys: ['value'],
                    labels: ['New User'],
                    hideHover: 'auto',
                    resize: true
                });
            }
        });

    });
    </script>
@endsection

@section('extended-style')
    <script src="/weather/weather.js"></script>
@endsection