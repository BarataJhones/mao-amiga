<link rel="stylesheet" href="{{asset('css/comments.css')}}">

<div class="replies">
    <?php 
        $avatar = $replie->user->avatar;
    ?>

    <img src="{{ url("storage/$avatar") }}" class="userAvatarComment">

    <strong class="commentUser">{{ $replie->user->name }}</strong> {{ $replie->created_at->format('d/M/Y - H:i:s' ) }}

    <p class="commentContent">{{ $replie->comment }}</p>

    <a href="" id="reply"></a>
</div>