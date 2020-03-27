@extends('layouts.app')

@section('content')
	<!-- Section Accounts Start -->
	<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="view-gym-user">
                        <p><a href="">My Account</a> <i class="fas fa-angle-right"></i> Managers BJJ</p>
                        <h2 class="page-sub-title">Managers BJJ</h2>
						
						<div class="row align-items-center">
							<div class="col-md-4"><input type="search" class="form-control" placeholder="Gym Name or Owner name"></div>
							<div class="col-md-8">
								<p class="mb-0"><a href=""><i class="fas fa-heart"></i></a> Display only favorites</p>
							</div>
						</div>
                        <h3 class="page-sub-title-alt mt-3">Search Results</h3>
                        <p>2 Gym(s) have matched your search criteria</p>
                        <div class="row">
							@foreach($data->videos as $key => $video)
							<div class="col-md-6 col-lg-4">
								<div class="video-box">
									<h3>Video Title</h3>
									<div class="row align-items-center">
										<div class="col-9"><p class="mb-0">Uploaded: March 23, 2002</p></div>
										<div class="col-3 text-right"><a href=""><i class="fas fa-heart"></i></a></div>
									</div>
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
									</div>
									<p class="video-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit rerum architecto omnis laudantium culpa porro eveniet libero? <a href="">read more...</a> </p>
									<a href="">#Tags</a>
									<a href="">#Tags</a>
									<a href="">#Tags</a>
									<a href="">#Tags</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
    </section>
    <!-- //Section Accounts End -->
@endsection