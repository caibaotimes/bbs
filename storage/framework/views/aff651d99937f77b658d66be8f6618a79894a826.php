<?php echo $__env->make('shared._error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="reply-box">
    <form action="<?php echo e(route('replies.store')); ?>" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>">
        <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="分享你的见解~" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 回复</button>
    </form>
</div>
<hr>