<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Topic /
          <?php if($topic->id): ?>
            编辑话题
          <?php else: ?>
            新建话题
          <?php endif; ?>
        </h1>
      </div>

      <div class="card-body">
        <?php if($topic->id): ?>
          <form action="<?php echo e(route('topics.update', $topic->id)); ?>" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        <?php else: ?>
          <form action="<?php echo e(route('topics.store')); ?>" method="POST" accept-charset="UTF-8">
        <?php endif; ?>

          <?php echo $__env->make('shared._error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="<?php echo e(old('title', $topic->title )); ?>" />
                </div>
                <div class="form-group">
                    <select name="category_id" id="" class="form-control" required>
                        <option value="" disabled selected hidden>请选择分类</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                	<label for="body-field">Body</label>
                	<textarea name="body" id="editor" class="form-control" rows="6" placeholder="请填入至少三个字符">
                        <?php echo e(old('body', $topic->body )); ?>

                    </textarea>
                </div> 
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-save mr-2" aria-hidden="true"></i>保存
                    </button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/simditor.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/module.js')); ?>"></script>
    <script src="<?php echo e(asset('js/hotkeys.js')); ?>"></script>
    <script src="<?php echo e(asset('js/uploader.js')); ?>"></script>
    <script src="<?php echo e(asset('js/simditor.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea:$('#editor'),
            });
        });
    </script>
<?php $__env->stopSection(); ?>



















<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>