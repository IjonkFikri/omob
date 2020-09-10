
<?php $__env->startSection('title','Edit User'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Edit User</h4>
<form action="<?php echo e(route('users.update',$users->id)); ?>" method="post">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('inc/form/_formUserEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <input type="submit" value="Simpan" class="btn btn-info text-light float-right">
    </form>
        </div>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/users/edit.blade.php ENDPATH**/ ?>