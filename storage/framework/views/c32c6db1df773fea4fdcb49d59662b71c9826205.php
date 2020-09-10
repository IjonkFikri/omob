
<?php $__env->startSection('title','Tambah Buku'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
            <h4>Tambah Buku</h4>
            <form action="<?php echo e(route('books.store')); ?>" method="post" class="mt-4">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('inc/form/_formBookCreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <input type="submit" value="Simpan" class="btn btn-primary float-right">
            </form>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/books/create.blade.php ENDPATH**/ ?>