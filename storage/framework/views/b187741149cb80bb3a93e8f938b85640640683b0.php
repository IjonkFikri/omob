
<?php $__env->startSection('title','Tambah User'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<form action="<?php echo e(route('users.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('inc/form/_formUserCreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <?php echo e(__('Simpan')); ?>

                </button>
        </div>
</form>
        </div>
</div>  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/users/create.blade.php ENDPATH**/ ?>