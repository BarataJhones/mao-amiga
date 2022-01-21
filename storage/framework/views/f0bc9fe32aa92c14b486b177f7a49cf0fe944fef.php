<div class="display-comment">
    <strong><?php echo e($comment->user->name); ?></strong>
    <p><?php echo e($comment->comment); ?></p>
    <a href="" id="reply"></a>
    <form method="post" action="<?php echo e(route('reply.add')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="aula_id" value="<?php echo e($aula->id); ?>" />
            <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
    <?php echo $__env->make('posts.replies', ['comments' => $comment->replies], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/posts/replys.blade.php ENDPATH**/ ?>