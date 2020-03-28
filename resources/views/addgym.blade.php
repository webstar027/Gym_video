@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="add-gym-user">
                        <p><a href="{{ url('/admin') }}">My Account</a> <i class="fas fa-angle-right"></i> Gym Search</p>
                        <h2 class="page-sub-title">Gym Search</h2>
                        <input type="search" onkeyup="searchvideo()" class="form-control" id="searchinput" placeholder="Gym Name or Owner name">
                        <p>2 Gym(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped" id="myTable">
								<thead>
									<tr>
										<th scope="col">Gym Name</th>
										<th scope="col">Gym Owner</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($allgyms as $key => $gym)
									<tr>
										<td>{{$gym -> gym_name}}</td>
										<td>{{$gym -> owner -> name}}</td>
										<td>
											@if($gym -> status == 0)
											
											@elseif($gym -> status == 1) 
											Approved 
											@elseif($gym -> status == 2) 
											Pending 
											@elseif($gym -> status == 3)
											Denied
											@endif
										</td>
										<td>
											@if($gym -> status == 0)
											<a href="{{url('/account/student/gyms/access/'.$gym -> id)}}" class="text-info request-access" data-toggle="tooltip" data-placement="top" title="Request Access">Request Access</a>
											@elseif($gym -> status == 1) 
											<a href="{{ url('/account/student/viewgym/'.$gym -> id) }}" class="text-success view_gympage" data-toggle="tooltip" data-placement="top" title="View Gym Page">View Gym Page</a>
											@elseif($gym -> status == 2) 
											<a href="{{url('/account/student/gyms/cancel/'.$gym -> id)}}" class="text-danger calcel-request" data-toggle="tooltip" data-placement="top" title="Cancel Request">Cancel Request</a> 
											@elseif($gym -> status == 3)
											<a href="#" class="text-danger request-time" data-toggle="tooltip" data-placement="top" title="Denied">23:14:15 wait time</a> 
											@endif
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
		function searchvideo() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("searchinput");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 1; i < tr.length; i++) {
			td = tr[i];
			if (td) {
			txtValue = td.textContent || td.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
			}       
		}
		}
	</script>
    <!-- //Section Accounts End -->
@endsection