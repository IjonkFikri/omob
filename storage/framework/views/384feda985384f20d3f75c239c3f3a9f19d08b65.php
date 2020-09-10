<?php $__env->startSection('title','Tambah Siswa'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
        <h4>Tambah Siswa</h4>
        <form action="<?php echo e(route('students.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('inc/form/_formStudentCreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-success">
            </div>
        </form>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/students/create.blade.php ENDPATH**/ ?>