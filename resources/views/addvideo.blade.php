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
                        <form method="POST" action="{{ url('/account/gymowner/addvideo') }}">
                            @csrf
                            <input type="hidden" name="gym_id" value="{{ $gym_id }}">
                                  
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="url" class="form-control" name="video_url" placeholder="YouTube Video link" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" id="retrieve" class="btn my-btn">Retrieve Info</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="video_title" maxlength="100" class="form-control" placeholder="Video Title" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" maxlength="250" cols="30" rows="5" placeholder="Video Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag" maxlength="100" placeholder="Enter individual tags separated by a comma (,)" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="status" class="custom-control-input" value="1" id="customCheck1">
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
<script>
    jQuery(document).ready(function($){
        $('#retrieve').click(function(){
           
            var url = $('input[name="video_url"]').val();
            $.get("/getYoutube/"+getId(url), function(response, status){
                console.log(response);
                $('input[name="video_title"]').val(response['title']);
                $('textarea[name="description"]').text(response['description']);
                $('textarea[name="description"]').val(response['description']);
                $('input[name="tag"]').val(response['tag']);
            });
        });
    function getId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return 'error';
        }
    }
    });
</script>
    <!-- //Section Accounts End -->
@endsection