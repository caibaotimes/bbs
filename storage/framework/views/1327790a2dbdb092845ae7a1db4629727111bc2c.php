<div class="card ">
    <div class="card-body">
        <a href="<?php echo e(route('topics.create')); ?>" class="btn btn-success btn-block" aria-label="Left Align">
            <i class="fas fa-pencil-alt mr-2"></i>  新建帖子
        </a>
    </div>
</div>

<?php if(count($active_users)): ?>
  <div class="card mt-4">
    <div class="card-body active-users pt-2">
      <div class="text-center mt-1 mb-0 text-muted">活跃用户</div>
      <hr class="mt-2">
      <?php $__currentLoopData = $active_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $active_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="media mt-2" href="<?php echo e(route('users.show', $active_user->id)); ?>">
          <div class="media-left media-middle mr-2 ml-1">
            <img src="<?php echo e($active_user->avatar); ?>" width="24px" height="24px" class="media-object">
          </div>
          <div class="media-body">
            <small class="media-heading text-secondary"><?php echo e($active_user->name); ?></small>
          </div>
        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php endif; ?>