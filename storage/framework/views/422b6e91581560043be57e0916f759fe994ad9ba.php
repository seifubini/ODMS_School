

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left">
                <h2>Edit Donation Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('donations.index')); ?>" title="Go back"> <i class="fas fa-backward "></i> </a>
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
    <form action="<?php echo e(route('donations.update', $donation->id)); ?>" enctype="multipart/form-data" method="POST" >
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row col-md-12">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="donation_name" value="<?php echo e($donation->donation_name); ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="donation_description"
                        placeholder="Description"><?php echo e($donation->donation_description); ?></textarea>
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="donation_location" value="<?php echo e($donation->donation_location); ?>" class="form-control" placeholder="Location">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <input type="hidden" name="donation_created_by" class="form-control" value="<?php echo e(Auth::user()->id); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/donations/edit.blade.php ENDPATH**/ ?>