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
                        <a href="">Add Videos</a>
                        <input type="search" class="form-control" placeholder="Search by title, description or #tag">
                        <p>2 Gym(s) have matched your search criteria</p>
                        <h3 class="page-sub-title-alt">Search Results</h3>
                        <div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Video Title</th>
										<th scope="col">Date</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row"><a href="">Something new</a></td>
										<td>March 25, 2020 4:20pm</td>
                                        <td>Published</td>
                                        <td>
                                            <a href="#" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
									</tr>
									<tr>
										<td scope="row"><a href="">Something new</a></td>
										<td>March 25, 2020 4:20pm</td>
                                        <td>Pending</td>
                                        <td>
                                            <a href="#" class="text-danger mr-2"><i class="fas fa-trash"></i></a>
                                            <a href="#" class="text-success"><i class="fas fa-check-square"></i></a>
                                        </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
    </section>
    <!-- //Section Accounts End -->
    @endsection