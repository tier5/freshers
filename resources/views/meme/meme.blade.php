@extends('layouts.app')

@section('title')
    Memes
@endsection

@section('style')

@endsection

@section('content')

<script src="//connect.facebook.net/en_US/sdk/debug.js"></script>
<script type="text/javascript" src="/js/fb-sharing.js"></script>

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
    <div class="row">
        <div class="center-block">
            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
                @if($memes)
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
                                    <img src="/uploads/meme/photo/{{ $meme->name }}" height=400 width=500 />
                                </a>
                            </div>
                            <hr />
                        </div>
                    @endforeach
                @else
                    <div class="cm-strong">Sorry no Meme Found !!</div>
                @endif
            </div>
        </div>
    </div>

@endsection