@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container"> 
			<div class="row">
				<div class="col-md-12">
					<nav class="nav nav-pills mb-3">
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gymowner_account') }}">Members</a>
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gymmember_activity', ['gym_id'=>$gym_id]) }}">Member Activity</a>
                        <a class="nav-link rounded-0 border border-primary active" href="{{ route('my_videos', ['gym_id'=>$gym_id]) }}">{{ $videos->count() }} Videos</a>
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gymowner_details') }}">Account Details</a>
                        <a class="nav-link rounded-0 border border-primary" href="{{ route('gym_details') }}">Gym Details</a>
                    </nav>
					<div class="add-gym-user">
                        <p><a href="{{ route('gymowner_account') }}">My Account</a> <i class="fas fa-angle-right"></i> My Videos</p>
                        <h2 class="page-sub-title">My Videos</h2>
                        <a href="{{ route('add_video', ['gym_id'=>$gym_id]) }}" class="btn my-btn mb-3">Add Videos</a>
                        <input type="search" id="searchinput" class="form-control" placeholder="Search by title, description, playlist or tag">
                        <p><span id="video_count">{{ $videos ->count() }}</span> video(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped dtBasicExample m-table" width="100%" id="myTable">
								<thead>
									<tr>
										<th scope="col">Video Title</th>
										<th scope="col">Date</th>
										<th scope="col">Playlist</th>
										<th scope="col">Status</th>
										<td style="display:none">Tags</td>
										<td style="display:none">Description</td>
										<th scope="col">Action</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($videos as $key => $video)
									<tr>
										<td scope="row">
											<span class="m-title">Video Title: </span>
											<span class="m-data"><a href="{{ route('watch_gym', ['id'=>$video->id]) }}">{{ Str::limit($video -> video_title, 40)}}</a></span>
										</td>
										<td>
											<span class="m-title">Date: </span>
											<span class="m-data">{{ $video -> created_at->format('m/d/Y g:iA') }}</span>
										</td>
										<td>
											<span class="m-title">Playlist: </span>
											<span class="m-data">
												@if($video->playlist !=null)
												<a href="{{ route('gym_playlist', ['id'=>$video->playlist->id]) }}">{{ $video->playlist->name }}</a>
												@endif
											</span>
										</td>
                                        <td>
											<span class="m-title">Status: </span>
											<span class="m-data">
											@if($video->status == "1") 
												Published 
											@else 
												Pending
											@endif
											</span>
										</td>
										<td style="display:none">
											<span class="m-title">Tags: </span>
											<span class="m-data">{{ $video -> tag }}</span>
										</td>
										<td style="display:none">
											<span class="m-title">Description: </span>
											<span class="m-data">{{ $video -> description }}</span>
										</td>
                                        <td>
											<span class="m-title">Action: </span>
											<span class="m-data">
												<a href="{{ route('delete_video', ['id'=>$video->id]) }}" class="text-danger delete-video" data-toggle="tooltip" data-placement="top" title="Delete Video"><i class="fas fa-trash"></i></a>
												<a href="{{ route('update_video', ['id'=>$video->id]) }}"  class="text-primary editvideo" data-toggle="tooltip" data-placement="top" title="Edit video"><i class="fas fa-pen-square"></i></a>
												@if($video->status == "0") 
													<a href="{{route('publish_video', ['id'=>$video->id])}}" class="text-success puhlish-video" data-toggle="tooltip" data-placement="top" title="Puhlish Video"><i class="fas fa-check-square"></i></a>
												@endif
											</span>
                                        </td>
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
		jQuery(document).ready(function(){
			$('.delete-video').click(function(e){
				
				var r = confirm("Are you sure delete this?");
				if(r == true){
					return;
				}else{
					e.preventDefault();
				}
			});
		});
		var table = $('.dtBasicExample').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"bPaginate": true,
			"bFilter": true,
			"bSort": true,
			"aaSorting": [
			[1, "asc"]
			]
		});
		//function searchvideo() {
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
		
		
		//}
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