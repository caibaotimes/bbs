<?php $__env->startSection('title',isset($category) ? $category->name : "话题列表"); ?>

<?php $__env->startSection('content'); ?>
<div class="row md-5">
      <div class="col-lg-9 col-md-9 topic-list">
          <?php if(isset($category)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo e($category->name); ?> : <?php echo e($category->description); ?>

            </div>
          <?php endif; ?>
          <div class="card">
              <div class="card-header bg-transparent">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active">最后回复</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">最新发布</a></li>
                  </ul>
              </div>

              <div class="card-body">
                  
                  <?php echo $__env->make('topics._topic_list',['topics'=>$topics], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  
                  <div class="mt-5">
                      <?php echo $topics->appends(Request::except('page'))->render(); ?>

                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 sidebar">
          <?php echo $__env->make('topics._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
</div>

<?php $__env->stopSection(); ?>



















<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>