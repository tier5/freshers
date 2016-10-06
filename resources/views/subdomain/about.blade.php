@extends('subdomain.layouts.'.$subdomain->theme)
@section('title')
    about
@endsection
@section('content')
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pull-right">
                   <img src="{{URL::to('/uploads/profile_pic/'.$user->profile_picture)}}" class="img-responsive">
                </div>
                <div class="col-md-4 pull-left">
                     <h1>{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}</h1>
                </div>
                <div class="col-md-4">
                    <h5>{{ $user->email }}</h5>
                </div>
            </div>
        </div>
    </section>

@endsection