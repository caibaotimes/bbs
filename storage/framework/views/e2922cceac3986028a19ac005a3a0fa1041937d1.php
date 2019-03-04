
<?php $__env->startSection('title','首页'); ?>

<?php $__env->startSection('content'); ?>
	<h1>这里是首页</h1>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>