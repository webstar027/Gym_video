@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="parent-comment comment-box">
            <img src='{{ $comment->avatar }}'/>
            <p class="mb-0"><strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong><span class="day_ago">{{ $comment->created_at->diffForHumans() }}</span></p>
            <p>{{ $comment->body }}</p>
        </div>
        @if($comment->parent_id == null)
        <a href="#" class="display_reply_form">Reply</a>
        @endif
        @if(!$one_reply)

            @include('CommentsDisplay', ['comments' => $comment->replies, 'one_reply' => true])
        <a href="" id="reply"></a>
        <form method="post" class="reply_form" style="display:none;" action="{{ route('Comemnt') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="video_id" value="{{ $video_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group justify-content-end">
                <a href="#" class="hide_reply_form btn btn-secondary mr-3" >Cancel</a><input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        
        @endif
    </div>
@endforeach