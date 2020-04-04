@extends('layouts.app')

@section('content')
<!-- Section Accounts Start -->
<section class="bg-trans">
		<div class="container">
            
			<div class="row">
				
				<div class="col-md-12">
					<div class="watch-video">
                        <p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> <a href="{{route('view_gym', ['gym_id'=>$data -> gym_id])}}">{{$data -> Gym->gym_name}}</a>  <i class="fas fa-angle-right"></i>  {{Str::limit($data -> video_title, 50)}}</p>
						<h2 class="page-sub-title">{{ $data->video_title }}</h2>
						@if($data->playlist != null)
						<p><a href="{{route('student_playlist', ['id'=>$data->playlist->id])}}">{{$data->playlist->name}}</a></p>
						@endif
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
										<span class="text-primary text-uppercase">{{ $row }}</span> @if($loop->iteration < count(explode(',',$data -> tag))),@endif
										@endforeach	
									</p>
								</div>
								<div class="comments-box">
									<hr />
									<h4>Add comment</h4>
									<form method="post" class="comment_form" action="{{ route('Comemnt') }}">
										@csrf
										<div class="form-group">
											<textarea class="form-control comment-body" name="body"></textarea>
											<input type="hidden" name="video_id" value="{{ $data->id }}" />
										</div>
										<div class="form-group justify-content-end">
											<input type="submit" class="btn btn-primary" value="Add Comment" />
										</div>
									</form>
									<hr />
									<h4>Display Comments</h4>
									<div class="comment-content">
										@include('CommentsDisplay', ['comments' => $data->comments, 'video_id' => $data->id, 'one_reply'=>false])
									</div>
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

		//ajax for main comment form
		$('.comment_form').on('submit',function(event){
			event.preventDefault();
			var container = $(this);
			var body = $(this).find('textarea.comment-body').val();
			var video_id = $(this).find('input[name="video_id"]').val();

			if (!body)
			{
				return;
			}

			var data = {
				"_token": "{{ csrf_token() }}",
				video_id:video_id,
				body:body,
			};

			$.ajax({
			url: "{{ route('Comemnt') }}",
			type:"POST",
			data:data,
			success:function(response){
				//console.log(response);
				var conent = "<div class='display-comment'><div class='parent-comment comment-box'><img src='"+response.user_avatar+"'/><p class='mb-0'><strong>"+response.first_name+' '+response.last_name+"</strong><span class='day_ago'>"+response.diff+"</span></p><p>"+response.body+"</p></div><a href='#' class='display_reply_form'>Reply</a><div class='reply_comment'></div><form class='reply_form' style='display:none;' action=''><div class='form-group'><input type='text' name='body' class='form-control' /><input type='hidden' name='video_id' value='"+response.video_id+"' /><input type='hidden' name='parent_id' value='"+response.id+"' /></div><div class='form-group justify-content-end'><a href='#' class='hide_reply_form btn btn-secondary mr-3' >Cancel</a><input type='submit' class='btn btn-warning' value='Reply' /></div></form></div>";
				container.parent().children('.comment-content').append(conent);
				$('.display_reply_form').click(function(e){
					e.preventDefault();
					$(this).parent().find('.reply_form').show();
					$(this).hide();
				});
				$('.hide_reply_form').click(function(e){
					e.preventDefault();
					$(this).parent().parent('.reply_form').hide();
					$(this).parent().parent().parent().find('.display_reply_form').show();
				});
				$('.reply_form').on('submit',function(event){
					event.preventDefault();
					var ele = $(this);
					var body = ele.find('input[name="body"]').val();
					var video_id = ele.find('input[name="video_id"]').val();
					var parent_id;
					if(ele.find('input[name="parent_id"]'))
					{
						var parent_id =	ele.find('input[name="parent_id"]').val();
					}

					if (!body)
					{
						return;
					}

					var data = {
						"_token": "{{ csrf_token() }}",
						video_id:video_id,
						parent_id:parent_id,
						body:body,
					};

					$.ajax({
					url: "{{ route('Comemnt') }}",
					type:"POST",
					data:data,
					success:function(response){
						var conent_reply = "<div class='display-comment' style='margin-left:40px;'><div class='parent-comment comment-box'><img src='"+response.user_avatar+"'/><p class='mb-0'><strong>"+response.first_name+' '+response.last_name+"</strong><span class='day_ago'>"+response.diff+"</span></p><p>"+response.body+"</p></div></div>"
						ele.parent().find('.reply_comment').append(conent_reply);
						ele.parent().find('.display_reply_form').show();
						ele.hide();
						$('input[name="body"]').val('');
					},
					});
				});
				$('textarea[name="body"]').val('');
				$('textarea[name="body"]').text('');
			},
			});
		});
		
		//ajax for reply form
		$('.reply_form').on('submit',function(event){
			event.preventDefault();
			var ele = $(this);
			var body = ele.find('input[name="body"]').val();
			var video_id = ele.find('input[name="video_id"]').val();
			var parent_id;
			if(ele.find('input[name="parent_id"]'))
			{
				var parent_id =	ele.find('input[name="parent_id"]').val();
			}

			if (!body)
			{
				return;
			}

			var data = {
				"_token": "{{ csrf_token() }}",
				video_id:video_id,
				parent_id:parent_id,
				body:body,
			};

			$.ajax({
			url: "{{ route('Comemnt') }}",
			type:"POST",
			data:data,
			success:function(response){
				var conent = "<div class='display-comment' style='margin-left:40px;'><div class='parent-comment comment-box'><img src='"+response.user_avatar+"'/><p class='mb-0'><strong>"+response.first_name+' '+response.last_name+"</strong><span class='day_ago'>"+response.diff+"</span></p><p>"+response.body+"</p></div></div>"
				ele.parent().find('.reply_comment').append(conent);
				ele.parent().find('.display_reply_form').show();
				ele.hide();
				$('input[name="body"]').val('');
			},
			});
		});
    });
    </script>
    <!-- //Section Accounts End -->
@endsection