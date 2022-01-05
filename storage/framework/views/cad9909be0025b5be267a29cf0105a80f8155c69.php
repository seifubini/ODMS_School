

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

    <div class="register-box-body">
    <p class="login-box-msg">Update your account's profile information and email address.</p>

    <form action="<?php echo e(route('profiles.updateProfile', $user->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

      <div class="form-group has-feedback">
        <input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="<?php echo e($user->name); ?>" required autofocus autocomplete="name" placeholder="Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="<?php echo e($user->email); ?>" required placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <!--<div class="form-group has-feedback">
        <input id="new password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>-->
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update Profile</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/auth/UpdateProfile.blade.php ENDPATH**/ ?>