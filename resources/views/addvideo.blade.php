@extends('layouts.app')

@section('content')
	<!-- Section Accounts Start -->
	<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="view-gym-user">
                        <p><a href="{{ url('/account/gymowner') }}">My Account</a> <i class="fas fa-angle-right"></i> Add Video</p>
                        <h2 class="page-sub-title">Add Video</h2>
                        <form method="POST" action="{{ url('/account/gymowner/createvideo') }}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="url" class="form-control" name="video_url" placeholder="YouTube Video link">
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn my-btn">Retrieve Info</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="video_title" class="form-control" placeholder="Video Title">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Video Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag" placeholder="Enter individual tags separated by a comma (,)">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Publish this video</label>
                                  </div>
                            </div>
                            <button type="submit" class="btn my-btn">Submit Video</button>
                        </form>                        
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
    </section>
    <!-- //Section Accounts End -->
@endsection