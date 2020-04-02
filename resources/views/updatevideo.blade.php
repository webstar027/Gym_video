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
                        <form method="POST" action="{{ url('/account/gymowner/updatevideo/'.$id) }}">
                            {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" name="gym_id" value="{{ $id }}">
                            <input type="hidden" name="gym_id" value="{{ $gym_id }}">
                                 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="url" class="form-control" name="video_url" value="{{ $video_url }}" disabled placeholder="YouTube Video link" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="" type="button" disabled id="retrieve" class="btn my-btn disabled" aria-disabled="true">Retrieve Info</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="video_title" class="form-control" maxlength="100" value="{{ $video_title }}" placeholder="Video Title" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" cols="30" maxlength="250" rows="5"  placeholder="Video Description">{{ $description }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag" maxlength="100"  value="{{ $tag }}" placeholder="Enter individual tags separated by a comma (,)">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control playlist" data-path="{{ route('Autocomplete') }}" data-provide="typeahead" name="playlist" maxlength="300" placeholder="Playlist">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="status" value="1" @if($status == 1) checked @endif class="custom-control-input" id="customCheck1">
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
            // $('#customCheck1').on('change', function(){
            // this.value = this.checked ? 1 : 0;
            //  //alert(this.value);
            // }).change();

            var path = $('.playlist').attr('data-path');
            // $('.playlist').typeahead({
            //     source:  function (query, process) {
            //     return $.get(path, { query: $(this).val()}, function(data) {
            //             return process(data);
            //         });
            //     }
            // });
            $('.playlist').typeahead({
                    source: [
                        {id: 1, name: 'Toronto'},
                        {id: 2, name: 'Montreal'},
                        {id: 3, name: 'New York'},
                        {id: 4, name: 'Buffalo'},
                        {id: 5, name: 'Boston'},
                        {id: 6, name: 'Columbus'},
                        {id: 7, name: 'Dallas'},
                        {id: 8, name: 'Vancouver'},
                        {id: 9, name: 'Seattle'},
                        {id: 10, name: 'Los Angeles'}
                    ],
                });
        });
    </script>
    <!-- //Section Accounts End -->
@endsection