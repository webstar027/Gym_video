@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="watch-video">
                        <p><a href="{{ url('/admin') }}">My Account</a> <i class="fas fa-angle-right"></i> <a href="{{ url('/account/gymowner/gym/myvideos/'.$data->gym_id) }}">My Videos</a> <i class="fas fa-angle-right"></i> Video Title</p>
                        <h2 class="page-sub-title">{{ $data->video_title }}</h2>
                        <div class="row">
							<div class="col-md-12">
								<div class="video-box">
									<div class="row align-items-center video-info">
										<div class="col-7"><p class="mb-0">Uploaded: {{ $data->created_at }}</p></div>
										<div class="col-5 text-right"><a href="#" data-videoid="{{ $data->id }}" class="btn_favorite @if($data -> favorite == true) active @else unactive @endif"><i class="fas fa-heart"></i><i class="far fa-heart"></i> Save as Favorite</a></div>
									</div>
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" data_url="{{$data -> video_url }}" src="" allowfullscreen></iframe>
									</div>
									<div class="video_grid_content">
											<p class="video-description">{{ $data -> description }}</p>
											<a href="#">read more...</a> 
									</div>
									<p class="video_tag">Tags: <span class="text-primary text-uppercase">{{ $data -> tag }}</span> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
    </section>
    <script>
    jQuery(document).ready(function($){
        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }
        var src = $('.embed-responsive-item').attr('data_url');
		$('.embed-responsive-item').attr('src','//www.youtube.com/embed/' + getId(src));
		//ajax favorite
		$(".btn_favorite").click(function(e){
			e.preventDefault();
			var video_id = $(this).data('videoid');

			$.ajax({
				type:'GET',
				url: "/account/favorite/video/" + video_id,
				success : function(ret){
					if (ret){
						$(this).attr('class', 'btn_favorite active');
					}
					else{
						$(this).attr('class', 'btn_favorite unactive');
					}
				}
			});
		});
		//read more...
		$('.video_grid_content > a').click(function(e){
			e.preventDefault();
			if($(this).parent().hasClass('active')){
				$(this).parent().removeClass('active');
				$(this).text('read more...');
			}else{
				$(this).parent().addClass('active');
				$(this).text('less...');
			}
		});
    });
    </script>
    <!-- //Section Accounts End -->
@endsection