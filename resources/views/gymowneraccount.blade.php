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
                                @foreach ($active_members as $key => $member)
                                <tr>
                                    <td> {{ $member -> name }}</td><td>Activated</td><td>{{ $member->created_at }}</td>
                                    <td>
                                    <a href="#" class="text-danger delete-video" data-toggle="tooltip" data-placement="top" title="Delete member"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pending_request" role="tabpanel" aria-labelledby="pending_request_tab">
                    <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <td>Member Name</td><td>Status</td><td>Date</td><td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending_members as $key => $member)
                                <tr>
                                    <td> {{ $member -> name }}</td><td>Pending</td><td>{{ $member->created_at }}</td>
                                    <td>
                                    <a href="#" class="text-danger delete-video" data-toggle="tooltip" data-placement="top" title="Delete member"><i class="fas fa-trash"></i></a>
                                        <a href="#" class="text-success puhlish-video" data-toggle="tooltip" data-placement="top" title="Active member"><i class="fas fa-check-square"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection