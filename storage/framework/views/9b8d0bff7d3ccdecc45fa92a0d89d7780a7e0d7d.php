<?php $__env->startSection('content'); ?>
<br>

<div class="register-box">
  <div class="register-logo">
    <h2>Online Donation Management System </h2>
  </div>

  <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?php echo e(route('register')); ?>" method="post">
        <?php echo csrf_field(); ?>
      <div class="form-group has-feedback">
        <input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo e(route('login')); ?>" class="underline text-sm text-gray-600 hover:text-gray-900 text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('auth.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/auth/register.blade.php ENDPATH**/ ?>