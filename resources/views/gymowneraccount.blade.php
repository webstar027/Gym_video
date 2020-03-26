@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- <h3>Hello {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h3><br/> -->
                <div class="gym-name-stats">
                    <h2 class="page-sub-title">Gym Name Stats</h2>
                    <nav class="nav">
                        <a class="nav-link active" href="#">{{ active_count }} Active Members</a>
                        <a class="nav-link" href="#">{{ pending_count }} Pending Request</a>
                        <a class="nav-link" href="#">{{ video_count }} Uploaded Videos</a>
                        <a class="nav-link" href="#">Add new Video</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection