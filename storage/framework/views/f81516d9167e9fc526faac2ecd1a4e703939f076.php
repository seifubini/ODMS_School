


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <br>
            <div class="pull-left">
                <h2> Donation Page for <?php echo e($donation->donation_name); ?></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('donations.index')); ?>" title="Go back"> <i class="fas fa-backward "></i> Index</a>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Donee Name:</strong>
                <?php echo e($donation->donation_name); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Case Description:</strong>
                <?php echo e($donation->donation_description); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <?php echo e($donation->donation_location); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                <?php echo e(date_format($donation->created_at, 'jS M Y')); ?>

            </div>
        </div>
    </div>
    <div class="row content">
        <form action="<?php echo e(route('leave_feedback.store')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Leave Feedback:</strong>
                 <input type="text" name="feedback_detail" class="form-control" placeholder="Your Feedback here ...">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="feedback_by" class="form-control" value="<?php echo e(Auth::user()->id); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="feedback_to" class="form-control" value="<?php echo e($donation->donation_created_by); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="donation_id" class="form-control" value="<?php echo e($donation->id); ?>">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <br>
        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Feedbacks:</strong>
                <?php echo e($feedback->feedback_detail); ?>

                <p>by <?php echo e($feedback->name); ?> </p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/donations/show.blade.php ENDPATH**/ ?>