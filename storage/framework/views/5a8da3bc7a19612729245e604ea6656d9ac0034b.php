
<?php $__env->startSection('title','Tambah Kelas'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Kelas</h4>
<form action="<?php echo e(route('kelas.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
   <?php echo $__env->make('../inc/form/_formStudentClass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <input type="submit" value="Simpan" class="btn btn-info text-light">
</form>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/kelas/create.blade.php ENDPATH**/ ?>