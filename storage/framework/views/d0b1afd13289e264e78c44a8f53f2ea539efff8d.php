<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="<?php echo e(url('/')); ?>">
      LaraBBS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo e(active_class(if_route('topics.index'))); ?>"><a class="nav-link" href="<?php echo e(route('topics.index')); ?>">话题</a></li>
        <li class="nav-item <?php echo e(category_nav_active(1)); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 1)); ?>">分享</a></li>
        <li class="nav-item <?php echo e(category_nav_active(2)); ?>" ><a class="nav-link" href="<?php echo e(route('categories.show', 2)); ?>">教程</a></li>
        <li class="nav-item <?php echo e(category_nav_active(3)); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 3)); ?>">问答</a></li>
        <li class="nav-item <?php echo e(category_nav_active(4)); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 4)); ?>">公告</a></li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        <?php if(auth()->guard()->guest()): ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>">注册</a></li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link mt-1 mr-3 font-weight-bold" href="<?php echo e(route('topics.create')); ?>">
              <i class="fa fa-plus"></i>
            </a>
          </li>
          <li class="nav-item notification-badge">
            <a class="nav-link mr-3 badge badge-pill badge-<?php echo e(Auth::user()->notification_count > 0 ? 'hint' : 'secondary'); ?> text-white" href="<?php echo e(route('notifications.index')); ?>">
              <?php echo e(Auth::user()->notification_count); ?>

            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo e(Auth::user()->avatar); ?>" class="img-responsive img-circle" width="30px" height="30px">
              <?php echo e(Auth::user()->name); ?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_contents')): ?>
                <a class="dropdown-item" href="<?php echo e(url(config('administrator.uri'))); ?>">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  管理后台
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>
              <a class="dropdown-item" href="<?php echo e(route('users.show',Auth::id())); ?>">
                <i class="far fa-user mr-2"></i>
                个人中心
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo e(route('users.edit',Auth::id())); ?>">
                <i class="far fa-edit mr-2"></i>
                编辑资料
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" id="logout" href="#">
                <form action="<?php echo e(route('logout')); ?>" method="POST" onsubmit="return confirm('你确定退出吗？');">
                  <?php echo e(csrf_field()); ?>

                  <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
              </a>
            </div>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
