@extends('layouts.app')

@section('title')
    Your Meme
@endsection

@section('style')
    <link href="/css/3-col-portfolio.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        @if (Session::has('warning'))
            <div class="row">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('warning') }}
                </div>
            </div>
        @endif
    </div>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Your Meme
                    <small></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        @if(count($memes)>0)
            <div class="row">

                @foreach($memes as $meme)
                    <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4 portfolio-item">
                        <a href="{{ route('meme.single',[$meme->id]) }}">
                            <img class="img-responsive" atr="http://placehold.it/700x400" src="/uploads/meme/photo/{{ $meme->name }}">
                        </a>
                        <p>Created at: {{$meme->created_at}} </p>
                    </div>
                @endforeach
            </div>
        @else
            You do not Create A meme Yet !!
    @endif
    <!-- /.container -->
    </div>
@endsection