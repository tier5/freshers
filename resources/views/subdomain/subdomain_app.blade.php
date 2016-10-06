
@extends('subdomain.layouts.'.$subdomain->theme)

@section('title')
    {{$subdomain->subdomain}}
@endsection


@section('name')


@endsection

@section('content')

    @foreach($articles as $article)
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <h1>{{ $article->title }}</h1>
                        <p class="lead">
                            by <a href="#">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>&nbsp;
                        </p>
                        <p class="normal"><a href=""><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
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
                    </div>
             </div>
        </div>
    @endforeach



@endsection