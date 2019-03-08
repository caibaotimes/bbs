<?php $__env->startSection('title', $topic->title); ?>
<?php $__env->startSection('description', $topic->excerpt); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        作者：<?php echo e($topic->user->name); ?>

                    </div>
                    <hr>
                    <div class="media">
                        <div align="center">
                            <a href="<?php echo e(route('users.show', $topic->user->id)); ?>">
                                <img class="thumbnail img-fluid" src="<?php echo e($topic->user->avatar); ?>" width="300px" height="300px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
            <div class="card ">
                <div class="card-body">
                    <h1 class="text-center mt-3 mb-3">
                        <?php echo e($topic->title); ?>

                    </h1>

                    <div class="article-meta text-center text-secondary">
                        <?php echo e($topic->created_at->diffForHumans()); ?>

                        ⋅
                        <i class="far fa-comment"></i>
                        <?php echo e($topic->reply_count); ?>

                    </div>

                    <div class="topic-body mt-4 mb-4">
                        <?php echo $topic->body; ?>

                    </div>

                    <div class="operate">
                        <hr>
                        <a href="<?php echo e(route('topics.edit', $topic->id)); ?>" class="btn btn-outline-secondary btn-sm" role="button">
                            <i class="far fa-edit"></i> 编辑
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm" role="button">
                            <i class="far fa-trash-alt"></i> 删除
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>