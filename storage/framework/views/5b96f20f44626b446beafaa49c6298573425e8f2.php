<link rel="stylesheet" href="<?php echo e(asset('css/comments.css')); ?>">

<div class="replies">

    <?php if($replie->user_id == null ): ?>
        <div class="row" style="margin-bottom: 2em">
            <div class="col-1">
                <img src="<?php echo e(url("storage/user.png")); ?>" class="userAvatarComment">
            </div>

            <div class="col-3 text-left deletedComment">
                <div><i class="far fa-trash-alt"></i> <?php echo e($replie->comment); ?></div>
            </div>
        </div>
    <?php else: ?>

        <?php $avatar = $replie->user->avatar; ?>

        <img src="<?php echo e(Storage::disk('s3')->url($avatar)); ?>" class="userAvatarComment">
        <strong class="commentUser"><?php echo e($replie->user->name); ?></strong> <?php echo e($replie->created_at->diffForHumans()); ?> respondeu
        <p class="commentContent"><?php echo e($replie->comment); ?></p>

        <?php if((Auth::id()!=null)): ?>
            <?php if((Auth::id() == $replie->user_id)): ?>
                <div style="margin-left: 2em; margin-bottom: .8em">
                    <form action="<?php echo e(route('comment.delete', $replie->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="botaoApagar" type="submit" style="margin-left: 2em"><i class="fas fa-times"></i> Apagar</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>

</div><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/posts/replies.blade.php ENDPATH**/ ?>