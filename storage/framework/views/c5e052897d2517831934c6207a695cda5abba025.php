


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <br>
            <div class="pull-left">
                <h2> Bank Page for <?php echo e($bank->name); ?></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('banks.index')); ?>" title="Go back"> <i class="fas fa-backward "></i> Index</a>
            </div>
        </div>
    </div>

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

    <div class="content">
        <div class="box col-xs-8 col-sm-8 col-md-8">
            <div class="box-header">
              <h3 class="box-title">Banks and Accounts</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Bank Name</th>
                  <th>Phone Number</th>
                  <th>Account Type</th>
                  <th>Account ID</th>
                  <th>Account</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($bank->name); ?></td>
                <td><?php echo e($bank->phone_number); ?></td>
                <td><?php echo e($bank->account_type); ?></td>
                <td><?php echo e($bank->account_id); ?></td>
                <td><?php echo e($bank->account); ?></td>
                <td>
                    <form action="<?php echo e(route('banks.delete', $bank->id)); ?>" method="POST">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete this post')">
                    Delete
                    </button>
                    </form>
                   <!-- <a href="<?php echo e(route('banks.delete',$bank->id)); ?>">
                    <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="<?php echo e($bank->id); ?>" data-action="<?php echo e(route('banks.destroy',$bank->id)); ?>" > Delete</button> </a> -->
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
        </div>

     </div>   
    <div class="col-xs-8 col-sm-8 col-md-8">
        <strong>Add Account: </strong>
    </div>
    <br>
    <br>
    <div class="row content">
        <form action="<?php echo e(route('banks.store')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Account Type: </strong>
                 <input type="text" name="account_type" class="form-control" placeholder="Account_type">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Account ID: </strong>
                    <input type="number" name="account_id" class="form-control" placeholder="Account ID">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Account: </strong>
                    <input type="text" name="account" class="form-control" placeholder="Account Amount">
                </div>
            </div>
        
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="hidden" name="bank_id" class="form-control" value="<?php echo e($bank->id); ?>">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
        <br>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/banks/show.blade.php ENDPATH**/ ?>