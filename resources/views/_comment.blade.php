<div class="comment-box">
    <div class="body">{{$comment->body}} – {{$comment->user->name}} <span class="time">{{$comment->created_at->format('H:i')}}</span></div>
</div>

<style>
    .comment-box {
        margin-left: 40px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e9e9e9;
    }
    .comment-box > .body {
        margin-left: 40px;
    }
    .comment-box > .time {
        color: #757575;
    }
</style>