

<?php $__env->startSection('content'); ?>
<div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <?php $__currentLoopData = $sentmessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo e(Auth::user()->name); ?></span>
                    <span class="direct-chat-timestamp pull-right"></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?php echo e($sent->message); ?>

                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- /.direct-chat-msg -->

                <?php $__currentLoopData = $recieved; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo e($sent->sender_id); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">  
                  <div class="direct-chat-text">
                    <?php echo e($message->message); ?>

                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="<?php echo e(url('/sendmesssage')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" placeholder="Type Message ..." class="form-control">
                  <input type="hidden" name="sender_id" value="<?php echo e(Auth::user()->id); ?>" placeholder="Type Message ..." class="form-control">
                  <select name="receiver_id" class="form-control select2" required style="width: 100%;">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                  <span class="contacts-list-msg"><?php echo e($user->user_type); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </select>
                <div>
                  
                </div>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Creative\Desktop\ODMS\resources\views/users/messages.blade.php ENDPATH**/ ?>