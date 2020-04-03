@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="add-gym-user">
                        <p><a href="{{ route('gymowner_account') }}">My Account</a> <i class="fas fa-angle-right"></i> {{$playlist_name}}</p>
                        <h2 class="page-sub-title">{{$playlist_name}}</h2>
                        <input type="search" onkeyup="searchvideo()" id="searchinput" class="form-control" placeholder="Search by title, description, playlist or #tag">
                        <p><span id="video_count">{{ $videos ->count() }}</span> video(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped dtBasicExample" width="100%" id="myTable">
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
										<td scope="row"><a href="{{ route('watch_gym', ['id'=>$video->id]) }}">{{ Str::limit($video -> video_title, 40)}}</a></td>
										<td>{{ $video -> created_at }}</td>
										<td><a href="{{ route('gym_playlist',['id'=>$video->pivot->playlist_id]) }}">{{$playlist_name}}</a></td>
                                        <td>
											@if($video->status == "1") 
												Published 
											@else 
												Pending
											@endif
										</td>
										<td style="display:none">{{ $video -> tag }}</td>
										<td style="display:none">{{ $video -> description }}</td>
                                        <td>
											<a href="{{ route('delete_video', ['id'=>$video->id]) }}" class="text-danger delete-video" data-toggle="tooltip" data-placement="top" title="Delete Video"><i class="fas fa-trash"></i></a>
											<a href="{{ route('update_video', ['id'=>$video->id]) }}"  class="text-primary editvideo" data-toggle="tooltip" data-placement="top" title="Edit video"><i class="fas fa-pen-square"></i></a>
											@if($video->status == "0") 
												<a href="{{route('publish_video', ['id'=>$video->id])}}" class="text-success puhlish-video" data-toggle="tooltip" data-placement="top" title="Puhlish Video"><i class="fas fa-check-square"></i></a>
											@endif
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
		function searchvideo() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("searchinput");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		var inc = 0;
		for (i = 1; i < tr.length; i++) {
			td = tr[i];
			if (td) {
			txtValue = td.textContent || td.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
				inc++;
			} else {
				tr[i].style.display = "none";
			}
			}       
		}
		document.getElementById('video_count').innerHTML = inc;
		}
	</script>
    <!-- //Section Accounts End -->
    @endsection