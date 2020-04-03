@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="add-gym-user">
                        <p><a href="{{ route('admin') }}">My Account</a> <i class="fas fa-angle-right"></i> Member Activity</p>
                        <h3>Member Activity</h3>
                        <input type="search" onkeyup="searchvideo()" id="searchinput" class="form-control" placeholder="Search by membername or action">
                        <p><span id="video_count"></span> log(s) have matched your search criteria</p>
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
										<td>{{$activity->causer->first_name}} {{$activity->causer->last_name}}</td>
										<td>{{$activity->descrption}}</td>
										<td>{{$activity->created_at}}</td>
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
		// jQuery(document).ready(function(){
		// 	$('.delete-video').click(function(e){
				
		// 		var r = confirm("Are you sure delete this?");
		// 		if(r == true){
		// 			return;
		// 		}else{
		// 			e.preventDefault();
		// 		}
		// 	});
		// });
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