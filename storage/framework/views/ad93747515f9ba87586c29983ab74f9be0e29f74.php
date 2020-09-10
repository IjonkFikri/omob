
<?php $__env->startSection('title','Edit Guru'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
<h4>Edit Data</h4>
<form action="<?php echo e(route('teachers.update',$teachers->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('inc/form/_formTeacherEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <input type="submit" value="Update Guru" class="btn btn-primary">
</form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/teachers/edit.blade.php ENDPATH**/ ?>