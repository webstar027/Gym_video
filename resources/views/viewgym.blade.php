@extends('layouts.app')

@section('content')
	<!-- Section Accounts Start -->
	<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<nav class="nav nav-pills">
						<a class="nav-link rounded-0 border border-primary px-5 active" id="playlist_tab" data-toggle="pill" href="#playlist" role="tab" aria-controls="playlist" aria-selected="true">Playlists</a>
                        <a class="nav-link rounded-0 border border-primary px-5" id="view_gym_tab" data-toggle="pill" href="#view_gym" role="tab" aria-controls="view_gym">Videos</a>
					</nav>
					<div class="tab-content pt-2 pl-1" id="pills-tabContent">
						<div class="view-playlist tab-pane fade pt-3 active show" id="playlist" role="tabpanel" aria-labelledby="playlist_tab">
							<p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> <a href="{{ route('view_gym', ['gym_id'=>$data->id]) }}">{{ $data->gym_name }}</a> <i class="fas fa-angle-right"></i> Playlists</p>
							<h3 class="page-sub-title">{{ $data->gym_name }} Playlists</h3>
							
							<div class="row align-items-center">
								<div class="col-md-4"><input type="search" onkeyup="searchplaylist()" class="form-control" placeholder="Search by Title, Description, Playlist or Tag" id="searchplaylist"></div>
							</div>
							<h3 class="page-sub-title-alt mt-3">Search Results</h3>
							<p><span id="search_palylist_count">{{ $data->playlists->count() }}</span> Playlist(s) have matched your search criteria.</p>
							<div class="playlist_container" id="playlist_container">
								<div class="row playlist_row">
									@foreach($data->playlists as $key => $playlist)
									
									<div class="col-md-6 col-lg-4 playlist_col">
										<div class="playlist-box video-box">
											<h3 class="paylist_name"><a href="{{ route('student_playlist', ['id'=>$playlist->id]) }}">{{ $playlist->name }}</a></h3>
											<p class="paylist_count" style="margin-bottom:0; height:25px;">
												<span id="playlist_count">{{ $playlist->videos->count() }}</span> video(s) in this Playlist
											</p>
											<div class="row align-items-center">
												<div class="col-9"><p class="mb-0">Uploaded: {{ $playlist->updated_at->format('m/d/Y g:iA') }}</p></div>
											</div>
											<div class="embed-responsive embed-responsive-16by9">
												<a href="{{ route('student_playlist', ['id'=>$playlist->id]) }}"><img class="embed-responsive-item" data-url="{{ $playlist->thumbnail }}" src=""/></a>
											</div>
										</div>
									</div>
									@if($loop->iteration%3 == 0 )
									<!-- </div>
									<div class="row"> -->
									@endif
									@endforeach
								</div>
								@if($data->playlists_total > 6)
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
									@if($data->playlists_current == 1)
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage=1'}}"  tabindex="-1" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
										</li>
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current - 1)}}"  tabindex="-1" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
										</li>
										<li class="page-item disabled"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.$data->playlists_current}}">{{$data->playlists_current }}</a></li>
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current + 1)}}">{{$data->playlists_current + 1}}</a></li>
										@if(ceil($data->playlists_total/6) > 2)
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current + 2)}}">{{$data->playlists_current + 2}}</a></li>
										@endif
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current + 1)}}" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.(ceil($data->playlists_total/6))}}" aria-label="End">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">End</span>
										</a>
										</li>
									@elseif($data->playlists_current == ceil($data->playlists_total/6))
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage=1'}}"  tabindex="-1" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current - 1)}}"  tabindex="-1" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
										</li>
										@if(ceil($data->playlists_total/6) > 2)
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current - 2)}}">{{$data->playlists_current - 2}}</a></li>
										@endif
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current - 1)}}">{{$data->playlists_current - 1}}</a></li>
										<li class="page-item disabled"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.$data->playlists_current}}">{{$data->playlists_current}}</a></li>
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current + 1)}}" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.(ceil($data->playlists_total/3))}}" aria-label="End">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">End</span>
										</a>
										</li>
									@elseif($data->playlists_current > 1 and ceil($data->playlists_total/6))
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage=1'}}"  tabindex="-1" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current - 1)}}"  tabindex="-1" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
										</li>
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current - 1)}}">{{$data->playlists_current - 1}}</a></li>
										<li class="page-item disabled"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.$data->playlists_current}}">{{$data->playlists_current}}</a></li>
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current + 1)}}">{{$data->playlists_current + 1}}</a></li>
										<li class="page-item ">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.($data->playlists_current + 1)}}" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?ppage='.(ceil($data->playlists_total/6))}}" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
									@else
									@endif
									</ul>
								</nav>
								@endif
							</div>
						</div>
						<div class="view-gym-user tab-pane fade pt-3" id="view_gym" role="tabpanel" aria-labelledby="view_gym_tab">
							<p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> <a href="{{ route('view_gym', ['gym_id'=>$data->id]) }}">{{ $data->gym_name }}</a> <i class="fas fa-angle-right"></i> Videos</p>
							<h2 class="page-sub-title">{{ $data->gym_name }}</h2> 
							<div class="row align-items-center">
								<div class="col-md-4"><input type="search" onkeyup="searchvideo()" class="form-control" placeholder="Search by Title, Description, Playlist or Tag" id="searchinput"></div>
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
											<h3><a href="{{ route('student_watch', ['id'=>$video -> id]) }}">{{ Str::limit($video -> video_title, 30)}}</a></h3>
											<p style="margin-bottom:0; height:25px;">
												@if($video->playlist !=null)
												<a href="{{route('student_playlist', ['id'=>$video->playlist->id])}}">{{ $video->playlist->name }}</a>
												@endif
											</p>
											<div class="row align-items-center">
												<div class="col-9"><p class="mb-0">Uploaded: {{ $video -> created_at->format('m/d/Y g:iA')}}</p></div>
												<div class="col-3 text-right"><a href="#" data-videoid="{{ $video->id }}" class="btn_favorite @if($video -> favorite == true) active @else unactive @endif"><i class="fas fa-heart"></i><i class="far fa-heart"></i></a></div>
											</div>
											<div class="embed-responsive embed-responsive-16by9">
												<!-- <iframe class="embed-responsive-item" data-url="{{ $video -> video_url }}" src="" allowfullscreen></iframe> -->
												<a href="{{ route('student_watch', ['id'=>$video -> id]) }}"><img class="embed-responsive-item" data-url="{{ $video -> video_url }}" src=""/></a>
											</div>
											<p class="video_grid_content">
												<span class="video-sub-description">{{ Str::limit($video -> description, 80)}}</span>
												<span class="video-description" style="display:none">{{ $video -> description }}</span>
												<a href="#">read more...</a>
											</p>
											<p class="video_tag">TAGS: 
												@foreach(explode(',',Str::limit($video -> tag, 50)) as $row)
												<span class="text-primary text-uppercase">{{ $row }}</span> @if($loop->iteration < count(explode(',',Str::limit($video -> tag, 50)))),@endif
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
								@if($data->total_video > 6)
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
									@if($data->currentpage == 1)
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page=1'}}"  tabindex="-1" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
										</li>
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage - 1)}}"  tabindex="-1" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
										</li>
										<li class="page-item disabled"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.$data->currentpage}}">{{$data->currentpage }}</a></li>
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage + 1)}}">{{$data->currentpage + 1}}</a></li>
										@if(ceil($data->total_video/6) > 2)
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage + 2)}}">{{$data->currentpage + 2}}</a></li>
										@endif
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage + 1)}}" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.(ceil($data->total_video/6))}}" aria-label="End">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">End</span>
										</a>
										</li>
									@elseif($data->currentpage == ceil($data->total_video/6))
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page=1'}}"  tabindex="-1" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage - 1)}}"  tabindex="-1" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
										</li>
										@if(ceil($data->total_video/6) > 2)
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage - 2)}}">{{$data->currentpage - 2}}</a></li>
										@endif
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage - 1)}}">{{$data->currentpage - 1}}</a></li>
										<li class="page-item disabled"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.$data->currentpage}}">{{$data->currentpage}}</a></li>
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage + 1)}}" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
										<li class="page-item disabled">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.(ceil($data->total_video/3))}}" aria-label="End">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">End</span>
										</a>
										</li>
									@elseif($data->currentpage > 1 and ceil($data->total_video/6))
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page=1'}}"  tabindex="-1" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage - 1)}}"  tabindex="-1" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
										</li>
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage - 1)}}">{{$data->currentpage - 1}}</a></li>
										<li class="page-item disabled"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.$data->currentpage}}">{{$data->currentpage}}</a></li>
										<li class="page-item"><a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage + 1)}}">{{$data->currentpage + 1}}</a></li>
										<li class="page-item ">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.($data->currentpage + 1)}}" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
										<li class="page-item">
										<a class="page-link" href="{{route('view_gym', ['gym_id'=>$data->id]).'?page='.(ceil($data->total_video/6))}}" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										</a>
										</li>
									@else
									@endif
									</ul>
								</nav>
								@endif
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
			$(this).attr('src','https://img.youtube.com/vi/'+getId(src)+'/hqdefault.jpg');
		});
		
		//ajax favorite
		$(".btn_favorite").click(function(e){
			var active = $(this);
			e.preventDefault();
			var video_id = $(this).attr('data-videoid');

			$.ajax({
				type:'GET',
				url: "/account/favorite/video/" + video_id,
				success : function(ret, status){
					if (ret=="1"){
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

	//video search
	function searchvideo() {
		var input, filter, table, tr, td, i, txtValue, inc;
		input = document.getElementById("searchinput");
		filter = input.value.toUpperCase();
		table = document.getElementById("video_container");
		tr = document.getElementsByClassName("video_col");
		inc = 0;
		for (i = 0; i < tr.length; i++) {
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

	//Playlist search
	function searchplaylist() {
		var input, filter, table, tr, td, i, txtValue, inc;
		input = document.getElementById("searchplaylist");
		filter = input.value.toUpperCase();
		table = document.getElementById("playlist_container");
		tr = document.getElementsByClassName("playlist_col");
		inc = 0;
		for (i = 0; i < tr.length; i++) {
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
		document.getElementById("search_palylist_count").textContent=inc;
	}
</script>
    <!-- //Section Accounts End -->
@endsection