

<?php $__env->startSection('content'); ?>

<?php if( Auth::user()->is_admin ): ?>
<div class="row">
        <div class="col-lg-12 margin-tb">
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
              <h3 class="box-title">Hospital Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Doctor</th>
                  <th>Donee</th>
                  <th>Hospital</th>
                  <th>Description</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($record->first_name); ?></td>
                <td><?php echo e($record->first_name); ?></td>
                <td><?php echo e($record->name); ?></td>
                <td><?php echo e($record->description); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/hospitals/records.blade.php ENDPATH**/ ?>