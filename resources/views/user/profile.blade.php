@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
<div class="row">
    @if(Session::has('success'))
        <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
            <p class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success')}}
            </p>
        </div>
    @endif
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-lg-2 col-sm-push-9 col-lg-push-10">
                    <nav class="navbar navbar-default navbar-fixed-side">
                        <!-- normal collapsable navbar markup -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 img-circle"> <img src="uploads/profile_pic/{{$user->profile_picture}}" style="height: 120px; width: 120px;  border-radius: 50%" alt="Profile Picture" /></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12"><h2>{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</h2></div>
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
                    </nav>
                </div>
                <div class="col-sm-9 col-lg-10 col-sm-pull-3 col-lg-pull-2">
                    <!-- your page content -->
                    <div class="col-md-8">
                        <h1 class="page-header">
                            Your Latest Post
                            {{-- <small>Secondary Text</small> --}}
                            @if(Auth::check())
                                <a href="{{ route('article.create') }}">
                                    <button class="btn btn-md btn-success pull-right">Post new</button>
                                </a>
                            @endif
                        </h1>
                        <!-- Blog Posts Listing -->
                        @if(count($articles) > 0)
                            @foreach($articles as $article)
                                <article class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2><a href="{{ route('article.show', [$article->slug]) }}">{{ $article->title }}</a>&nbsp;<small>(<a href="#">{{ $article->category->name }}</a>)</small></h2>
                                    </div>
                                    <div class="panel-body">
                                        <p><a href="{{  URL::to('userarticle/'.$article->user_id) }}"><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
                                        <p>{!! str_limit($article->body, 300) !!}</p>
                                    </div>
                                    <div class="panel-footer">
                                        <p>
                                            @unless($article->tags->isEmpty())
                                                @foreach($article->tags as $tag)
                                                    <a href="#">
                                                        <span class="glyphicon glyphicon-tag"></span>{{ $tag->name }}
                                                    </a>
                                                @endforeach
                                            @endunless
                                            <a class="btn btn-default btn-sm pull-right" href="{{ route('article.show', [$article->slug]) }}">more...</a>
                                        </p>
                                        <br />
                                    </div>
                                </article>
                            @endforeach
                        <!-- Pager -->
                            {{-- <ul class="pager">
                                <li class="previous">
                                    <a href="#">&larr; Older</a>
                                </li>
                                <li class="next">
                                    <a href="#">Newer &rarr;</a>
                                </li>
                            </ul> --}}
                        @else
                            Sorry, no articles are found! <i class="fa fa-frown-o" aria-hidden="true"></i>
                        @endif
                    </div>

                </div>
            </div>
        </div>


</div>
@endsection