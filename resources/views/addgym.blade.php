@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="add-gym-user">
                        <p><a href="{{ route('admin') }}">My Account</a> <i class="fas fa-angle-right"></i> Gym Search</p>
						<h2 class="page-sub-title">Gym Search</h2>
                        <input type="search" class="form-control" id="searchinput" placeholder="Gym Name or Owner name">
                        <p><span id="gym_count">{{ $allgyms->count() }}</span> Gym(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped dtBasicExample m-table" width="100%"  id="myTable">
								<thead>
									<tr>
										<th scope="col">Gym Name</th>
										<th scope="col">Gym Owner</th>
										<th scope="col">Member Count</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($allgyms as $key => $gym)
									<tr>
										<td>
											<span class="m-title">Gym Name: </span>
											<span class="m-data">{{$gym -> gym_name}}</span>
										</td>
										<td>
											<span class="m-title">Gym Owner: </span>
											<span class="m-data">{{$gym -> owner -> first_name}} {{$gym -> owner -> last_name}}</span>
										</td>
										<td style="padding-left:50px">
											<span class="m-title">Member Count: </span>
											<span class="m-data">{{$gym -> activeMembers -> count()}}</span>
										</td>
										<td>
											<span class="m-title">Status: </span>
											<span class="m-data">
											@if($gym -> status == 0)
											
											@elseif($gym -> status == 1) 
											Approved 
											@elseif($gym -> status == 2) 
											Pending 
											@elseif($gym -> status == 3)
											Denied
											@endif
											</span>
										</td>
										<td>
											<span class="m-title">Action: </span>
											<span class="m-data">
											@if($gym -> status == 0)
											<a href="{{route('request_access', ['gym_id'=>$gym -> id])}}" class="text-info request-access" data-toggle="tooltip" data-placement="top" title="Request Access">Request Access</a>
											@elseif($gym -> status == 1) 
											<a href="{{ route('view_gym',['gym_id'=>$gym -> id]) }}" class="text-success view_gympage" data-toggle="tooltip" data-placement="top" title="View Gym Page">View Gym Page</a>
											@elseif($gym -> status == 2) 
											<a href="{{route('request_cancel', ['gym_id'=>$gym -> id])}}" class="text-danger calcel-request" data-toggle="tooltip" data-placement="top" title="Cancel Request">Cancel Request</a> 
											@elseif($gym -> status == 3)
											<a href="#" class="text-danger request-time" data-toggle="tooltip" data-placement="top" title="Denied">{{ $gym->time }}</a> 
											@endif
											</span>
										</td>
									</tr>
									@endforeach
									<!-- <tr>
										<td scope="row">Rima</td>
										<td>Hasan</td>
                                        <td>Pending</td>
                                        <td><a href="#" class="text-danger">Cancel Request</a></td>
									</tr>
									<tr>
										<td scope="row">Rima</td>
										<td>Hasan</td>
										<td>Denied</td>
										<td>23:14:15 wait time</td>
									</tr>
									<tr>
										<td scope="row">Rima</td>
										<td>Hasan</td>
										<td>Approved</td>
										<td><a href="#" class="text-success">View Gym Page</a></td>
									</tr>
									<tr>
										<td scope="row">Rima</td>
										<td>Hasan</td>
										<td></td>
										<td><a href="#" class="text-info">Request Access</a></td>
									</tr> -->
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
			$('.calcel-request').click(function(e){
				
				var r = confirm("Are you sure cancel request?");
				if(r == true){
					return;
				}else{
					e.preventDefault();
				}
			});
		});
		// function searchvideo() {
		// var input, filter, table, tr, td, i, txtValue;
		// input = document.getElementById("searchinput");
		// filter = input.value.toUpperCase();
		// table = document.getElementById("myTable");
		// tr = table.getElementsByTagName("tr");
		// var inc =0;
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
		// document.getElementById('gym_count').innerHTML = inc;
		// }
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
		$('input[type="search"]').on('keyup', function(){
			table.search( this.value ).draw();
			var info = table.page.info();
			var rowstot = info.recordsTotal;
			var rowsshown = info.recordsDisplay;
			$('#gym_count').text(rowsshown);
		});
	</script>
    <!-- //Section Accounts End -->
@endsection