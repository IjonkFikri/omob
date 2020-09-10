<?php $__env->startSection('title','Edit Siswa'); ?>
<?php $__env->startSection('content'); ?>
<h4>Edit Siswa</h4>
<form action="<?php echo e(route('students.update',$students->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('inc/form/_formStudentEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <input type="submit" value="Update Siswa" class="btn btn-primary">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/students/edit.blade.php ENDPATH**/ ?>