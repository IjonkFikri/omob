
<?php $__env->startSection('title','Resensi Buku'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card p-4">
    <h4>Review Buku <?php echo e($users->name); ?></h4>
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group mt-2">
            <h5 class="text-black-50">Data Buku</h5>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tempat Terbit</th>
                        <th style="width: 5%;">Halaman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo e($data->judul_buku); ?></td>
                    <td><?php echo e($data->penulis); ?></td>
                        <td ><?php echo e($data->penerbit); ?></td>
                        <td><?php echo e($data->tempat_terbit); ?></td>
                        <td><?php echo e($data->jumlah_halaman); ?></td>
                    <td>
                       
                        <?php if($reviews->count('books_id') > 0): ?>
                        <span class="badge badge-pill badge-success">Sudah</span>
                        <?php else: ?> 
                        <span class="badge badge-pill badge-danger">Belum</span>
                        <?php endif; ?>

                    </td>
                    </tr>
                </tbody>
            </table>
            <?php $__currentLoopData = $reviews->where('books_id',$data->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label for="">Sinopsis</label>
             <p><?php echo e($review->sinopsis); ?></p>
            <label for="">Kelebihan</label>
             <p><?php echo e($review->kelebihan); ?></p>
            <label for="">Kekurangan</label>
             <p><?php echo e($review->kekurangan); ?></p>
             <label for="">Kesimpulan</label>
             <p><?php echo e($review->kesimpulan); ?></p>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('review.print',$data->id)); ?>" class="btn btn-link btn-txt float-right text-decoration-none"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
       <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($books->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/review/show.blade.php ENDPATH**/ ?>