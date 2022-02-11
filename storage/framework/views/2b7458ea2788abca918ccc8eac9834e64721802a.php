<link rel="stylesheet" href="<?php echo e(asset('css/comments.css')); ?>">

<div class="display-comment">

    <?php if($comment->user_id == null ): ?>
        <div class="row" style="margin-bottom: 2em">
            <div class="col-1">
                <img src="<?php echo e(Storage::disk('s3')->url("user.png")); ?>" class="userAvatarComment">
            </div>

            <div class="col-3 text-left deletedComment">
                <div><i class="far fa-trash-alt"></i> <?php echo e($comment->comment); ?></div>
            </div>
        </div>
    <?php else: ?>
        <?php $avatar = $comment->user->avatar; ?>

        <img src="<?php echo e(Storage::disk('s3')->url($avatar)); ?>" class="userAvatarComment">
        <strong class="commentUser"><?php echo e($comment->user->name); ?></strong> <?php echo e($comment->created_at->diffForHumans()); ?>

        <p class="commentContent"><?php echo e($comment->comment); ?></p>
        <a href="" id="reply"></a>

        <?php if((Auth::id()!=null)): ?>
            <div class="row">
                <div class="replyButton">
                    <?php echo '<a class="" type="button" data-toggle="collapse" data-target="#reply'. $comment->id.'">';?>
                    <i class="fas fa-reply"></i> Responder
                    </a>
                </div>
                
                <?php if((Auth::id() == $comment->user_id)): ?>
                    <div style="margin-left: 2em">
                        <form action="<?php echo e(route('comment.delete', $comment->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="botaoApagar" type="submit"><i class="fas fa-times"></i> Apagar</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div>
        <?php echo '<div class="collapse" id="reply'. $comment->id.'">'; ?>
        <form method="post" action="<?php echo e(route('reply.add')); ?>" class="replyForm">
            <?php echo csrf_field(); ?>
    
            <div class="form-group row">
                <?php if(Auth::user()!=null): ?>
                    <?php  $avatar = Auth::user()->avatar; ?>
                
                
                    <div class="col-1">
                        <img src="<?php echo e(Storage::disk('s3')->url($avatar)); ?>" class="userAvatarComment">
                    </div>
                
                    <div class="col">
                        <textarea type="text" name="comment" class="form-control replie-comment" cols="1" rows="5" placeholder="Responder..."required></textarea>
                        <div class="caixa-emoji">
                            <button type="button" class="botao-emoji rep-emoji">&#128512; Emojis</button>
                         </div>

                        <input type="hidden" name="aula_id" value="<?php echo e($aula->id); ?>" />
                        <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>" />
                        <div class="form-group"> <br>
                            <input type="hidden" class="btn btn-sm btn-outline-danger py-0" />
                            <button type="submit" class="btn botaoComment" style="font-size: 0.8em;"> <i class="fas fa-comments"></i> Comentar
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    
        </form>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/posts/comments.blade.php ENDPATH**/ ?>