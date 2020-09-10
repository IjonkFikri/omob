
<?php $__env->startSection('title','Tambah Kelas'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Kelas</h4>
<form action="<?php echo e(route('reports.export_excel')); ?>" method="post">
    <?php echo csrf_field(); ?>
   
</form>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/levels/create.blade.php ENDPATH**/ ?>