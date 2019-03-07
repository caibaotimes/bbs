<?php if(count($topics)): ?>
    <ul class="list-unstyled">
        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="media">
                <div class="media-left">
                    <a href="<?php echo e(route('users.show', [$topic->user_id])); ?>">
                        <img class="media-object img-thumbnail mr-3" style="width: 52px; height: 52px;" src="<?php echo e($topic->user->avatar); ?>" title="<?php echo e($topic->user->name); ?>">
                    </a>
                </div>

                <div class="media-body">

                    <div class="media-heading mt-0 mb-1">
                        <a href="<?php echo e(route('topics.show', [$topic->id])); ?>" title="<?php echo e($topic->title); ?>">
                            <?php echo e($topic->title); ?>

                        </a>
                        <a class="float-right" href="<?php echo e(route('topics.show', [$topic->id])); ?>">
                            <span class="badge badge-secondary badge-pill"> <?php echo e($topic->reply_count); ?> </span>
                        </a>
                    </div>

                    <small class="media-body meta text-secondary">

                        <a class="text-secondary" href="<?php echo e(route('categories.show',$topic->category_id)); ?>" title="<?php echo e($topic->category->name); ?>">
                            <i class="far fa-folder"></i>
                            <?php echo e($topic->category->name); ?>

                        </a>

                        <span> • </span>
                        <a class="text-secondary" href="<?php echo e(route('users.show', [$topic->user_id])); ?>" title="<?php echo e($topic->user->name); ?>">
                            <i class="far fa-user"></i>
                            <?php echo e($topic->user->name); ?>

                        </a>
                        <span> • </span>
                        <i class="far fa-clock"></i>
                        <span class="timeago" title="最后活跃于：<?php echo e($topic->updated_at); ?>"><?php echo e($topic->updated_at->diffForHumans()); ?></span>
                    </small>

                </div>
            </li>

            <?php if( ! $loop->last): ?>
                <hr>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php else: ?>
    <div class="empty-block">暂无数据 ~_~ </div>
<?php endif; ?>