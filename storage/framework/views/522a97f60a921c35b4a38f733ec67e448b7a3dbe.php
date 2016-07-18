<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Write message to <?php echo e($user->name); ?></div>

                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route('submit_message', $user->id)); ?>">
                      <?php echo e(csrf_field()); ?>  
                      <textarea name="body" class="form-control" placeholder="Write your message">
                          
                      </textarea>

                      <input type="submit" value="Send a message" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>