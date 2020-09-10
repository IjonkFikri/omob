
<?php $__env->startSection('title','Edit Review'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('review.update',$books->books_id)); ?>" method="post">
<?php echo csrf_field(); ?> 
<?php echo method_field('PATCH'); ?>
<?php echo $__env->make('inc/form/_formReviewEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<input type="submit" value="Update Review" class="btn btn-primary float-right ">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/review/edit.blade.php ENDPATH**/ ?>