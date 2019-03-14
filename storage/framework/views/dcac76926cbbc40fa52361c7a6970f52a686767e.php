<ul class="list-unstyled">
    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class=" media" name="reply<?php echo e($reply->id); ?>" id="reply<?php echo e($reply->id); ?>">
            <div class="media-left">
                <a href="<?php echo e(route('users.show', [$reply->user_id])); ?>">
                    <img class="media-object img-thumbnail mr-3" alt="<?php echo e($reply->user->name); ?>" src="<?php echo e($reply->user->avatar); ?>" style="width:48px;height:48px;" />
                </a>
            </div>

            <div class="media-body">
                <div class="media-heading mt-0 mb-1 text-secondary">
                    <a href="<?php echo e(route('users.show', [$reply->user_id])); ?>" title="<?php echo e($reply->user->name); ?>">
                        <?php echo e($reply->user->name); ?>

                    </a>
                    <span class="text-secondary"> • </span>
                    <span class="meta text-secondary" title="<?php echo e($reply->created_at); ?>"><?php echo e($reply->created_at->diffForHumans()); ?></span>

                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy',$reply)): ?>
                    <span class="meta float-right ">
                        <form action="<?php echo e(route('replies.destroy', $reply->id)); ?>"
                              onsubmit="return confirm('确定要删除此评论？');"
                              method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
                            <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </span>
                    <?php endif; ?>
                </div>
                <div class="reply-content text-secondary">
                    <?php echo $reply->content; ?>

                </div>
            </div>
        </li>

        <?php if( ! $loop->last): ?>
            <hr>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>