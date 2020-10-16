<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            Welcome
            <?php if(auth()->check()): ?>
              <strong>
                <?php echo e(auth()->user()->name); ?>

              </strong>
            <?php endif; ?>
          </div>

          <div class="panel-body">
            <?php if(auth()->guest()): ?>
              To access <a href="<?php echo e(route('page.index')); ?>">Page</a> menu,
              you need to
              <a href="/register">register</a> new account.
              You will automatically logged in after registered.
            <?php else: ?>
              Now, you can access
              <a href="<?php echo e(route('page.index')); ?>">Page</a> menu
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>