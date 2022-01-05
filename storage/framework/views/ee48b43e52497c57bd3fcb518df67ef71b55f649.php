

<?php $__env->startSection('content'); ?>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <div class="box col-xs-8 col-sm-8 col-md-8">
            <div class="box-header">
              <h3 class="box-title">Doctors</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Specialization</th>
                  <th>Phone Number</th>
                  <th>Hospital</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?></td>
                <td><?php echo e($doctor->email); ?></td>
                <td><?php echo e($doctor->specialization); ?></td>
                <td><?php echo e($doctor->phone_number); ?></td>
                <td><?php echo e($doctor->hospital_name); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/users/doctor.blade.php ENDPATH**/ ?>