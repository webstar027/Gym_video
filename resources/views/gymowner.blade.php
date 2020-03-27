@extends('layouts.app')

@section('content')
<section class="bg-trans">
		<div class="container">

			<div class="row">
				
				<div class="col-lg-12">
					<div class="gym-owner">
                        <p class="title-helper mb-4">Unable to keep your doors open due to the current COVID-19 closures?</p>
                        <div class="text-center">
                            <a href="">Create An Online Training Experience For Your Users.</a>
                            <a href="{{ route('register') }}" class="btn my-btn mt-3">Create Now</a>
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
					<div class="gym-owner">
                        <p class="title-helper mb-4">Upload your own videos on YouTube or share videos from other creators.</p>
                        <div class="text-center">
                            <a href="">Create Training Videos and Playlist for your members.</a>
                            <a href="{{ route('register') }}" class="btn my-btn mt-3">Create Now</a>
                        </div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
    </section>
@endsection