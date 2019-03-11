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

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$topic)): ?>
                    <div class="operate">
                        <hr>
                        <a href="<?php echo e(route('topics.edit', $topic->id)); ?>" class="btn btn-outline-secondary btn-sm" role="button">
                            <i class="far fa-edit"></i> 编辑
                        </a>
                        <form action="<?php echo e(route('topics.destroy',$topic->id)); ?>" method="post" style="display: inline-block;" onsubmit="return confirm('确定要删除吗？')">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <i class="far fa-trash-alt"></i>删除
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            
            <div class="card topic-reply mt-4">
                <div class="card-body">
                    <?php echo $__env->make('topics._reply_box',['topic'=>$topic], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('topics._reply_list',['replies' => $topic->replies()->with('user')->get()], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>



        </div>
    </div>
<?php $__env->stopSection(); ?>

























<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>