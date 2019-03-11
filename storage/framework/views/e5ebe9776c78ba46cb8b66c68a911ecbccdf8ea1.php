

<?php $__env->startSection('title',$user->name.'的个人中心'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card ">
                <img class="card-img-top" src="<?php echo e($user->avatar); ?>" alt="<?php echo e($user->name); ?>">
                <div class="card-body">
                    <h5>
                        <storng>个人简介</storng>
                    </h5>
                    <p><?php echo e($user->introduction); ?></p>
                    <hr>
                    <h5><strong>注册于</strong></h5>
                    <p><?php echo e($user->created_at->diffForHumans()); ?></p>

                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card ">
                <div class="card-body">
                    <h1 class="mb-0" style="font-size:22px;"><?php echo e($user->name); ?> <small><?php echo e($user->email); ?></small></h1>
                </div>
            </div>
            <hr>

            
            <div class="card ">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link bg-transparent <?php echo e(active_class(if_query('tab', null))); ?>" href="<?php echo e(route('users.show', $user->id)); ?>">
                                Ta 的话题
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-transparent <?php echo e(active_class(if_query('tab', 'replies'))); ?>" href="<?php echo e(route('users.show', [$user->id, 'tab' => 'replies'])); ?>">
                                Ta 的回复
                            </a>
                        </li>
                    </ul>
                    <?php if(if_query('tab', 'replies')): ?>
                        <?php echo $__env->make('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('users._topics', ['topics' => $user->topics()->recent()->paginate(5)], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
















<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>