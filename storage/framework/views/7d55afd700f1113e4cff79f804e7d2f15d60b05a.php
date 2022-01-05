

<?php $__env->startSection('content'); ?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Hello <?php echo e(Auth::user()->name); ?>, Please Finish Setting up Your Account Here </h3>
          </div>
          <div class="box-body">
            
            
    <!--<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
          
        </div>
    </div> -->

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('account.store')); ?>" enctype="multipart/form-data" method="POST" >
        <?php echo csrf_field(); ?>

        <div class="row" >
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>User Name:</strong>
                    <input type="text" placeholder="<?php echo e(Auth::user()->name); ?>" class="form-control" disabled>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>User Email:</strong>
                    <input type="Email" placeholder="<?php echo e(Auth::user()->email); ?>" class="form-control" disabled>
                </div>
            </div>

            <div for="master-dropdown" class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                <label>Account Type:</label>
                <select id="master-dropdown" name="user_type" class="form-control select2" required style="width: 100%;">
                  <option value="company">Company</option>
                  <option value="donor">Donor</option>
                  <option value="donee">Donee</option>
                </select>
                </div>
            </div>

            <div>
            <div for="dependent-dropdown" class="col-xs-8 col-sm-8 col-md-8">
                <div id="dependent-dropdown" class="form-group">
                    <strong>Hospital Name:</strong>
                    <input type="text" id="dependent-dropdown" name="name" class="form-control" placeholder="Hospital Name" required>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div id="otherField" class="form-group">
                    <strong>Hospital Email:</strong>
                    <input type="Email" name="email" class="form-control" placeholder="Hospital Email" >
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Hospital Address:</strong>
                    <input type="text" name="address" class="form-control" placeholder="Hospital Address" >
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>
                </div>
            </div>
        </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    
                    <input type="hidden" name="created_by" class="form-control" value="<?php echo e(Auth::user()->id); ?>" required>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>

          </div>
          <!-- /.box-body -->
        </div>

    
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/home.blade.php ENDPATH**/ ?>