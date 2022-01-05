

<?php $__env->startSection('content'); ?>
   <!-- <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                </div> -->

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Donation Posts</h3>
              <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('posts.create')); ?>" title="Create a project"> <i class="fas fa-plus-circle"></i> Create New Post
                    </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Detail</th>
                  <th>Location</th>
                  <th>Date Created</th>
                  <th>Created By</th>
                  <th width="280px"> Action</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($post->name); ?></td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->detail); ?></td>
                <td><?php echo e($post->location); ?></td>
                <td><?php echo e(date_format($post->created_at, 'jS M Y')); ?></td>
                <td><?php echo e($post->created_by); ?> </td>
                <td> 
                    <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST">

                        <a href="<?php echo e(route('posts.show', $post->id)); ?>" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>Show
                        </a>

                        <a href="<?php echo e(route('posts.edit', $post->id)); ?>">
                            <i class="fas fa-edit  fa-lg"></i>Edit

                        </a>

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>Delete

                        </button>
                    </form>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

    <?php echo $posts->links(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/posts/index.blade.php ENDPATH**/ ?>