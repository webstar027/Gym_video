@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="watch-video">
                        <p><a href="{{ url('/admin') }}">My Account</a> <i class="fas fa-angle-right"></i> <a href="">Managers BJJ</a> <i class="fas fa-angle-right"></i>{{Str::limit($data -> video_title, 50)}}</p>
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
										<!-- <p class="video-sub-description">{{ Str::limit($data -> description, 150)}} <a href="#">read more...</a></p>
										<p class="video-description" style="display:none">{{ $data -> description }} <a href="#">read more...</a> </p> -->
										<p class="description">{{ $data -> description }}</p>
									</div>
									<p class="video_tag">Tags: 
										@foreach(explode(',',$data -> tag) as $row)
										<span class="text-primary text-uppercase">{{ $row }}</span> ,
										@endforeach	
									</p>
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
			var active = $(this);
			e.preventDefault();
			var video_id = $(this).data('videoid');

			$.ajax({
				type:'GET',
				url: "/account/favorite/video/" + video_id,
				success : function(ret, status){
					if (ret){
						active.attr('class','btn_favorite active');
						console.log('btn_favorite active');
					}
					else{
						active.attr('class','btn_favorite unactive');
						console.log('btn_favorite unactive');
					}
				}
			});
		});

		//read more...
		$('.video_grid_content a').click(function(e){
			e.preventDefault();
			var sub_text = $(this).parent().find('.video-sub-description');
			var text = $(this).parent().find('.video-description');
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				sub_text.css('display','block');
				text.css('display','none');
				$(this).text('read more...');
			}else{
				$(this).addClass('active');
				text.css('display','block');
				sub_text.css('display','none');
				$(this).text('less...');
			}
		});
    });
    </script>
    <!-- //Section Accounts End -->
@endsection