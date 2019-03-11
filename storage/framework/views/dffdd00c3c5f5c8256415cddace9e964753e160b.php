<?php if(count($replies)): ?>

    <ul class="list-group mt-4 border-0">
        <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 <?php if($loop->first): ?> border-top-0 <?php endif; ?>">
                <a href="<?php echo e($reply->topic->link(['#reply' . $reply->id])); ?>">
                    <?php echo e($reply->topic->title); ?>

                </a>

                <div class="reply-content text-secondary mt-2 mb-2">
                    <?php echo $reply->content; ?>

                </div>

                <div class="text-secondary" style="font-size:0.9em;">
                    <i class="far fa-clock"></i> 回复于 <?php echo e($reply->created_at->diffForHumans()); ?>

                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php else: ?>
    <div class="empty-block">暂无数据 ~_~ </div>
<?php endif; ?>


<div class="mt-4 pt-1">
    <?php echo $replies->appends(Request::except('page'))->render(); ?>

</div>