@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="add-gym-user">
                        <p><a href="{{ url('/account/gymowner') }}">My Account</a> <i class="fas fa-angle-right"></i> My Videos</p>
                        <h2 class="page-sub-title">My Videos</h2>
                        <a href="{{ url('/account/gymowner/addvideo/'.$gym_id) }}">Add Videos</a>
                        <input type="search" onkeyup="searchvideo()" id="searchinput" class="form-control" placeholder="Search by title, description or #tag">
                        <p><span id="video_count">{{ $videos ->count() }}</span> video(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped dtBasicExample" width="100%" id="myTable">
								<thead>
									<tr>
										<th scope="col">Video Title</th>
										<th scope="col">Date</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($videos as $key => $video)
									<tr>
										<td scope="row"><a href="{{ url('/account/gymowner/video/'.$video->id) }}">{{ Str::limit($video -> video_title, 40)}}</a></td>
										<td>{{ $video -> created_at }}</td>
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
											<a href="{{ url('/account/gymowner/deletevideo/'.$video->id) }}" class="text-danger delete-video" data-toggle="tooltip" data-placement="top" title="Delete Video"><i class="fas fa-trash"></i></a>
											<a href="{{ url('/account/gymowner/updatevideo/'.$video->id) }}"  class="text-primary editvideo" data-toggle="tooltip" data-placement="top" title="Edit video"><i class="fas fa-pen-square"></i></a>
											@if($video->status == "0") 
												<a href="{{url('/account/gymowner/puhlishvideo/'.$video->id)}}" class="text-success puhlish-video" data-toggle="tooltip" data-placement="top" title="Puhlish Video"><i class="fas fa-check-square"></i></a>
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