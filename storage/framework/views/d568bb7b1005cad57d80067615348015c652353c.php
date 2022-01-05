<?php $__env->startSection('content'); ?>
<br>
<br>
<?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Username or Password is Incorrect! <br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
<div class="login-box">
  <div class="login-logo">
    <h2>Online Donation Management System </h2>
  </div>
   <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>
      <div class="form-group has-feedback">
        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" type="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input id="remember_me" type="checkbox" class="form-checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a class="underline text-sm text-gray-600 hover:text-gray-900 pull-left" href="<?php echo e(route('password.request')); ?>">Forgot your password?</a><br>
    <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 underline text-center">Register</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/auth/login.blade.php ENDPATH**/ ?>