<?php $__env->startSection('title','Tambah Kelas'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Kelas</h4>
<form action="<?php echo e(route('levels.update',$levels->id)); ?>" method="post">
    <?php echo method_field('PATCH'); ?>
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('inc/form/_formLevelEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input type="submit" value="Simpan" class="btn btn-success">
</form>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/levels/edit.blade.php ENDPATH**/ ?>