<li class="media <?php if( ! $loop->last): ?> border-bottom <?php endif; ?>">
    <div class="media-left">
        <a href="<?php echo e(route('users.show', $notification->data['user_id'])); ?>">
            <img class="media-object img-thumbnail mr-3" alt="<?php echo e($notification->data['user_name']); ?>" src="<?php echo e($notification->data['user_avatar']); ?>" style="width:48px;height:48px;" />
        </a>
    </div>

    <div class="media-body">
        <div class="media-heading mt-0 mb-1 text-secondary">
            <a href="<?php echo e(route('users.show', $notification->data['user_id'])); ?>"><?php echo e($notification->data['user_name']); ?></a>
            评论了
            <a href="<?php echo e($notification->data['topic_link']); ?>"><?php echo e($notification->data['topic_title']); ?></a>

            
            <span class="meta float-right" title="<?php echo e($notification->created_at); ?>">
        <i class="far fa-clock"></i>
                <?php echo e($notification->created_at->diffForHumans()); ?>

      </span>
        </div>
        <div class="reply-content">
            <?php echo $notification->data['reply_content']; ?>

        </div>
    </div>
</li>