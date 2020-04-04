@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<nav class="nav nav-pills mb-3">
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gymowner_account') }}">Members</a>
                        <a class="nav-link rounded-0 border border-primary active" href="#gym_activities">Member Activity</a>
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('my_videos', ['gym_id'=>$gym->id]) }}">{{ $gym->videos->count() }} Videos</a>
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gymowner_details') }}">Account Details</a>
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gym_details') }}">Gym Details</a>
                    </nav>

					<div class="add-gym-user">
                        <p><a href="{{ route('admin') }}">My Account</a> <i class="fas fa-angle-right"></i> Member Activity</p>
                        <h3>Member Activity</h3>
                        <input type="search" id="searchinput" class="form-control" placeholder="Search by Member Name or Action">
                        <p><span id="video_count">{{ $activities->count() }}</span> log(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped dtBasicExample" width="100%" id="myTable">
								<thead>
									<tr>
										<th scope="col">Member Name</th>
										<th scope="col">Action</th>
										<th scope="col">Date</th>
									</tr>
								</thead>
								<tbody>
                                    
								@foreach($activities as $key => $activity)
									<tr>
										@if($activity->causer->role_id == 2)
										<td data-id="{{ $activity->causer->id }}" style="font-weight: bold;">{{$activity->causer->first_name}} {{$activity->causer->last_name}}</td>
										@else
										<td>{{$activity->causer->first_name}} {{$activity->causer->last_name}}</td>
										@endif
										<td>
										@switch($activity->description)
											@case('favorite_video')
												Favorited <a href="{{ route('watch_gym', ['id' => $activity->subject->id])}}">{{ $activity->subject->video_title }}</a>
												@break
											@case('watch_video')
												Watched <a href="{{ route('watch_gym', ['id' => $activity->subject->id])}}">{{ $activity->subject->video_title }}</a>
												@break
											@case('login_user')
												Logged In
												@break
											@case('update_video')
												Edited <a href="{{ route('watch_gym', ['id' => $activity->subject->id])}}">{{ $activity->subject->video_title }}</a>
												@break
											@case('delete_video')
												Removed video
												@break
											@case('deny_member')
												Denied Member <span>{{$activity->subject->first_name}} {{$activity->subject->last_name}}</span>
												@break
											@case('request_member')
												Requested Access to <span>{{$activity->subject->gym_name}}</span>
												@break
											@case('cancel_member')
												Canceled Request of <span>{{$activity->subject->first_name}} {{$activity->subject->last_name}}</span>
												@break
											@case('approve_member')
												Added Member <span>{{$activity->subject->first_name}} {{$activity->subject->last_name}}</span>
												@break
											@case('create_video')
												Added <a href="{{ route('watch_gym', ['id' => $activity->subject->id])}}">{{ $activity->subject->video_title }}</a>
												@break
											@case('comment_video')
												Commented on <a href="{{ route('watch_gym', ['id' => $activity->subject->id])}}">{{ $activity->subject->video_title }}</a>
												@break
											@case('update_gym')
												Updated Gym Details
												@break
											@case('update_user')
												Updated Account Details
												@break
										@endswitch
												</td>
										<!-- <td>{{$activity->description}}</td> -->
										<td>{{$activity->created_at->format('m/d/yy h:m')}}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section>
	<script>
		// function searchvideo() {
		// var input, filter, table, tr, td, i, txtValue;
		// input = document.getElementById("searchinput");
		// filter = input.value.toUpperCase();
		// table = document.getElementById("myTable");
		// tr = table.getElementsByTagName("tr");
		// var inc = 0;
		// for (i = 1; i < tr.length; i++) {
		// 	td = tr[i];
		// 	if (td) {
		// 	txtValue = td.textContent || td.innerText;
		// 	if (txtValue.toUpperCase().indexOf(filter) > -1) {
		// 		tr[i].style.display = "";
		// 		inc++;
		// 	} else {
		// 		tr[i].style.display = "none";
		// 	}
		// 	}       
		// }
		// document.getElementById('video_count').innerHTML = inc;
		// }
		var table = $('.dtBasicExample').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"bPaginate": true,
			"bFilter": true,
			"bSort": true,
			"aaSorting": [
			[2, "desc"]
			]
		});
		$('input[type="search"]').on('keyup', function(){
			table.search( this.value ).draw();
			var info = table.page.info();
			var rowstot = info.recordsTotal;
			var rowsshown = info.recordsDisplay;
			$('#video_count').text(rowsshown);
		});
	</script>
    <!-- //Section Accounts End -->
    @endsection