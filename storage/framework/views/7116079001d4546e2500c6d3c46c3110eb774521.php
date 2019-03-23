<?php $__env->startSection('title', '无权限访问'); ?>

<?php $__env->startSection('content'); ?>
  <div class="col-md-4 offset-md-4">
    <div class="card ">
      <div class="card-body">
        <?php if(Auth::check()): ?>
          <div class="alert alert-danger text-center mb-0">
            当前登录账号无后台访问权限。
          </div>
        <?php else: ?>
          <div class="alert alert-danger text-center">
            请登录以后再操作
          </div>

          <a class="btn btn-lg btn-primary btn-block" href="<?php echo e(route('login')); ?>">
            <i class="fas fa-sign-in-alt"></i>
            登 录
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>