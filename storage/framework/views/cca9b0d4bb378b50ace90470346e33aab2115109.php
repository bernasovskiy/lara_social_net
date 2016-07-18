<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Messages to <?php echo e(Auth::user()->name); ?></div>

                <div class="panel-body">
                    <?php foreach($messages as $message): ?>
                        <?php echo e($message->body); ?> | <form method="POST" action="<?php echo e(route('read_message', $message->id)); ?>">
                            <?php echo e(method_field('PUT')); ?>

                            <?php echo e(csrf_field()); ?>


                            <input type="submit" class="btn btn-default" value="Read it!">
                        </form><br>
                        from <?php echo e($message->user->name); ?>

                            
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>