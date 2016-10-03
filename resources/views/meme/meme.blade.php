@extends('layouts.app')

@section('title')
    Laravelsite | Memes
@endsection

@section('style')

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12">
        @foreach($memes as $meme)
            <div class="row">
                <div class="row">
                    <div class="pull-left">
                        <img class="media-object" src="/uploads/profile_pic/{{$meme->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:10%; margin-right:25px; ">
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-8 ">
                        <p class="normal">
                        <h3><a href="#">
                                {{ ucfirst($meme->user->first_name) }} {{ ucfirst($meme->user->last_name) }}
                            </a><br />
                            <small>&nbsp; <span class="glyphicon glyphicon-time"></span>
                                {{ $meme->created_at }}
                            </small></h3></p>
                    </div>
                </div>

                <div class="img-responsive">
                    <a href="{{ route('meme.single',[$meme->id]) }}">
                        <img src="/uploads/meme/photo/{{ $meme->name }}"/>
                    </a>
                </div>
                <hr />
                </div>
            @endforeach
        </div>
    </div>

@endsection
