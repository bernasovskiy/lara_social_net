<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e($user->name); ?></div>

                <div class="panel-body">
                    <img src="<?php echo e($user->avatar); ?>">
                    <div><?php echo e($user->email); ?></div>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Friendlist</div>

                <div class="panel-body">
                    <?php foreach($user->friends() as $friend): ?>
                        <div><?php echo e($friend->name); ?> <a href="<?php echo e(route('send_message', $friend->id)); ?>">Send a message</a>
                            <form method="POST" action="<?php echo e(route('remove_friend', $friend->id)); ?>">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                                <input class="btn btn-warning" type="submit" value="Remove a friend">
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Become a friend of that user!</div>

                <div class="panel-body">
                    <?php foreach($users as $other_user): ?>
                        <?php if($user->id != $other_user->id): ?>
                            <div><?php echo e($other_user->name); ?> 
                                <form method="POST" action="<?php echo e(route('create_friend', ['user_id' => $user->id, 'other_id' => $other_user->id])); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="submit" class="btn btn-success" value="Become a friends!">
                                </form>
                            </div>
                        <?php endif; ?>
                        
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>