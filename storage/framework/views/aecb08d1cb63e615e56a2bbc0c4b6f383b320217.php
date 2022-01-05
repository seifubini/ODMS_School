

<?php $__env->startSection('content'); ?>
<?php if( Auth::user()->is_admin ): ?>
<div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
                <a class="btn btn-primary" href="<?php echo e(route('hospitals.create')); ?>" title="Go back"> <i class="fas fa-backward "></i> Add Hospital </a>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('records.create')); ?>" title="Go back"> <i class="fas fa-backward "></i> Add Record </a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hospitals </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e(++$i); ?></td>
                  <td><?php echo e($hospital->name); ?></td>
                  <td><?php echo e($hospital->address); ?></td>
                  <td><?php echo e($hospital->phone_number); ?></td>
                  <td><?php echo e($hospital->email); ?></td>
                  <td><?php if(Auth::user()->id == $hospital->user_id || Auth::user()->is_admin): ?>
                    <form action="<?php echo e(route('hospitals.delete', $hospital->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete this post')">
                    Delete
                    </button>
                    <a href="<?php echo e(route('hospitals.show', $hospital->id)); ?>" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Show</i>
                        </a>
                    
                  </form>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/hospitals/index.blade.php ENDPATH**/ ?>