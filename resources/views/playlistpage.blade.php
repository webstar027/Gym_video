@extends('layouts.app')

@section('content')
	<!-- Section Accounts Start -->
	<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="view-playlist">
                        <p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> Playlist</p>
                        <h2 class="page-sub-title">{{ $data->gym_name }} Playlists</h2>
						
						<div class="row align-items-center">
							<div class="col-md-4"><input type="search" onkeyup="searchplaylist()" class="form-control" placeholder="Search by Title, Description, Playlist or #Tag" id="searchplaylist"></div>
						</div>
                        <h3 class="page-sub-title-alt mt-3">Search Results</h3>
						<p><span id="search_palylist_count">{{ $data->playlists->count() }}</span> Playlist(s) have matched your search criteria.</p>
						<div class="playlist_container" id="playlist_container">
							<div class="row playlist_row">
								@foreach($data->playlists as $key => $playlist)
								
								<div class="col-md-6 col-lg-4 playlist_col">
									<div class="playlist-box">
										<h3 class="paylist_name"><a href="{{ route('student_playlist', ['id'=>$playlist->id]) }}">{{ $playlist->name }}</a></h3>
										<p class="paylist_count" style="margin-bottom:0; height:25px;">
											<span id="playlist_count">{{ $playlist->videos->count() }}</span> video(s) in this Playlist
										</p>
										<div class="row align-items-center">
											<div class="col-9"><p class="mb-0">Last Updates: {{ $playlist->updated_at }}</p></div>
										</div>
										<div class="embed-responsive embed-responsive-16by9">
											<a href="#"><img class="embed-responsive-item" data-url="{{ $playlist->thumbnail }}" src=""/></a>
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

	});

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