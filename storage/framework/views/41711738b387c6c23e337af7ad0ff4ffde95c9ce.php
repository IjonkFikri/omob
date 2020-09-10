<?php $__env->startSection('title','Edit Recaps User'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
        <h4>Edit User Recap</h4>
        <form action="<?php echo e(route('recaps.update',$recaps->id)); ?>" method="post">
            <?php echo method_field('PATCH'); ?>
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('inc/form/_formRecapEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <input type="submit" value="Simpan" class="btn btn-info text-light float-right">
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/recaps/edit.blade.php ENDPATH**/ ?>