<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Messages from <?php echo e(Auth::user()->name); ?></div>

                <div class="panel-body">
                    <?php foreach($messages as $message): ?>
                        <?php echo e($message->body); ?> <br>
                        to <?php echo e($message->recipient()->name); ?>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>