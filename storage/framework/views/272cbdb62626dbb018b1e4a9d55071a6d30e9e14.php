
<?php $__env->startSection('title','Detail Data'); ?>
<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h4><span class="alert-link text-info">Detail Data Riwayat</span> <?php echo e($student->user->name); ?></h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <label for="" class="alert-link  mr-2"><?php echo e($student->level->nama_kelas); ?></label>
    <i class="fas fa-info-circle mr-2"></i>
    <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#" class="alert-link ml-2">THB</a>
    <small>Total Halaman Baca</small> <a href="#" class="alert-link ml-2">RB</a> <small>Riwayat Bacaan</small>
    <a href="<?php echo e(url('reports')); ?>" class="card-link float-right font-weight-bold "><i
            class="fas fa-arrow-circle-left"></i> Kembali</a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            
            <th> <i class="fas fa-bookmark "></i> Judul Buku</th>
            <th>JB</th>
            <th>RB</th>
            <th><i class="fas fa-percentage text-center"></i></th>
            <th>Status</th>
            
        </tr>
    </thead>
    <tbody>
    <tbody>

        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $readings = App\Reading::where('books_id',$book->id)->get(); ?>
        <tr>
            <td class="td1"><?php echo e($loop->iteration); ?></td>
            
            <td>
                <label for="" class="title"><?php echo e($book->judul_buku); ?></label>

                <ul class="list-group">
                    <?php $__currentLoopData = $readings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo e(\Carbon\Carbon::parse($reading->created_at)->format('d F Y')); ?>

                        <span class="badge badge-primary badge-pill"><?php echo e($reading->start); ?> - <?php echo e($reading->end); ?></span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </td>
            <td class="td1"><?php echo e($book->jumlah_halaman); ?></td>
            <td class="td1">
                <?php echo e($readings->sum('total_baca')); ?>

            </td>
            <td class="td1">
                <?php echo e(round(($readings->sum('total_baca')/$book->jumlah_halaman)*100)); ?>

            </td>
            <td class="td1">
                <?php if($readings->sum('total_baca') == $book->jumlah_halaman): ?>
                <span class="badge badge-success">Finish</span>
                <?php else: ?>
                <span class="badge badge-danger">Unfinish</span>
                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </tbody>
</table>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/reports/show.blade.php ENDPATH**/ ?>