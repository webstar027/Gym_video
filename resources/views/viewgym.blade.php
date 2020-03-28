@extends('layouts.app')

@section('content')
	<!-- Section Accounts Start -->
	<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="view-gym-user">
                        <p><a href="{{ url('/account/student') }}">My Account</a> <i class="fas fa-angle-right"></i> {{ $data -> owner_name }}</p>
                        <h2 class="page-sub-title">{{ $data -> owner_name }}</h2>
						
						<div class="row align-items-center">
							<div class="col-md-4"><input type="search" onkeyup="searchvideo()" class="form-control" placeholder="Gym Name or Owner name" id="searchinput"></div>
							<div class="col-md-8">
								<p class="mb-0"><a href="#" class="favorit_button"><i class="fas fa-heart"></i></a> Display only favorites</p>
							</div>
						</div>
                        <h3 class="page-sub-title-alt mt-3">Search Results</h3>
						<p><span id="search_count">{{$data->videos->count()}}</span> Gym(s) have matched your search criteria</p>
						<div class="video_container" id="video_container">
							<div class="row video_row">
								@foreach($data->videos as $key => $video)
								
								<div class="col-md-6 col-lg-4 video_col">
									<div class="video-box">
										<h3>{{ $video -> video_title}}</h3>
										<div class="row align-items-center">
											<div class="col-9"><p class="mb-0">Uploaded: {{ $video -> created_at}}</p></div>
											<div class="col-3 text-right"><a href="#" class="favorit_button"><i class="fas fa-heart"></i></a></div>
										</div>
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" data_url="{{ $video -> video_url }}" src="" allowfullscreen></iframe>
										</div>
										<p class="video-description">{{ $video -> description }} <a href="">read more...</a> </p>
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
        var src = $('.embed-responsive-item').attr('data_url');
        $('.embed-responsive-item').attr('src','//www.youtube.com/embed/' + getId(src));
	});
	function searchvideo() {
		var input, filter, table, tr, td, i, txtValue, inc;
		input = document.getElementById("searchinput");
		filter = input.value.toUpperCase();
		table = document.getElementById("video_container");
		tr = document.getElementsByClassName("video_col");
		inc = 0;
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