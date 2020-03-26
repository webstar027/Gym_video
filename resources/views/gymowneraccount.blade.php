@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- <h3>Hello {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h3><br/> -->
                <div class="gym-name-stats">
                    <h1 class="page-sub-title mb-3">Gym Name Stats</h1>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active rounded-0" id="active_members_tab" data-toggle="pill" href="#active_members" role="tab"
                            aria-controls="pills-home" aria-selected="true">{{ active_count }}Active Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="pending_members_tab" data-toggle="pill" href="#pending_members" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Pending Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="uploaded_videos_tab" data-toggle="pill" href="#uploaded_videos" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Uploaded Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="new_video_tab" data-toggle="pill" href="#new_video" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Add New Video</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="active_members" role="tabpanel" aria-labelledby="active_members_tab">
                            Active Members
                        </div>
                        <div class="tab-pane fade" id="pending_members" role="tabpanel" aria-labelledby="pending_members_tab">
                            Pending Request
                        </div>
                        <div class="tab-pane fade" id="uploaded_videos" role="tabpanel" aria-labelledby="uploaded_videos_tab">
                            Uploaded Videos
                        </div>
                        <div class="tab-pane fade" id="new_video" role="tabpanel" aria-labelledby="new_video_tab">
                            Add New Video
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection