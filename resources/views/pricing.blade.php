@extends('layouts.app')

@section('content')
<section class="bg-trans">
		<div class="container">

			<div class="row">
				
				<div class="col-lg-12">
					<div class="pricing-text">
                        <p>The cost of running your gym during this pandemic is already a huge concern. We want to help.</p>
                        <p>Until this crisis is over, we will not charge for any of our plans. It's our way of saying thank you for helping our community stay healthy and engaged during this critical time.</p>
                        <p>We hope you enjoy the site and use it to it's full potential. If you have any suggestions, please feel free to communicate with us on our Facebook page.</p>
						<h2 class="title-default">Plan Pricing</h2>
					</div>
				</div>

            </div><!-- //.row -->
            
			<div class="row">
				
				<div class="col-lg-4">
					<div class="pricing-box">
                        <h3>Bronze</h3>
                        <hr>
                        <div class="price-details">
                            <p><span class="cost">$0.00</span> per month</p>
                            <p>Up to 5 Students</p>
                        </div>
                        <a href="{{ route('register') }}" class="btn my-btn">Start Now</a>
					</div>
				</div>
				<div class="col-lg-4 my-4 my-lg-0">
					<div class="pricing-box">
                        <h3>Silver</h3>
                        <hr>
                        <div class="price-details">
                            <p><span class="cost">$10.00</span> per month</p>
                            <p>Up to 100 Students</p>
                        </div>
                        <a href="{{ route('register') }}" class="btn my-btn">Start Now</a>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="pricing-box">
                        <h3>Gold</h3>
                        <hr>
                        <div class="price-details">
                            <p><span class="cost">$20.00</span> per month</p>
                            <p>Unlimited Students</p>
                        </div>
                        <a href="{{ route('register') }}" class="btn my-btn">Start Now</a>
					</div>
				</div>

			</div><!-- //.row -->
            
            <div class="row">
				
				<div class="col-lg-12">
					<p class="mt-4">Packages will automatically adjust to the next price tier based upon the number of students you have.</p>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section>
@endsection