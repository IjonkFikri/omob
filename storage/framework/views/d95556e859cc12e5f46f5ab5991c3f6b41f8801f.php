
<?php $__env->startSection('title','Tambah Riwayat'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Riwayat</h4>

<form action="<?php echo e(route('readings.store')); ?>" method="post">
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php  $readings = App\Reading::where('books_id',$book->id)->get(); ?>
    <?php echo csrf_field(); ?>
   <?php echo $__env->make('inc/form/_formReadingCreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <input type="hidden" name="status" id="status">
    <div class="form-group my-2">
        <input type="submit" value="Simpan" class="btn btn-info text-light float-right mt-4">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>
        </div>
</div>
<?php $__env->stopSection(); ?>
<script>
     function endData(){
        var end = document.getElementById("end").value;
        var jhb = document.getElementById("jhb").value;
        if (end ==jhb) {
            document.getElementById("status").value=1;
        }else{
            document.getElementById("status").value=0;
        }
    }
    
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/readings/create.blade.php ENDPATH**/ ?>