@extends('layouts.app')

@section('content')
<section class="bg-trans">
		<div class="container">

			<div class="row justify-content-center">
				
				<div class="col-lg-12">
					<div class="student">
						<p class="title-helper mb-4">Just because you can't go to the gym, it doesn't mean you can't continue to train.</p>
						<div class="row">
							<div class="col-md-6 col-lg-4">
								<div class="student-img-box">
									<img src="assets/images/student/img-1.jpg" alt="" class="img-fluid">
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="student-img-box">
									<img src="assets/images/student/img-2.jpg" alt="" class="img-fluid">
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="student-img-box">
									<img src="assets/images/student/img-3.jpg" alt="" class="img-fluid">
								</div>
							</div>
						</div>
                        <div class="text-center">
							<a href="{{ route('register') }}" class="btn my-btn">Register</a>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section>

	<section class="bg-white">
		<div class="container">

			<div class="row justify-content-center">
				
				<div class="col-lg-12">
					<div class="student">
						<p class="title-helper mb-4">Find your online training experience</p>
						<div class="row">
							<div class="col-md-6 col-lg-4">
								<div class="student-img-box">
									<img src="assets/images/student/img-4.jpg" alt="" class="img-fluid">
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="student-img-box">
									<img src="assets/images/student/img-5.jpg" alt="" class="img-fluid">
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="student-img-box">
									<img src="assets/images/student/img-6.jpg" alt="" class="img-fluid">
								</div>
							</div>
						</div>
                        <div class="text-center">
							<a href="{{ route('register') }}" class="btn my-btn">Search</a>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section>
@endsection