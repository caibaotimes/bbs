<?php if(count($topics)): ?>
    <ul class="list-group mt-4 border-0">
        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 <?php if($loop->first): ?> border-top-0 <?php endif; ?>">
                <a href="<?php echo e(route('topics.show',$topic->id)); ?>">
                    <?php echo e($topic->title); ?>

                </a>
                <span class="meta float-right text-secondary">
                    <?php echo e($topic->reply_count); ?>回复
                    <span> ⋅ </span>
                    <?php echo e($topic->created_at->diffForHumans()); ?>

                </span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <div class="empty-block">暂无数据</div>
<?php endif; ?>

<div class="mt-4 pt-1">
    <?php echo $topics->render(); ?>}
</div>









