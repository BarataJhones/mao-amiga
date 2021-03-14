<link rel="stylesheet" href="{{asset('css/comments.css')}}">

<div class="display-comment">
    <?php 
        $avatar = $comment->user->avatar;
    ?>

    <img src="{{ url("storage/$avatar") }}" class="userAvatarComment">

    <strong class="commentUser">{{ $comment->user->name }}</strong> {{ $comment->created_at->format('d/M/Y - H:i:s' ) }}

    <p class="commentContent">{{ $comment->comment }}</p>

    <a href="" id="reply"></a>

    @if ((Auth::id()!=null))
        <div class="replyButton">
            <?php echo '<a class="" type="button" data-toggle="collapse" data-target="#reply'. $comment->id.'">';?>
            <i class="fas fa-reply"></i> Responder
            </a>
        </div>
    @endif

    <?php echo '<div class="collapse" id="reply'. $comment->id.'">'; ?>

    <form method="post" action="{{ route('reply.add') }}" class="replyForm">
        @csrf
        <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Responder..."required></textarea>
            <input type="hidden" name="aula_id" value="{{ $aula->id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="hidden" class="btn btn-sm btn-outline-danger py-0"/>
            <button type="submit" class="btn botaoComment" style="font-size: 0.8em;">Responder
        </div>
    </form>
</div>

</div>