@extends('layouts.article')

@section('article-content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">
        @forelse($articles as $article)
            <!-- Blog Post -->
            <!-- Title -->
            <h1>{{ $article->title }}</h1>
            <!-- Author -->
                <div class="pull-right">
                    <a href="{{ route('article.edit', [$article->slug]) }}" style="float: left">
                        <button type="button" class="btn btn-xs" style="float: left">
                            <i class="fa fa-pencil fa-2x"></i>
                        </button>
                    </a>
                    <form action="{{ route('article.destroy', [$article->slug]) }}" method="POST" style="float: left">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-times fa-2x"></i></button>
                    </form>
                </div>
                <p class="lead">
                    by <a href="#">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>&nbsp;
                </p>
            <!-- Date/Time -->
            <p class="normal"><a href="#"><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
            <p>
            <p class="lead">{!! $article->body !!}</p>
            <br />
            <p>
                @unless($article->tags->isEmpty())
                    @foreach($article->tags as $tag)
                        <a href="#">
                            <span class="glyphicon glyphicon-tag"></span>{{ $tag->name }}
                        </a>
                    @endforeach
                @endunless
            </p>
            <!-- Post Content -->
            <!-- Blog Comments -->
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <br />
                </form>
            </div>
            <hr>
            <!-- Posted Comments -->
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Lorem Ipsum
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Lorem Ipsum
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Viverra Turpis
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>
        @empty
            Sorry, no articles associated with this tag are found! :(
        @endforelse
    </div>
@endsection
