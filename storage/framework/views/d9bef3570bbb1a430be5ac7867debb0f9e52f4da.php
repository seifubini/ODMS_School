

<?php $__env->startSection('content'); ?>
   <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('donations.create')); ?>" title="Create a Donation"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div> -->

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
<div class="box col-xs-12 col-sm-12 col-md-12">
            <div class="box-header">
              <h3 class="box-title">Donation Advertisements</h3>
              <?php if( Auth::user()->is_admin || Auth::user()->user_type == 'donee'): ?>
              <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('donations.create')); ?>" title="Create a project"> <i class="fas fa-plus-circle"></i> Create New Avertisement
                    </a>
            </div>
            <?php endif; ?>
            </div>
    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Location</th>
            <th>Created By</th>
            
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($donation->donation_name); ?></td>
                <td><?php echo e($donation->donation_description); ?></td>
                <td><?php echo e($donation->donation_location); ?></td>
                <td><?php echo e($donation->name); ?></td>
                
                <td>
                    <form action="<?php echo e(route('donations.destroy', $donation->id)); ?>" method="POST">

                        <a href="<?php echo e(route('donations.show', $donation->id)); ?>" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Show</i>
                        </a>
                        <?php if(Auth::user()->name == $donation->name): ?>
                        <a href="<?php echo e(route('donations.edit', $donation->id)); ?>">
                            <i class="fas fa-edit  fa-lg">Edit</i>

                        </a>
                        <?php endif; ?>

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <!--<button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button> -->
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>
</div>
</div>


    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/donations/index.blade.php ENDPATH**/ ?>