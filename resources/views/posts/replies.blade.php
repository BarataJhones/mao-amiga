<link rel="stylesheet" href="{{asset('css/comments.css')}}">

<div class="replies">

    @if ($replie->user_id == null )
        <div class="row" style="margin-bottom: 2em">
            <div class="col-1">
                <img src="{{ url("storage/user.png") }}" class="userAvatarComment">
            </div>

            <div class="col-3 text-left deletedComment">
                <div><i class="far fa-trash-alt"></i> {{ $replie->comment }}</div>
            </div>
        </div>
    @else

        <?php $avatar = $replie->user->avatar; ?>

        <img src="{{ Storage::disk('s3')->url($avatar) }}" class="userAvatarComment">
        <strong class="commentUser">{{ $replie->user->name }}</strong> {{ $replie->created_at->diffForHumans() }} respondeu
        <p class="commentContent">{{ $replie->comment }}</p>

        @if ((Auth::id()!=null))
            @if ((Auth::id() == $replie->user_id))
                <div style="margin-left: 2em; margin-bottom: .8em">
                    <form action="{{ route('comment.delete', $replie->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="botaoApagar" type="submit" style="margin-left: 2em"><i class="fas fa-times"></i> Apagar</button>
                    </form>
                </div>
            @endif
        @endif

    @endif

</div>