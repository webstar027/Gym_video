@extends('layouts.app')

@section('content')
	<!-- Section Accounts Start -->
	<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="view-gym-user">
                        <p><a href="{{ url('/account/student') }}">My Account</a> <i class="fas fa-angle-right"></i> {{ $data -> gym_name }}</p>
                        <h2 class="page-sub-title">{{ $data -> gym_name }}</h2>
						
						<div class="row align-items-center">
							<div class="col-md-4"><input type="search" onkeyup="searchvideo()" class="form-control" placeholder="Search by Title, Description, or #Tag" id="searchinput"></div>
							<div class="col-md-8">
								<p class="mb-0"><a href="#" class="favorit_button unactive"><i class="fas fa-heart"></i><i class="far fa-heart"></i></a> Display only favorites</p>
							</div>
						</div>
                        <h3 class="page-sub-title-alt mt-3">Search Results</h3>
						<p><span id="search_count">{{$data->videos->count()}}</span> Video(s) have matched your search criteria.</p>
						<div class="video_container" id="video_container">
							<div class="row video_row">
								@foreach($data->videos as $key => $video)
								
								<div class="col-md-6 col-lg-4 video_col">
									<div class="video-box">
										<h3>{{ $video -> video_title}}</h3>
										<div class="row align-items-center">
											<div class="col-9"><p class="mb-0">Uploaded: {{ $video -> created_at}}</p></div>
											<div class="col-3 text-right"><a href="#" data-videoid="{{ $video->id }}" class="btn_favorite @if($video -> favorite == true) active @else unactive @endif"><i class="fas fa-heart"></i><i class="far fa-heart"></i></a></div>
										</div>
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" data-url="{{ $video -> video_url }}" src="" allowfullscreen></iframe>
										</div>
										<div class="video_grid_content">
											<p class="video-description">{{ $video -> description }}</p>
											<a href="#">read more...</a> 
										</div>
										<p class="video_tag">Tags: 
											@foreach(explode(',',$video -> tag) as $row)
											<span class="text-primary text-uppercase">{{ $row }}</span> ,
											@endforeach	
										</p>
									</div>
								</div>
								@if($loop->iteration%3 == 0 )
								<!-- </div>
								<div class="row"> -->
								@endif
								@endforeach
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
        $('.embed-responsive-item').each(function(){
			var src = $(this).data('url');
			$(this).attr('src','//www.youtube.com/embed/' + getId(src));
		});
		
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
	//read more....
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

	//favorite toggle
	$('.favorit_button').click(function(e){
		e.preventDefault();
		var video_col = $('.video_col');
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$(this).addClass('unactive');
			$('.video_col').each(function(index, item){
				if(!$(this).find('.btn_favorite').hasClass('active')){
					$(this).show();
				}

			});
		
		}else if($(this).hasClass('unactive')){
			$(this).removeClass('unactive');
			$(this).addClass('active');
			$('.video_col').each(function(index, item){
				if(!$(this).find('.btn_favorite').hasClass('active')){
					$(this).hide();
				}

			});
		}
	});
	});

	function searchvideo() {
		var input, filter, table, tr, td, i, txtValue, inc;
		input = document.getElementById("searchinput");
		filter = input.value.toUpperCase();
		table = document.getElementById("video_container");
		tr = document.getElementsByClassName("video_col");
		inc = 1;
		for (i = 1; i < tr.length; i++) {
			td = tr[i];
			if (td) {
			txtValue = td.textContent || td.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "block";
				inc++;
				
			} else {
				tr[i].style.display = "none";
			}
			}       
		}
		document.getElementById("search_count").textContent=inc;
		}
</script>
    <!-- //Section Accounts End -->
@endsection