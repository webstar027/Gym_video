@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- <h3>Hello {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h3><br/> -->
                <div class="gym-name-stats">
                    <h2 class="page-sub-title pb-3 mb-3">Gym Name Stats</h2>
                    <nav class="nav nav-pills">
                        <a class="nav-link rounded-0 active"  id="active_members_tab" data-toggle="pill" href="#active_members" role="tab" aria-controls="active_members" aria-selected="true">{{ $active_count }} Active Members</a>
                        <a class="nav-link rounded-0"  id="pending_request_tab" data-toggle="pill" href="#pending_request" role="tab" aria-controls="pending_request">{{ $pending_count }} Pending Request</a>
                        <a class="nav-link" href="{{ url('/account/gymowner/gym/myvideos/') }}/{{ $gym_id }}">{{ $video_count }} Uploaded Videos</a>
                        <a class="nav-link" href="{{ url('/account/gymowner/addvideo/') }}/{{ $gym_id }}">Add new Video</a>
                    </nav>
                </div>
                <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="active_members" role="tabpanel" aria-labelledby="active_members_tab">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <td>Member Name</td><td>Status</td><td>Date</td><td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pending_request" role="tabpanel" aria-labelledby="pending_request_tab">Ad
                        pariatur nostrud pariatur exercitation ipsum ipsum culpa mollit commodo mollit ex. Aute sunt incididunt
                        amet commodo est sint nisi deserunt pariatur do. Aliquip ex eiusmod voluptate exercitation cillum id
                        incididunt elit sunt. Qui minim sit magna Lorem id et dolore velit Lorem amet exercitation duis
                        deserunt. Anim id labore elit adipisicing ut in id occaecat pariatur ut ullamco ea tempor duis.</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection