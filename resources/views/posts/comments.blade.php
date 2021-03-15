<link rel="stylesheet" href="{{asset('css/comments.css')}}">

<div class="display-comment">
    <?php $avatar = $comment->user->avatar; ?>

    <img src="{{ url("storage/$avatar") }}" class="userAvatarComment">
    <strong class="commentUser">{{ $comment->user->name }}</strong> {{ $comment->created_at->diffForHumans() }}
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

        <div class="form-group row">
            @if (Auth::user()!=null)
                <?php  $avatar = Auth::user()->avatar; ?>
            @endif
            
            <div class="col-1">
                <img src="{{ url("storage/$avatar") }}" class="userAvatarComment">
            </div>

            <div class="col">
                <textarea type="text" name="comment" class="form-control" cols="1" rows="5" placeholder="Responder..." required></textarea>
                <input type="hidden" name="aula_id" value="{{ $aula->id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                <div class="form-group"> <br>
                    <input type="hidden" class="btn btn-sm btn-outline-danger py-0" />
                    <button type="submit" class="btn botaoComment" style="font-size: 0.8em;">Responder
                </div>
            </div>
        </div>

    </form>
</div>