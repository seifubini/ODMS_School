

<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col-lg-8 margin-tb">
            
            
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <div class="box col-xs-8 col-sm-8 col-md-8">
            <div class="box-header">
              <h3 class="box-title">Banks and Accounts</h3>
              <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('banks.index')); ?>" title="Go back"> <i class="fas fa-backward "></i> Add Bank</a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  
                  <th>Phone Number</th>
                  <th>Action</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($bank->name); ?></td>
                
                <td><?php echo e($bank->phone_number); ?></td>
                <td>
                  <a href="<?php echo e(route('banks.show', $bank->id)); ?>" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Show</i>
                        </a>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/users/organization.blade.php ENDPATH**/ ?>