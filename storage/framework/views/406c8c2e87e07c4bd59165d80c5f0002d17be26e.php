<?php $__env->startSection('title','Rekap Rangking'); ?>
<?php $__env->startSection('content'); ?>

<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="float-left col-10">
            
        <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#"
                class="alert-link ml-2">THB</a> <small>Total Halaman Buku</small> <a href="#"
                class="alert-link ml-2">TRB</a> <small>Total Riwayat Bacaan</small>
        </div>
    <div class="float-right col-2"> <a href="<?php if(Auth::user()->role == 1): ?><?php echo e(url('adminrecap')); ?> <?php elseif(Auth::user()->role ==4 ): ?><?php echo e(url('recap')); ?><?php else: ?><?php echo e(url('reports')); ?> <?php endif; ?>" class="card-link font-weight-bold "><i
                    class="fas fa-arrow-circle-left"></i> Kembali</a></div>
    </div>

</div>

<table class="table table-light " id="data">
    <thead>
        <tr>
            <th>#</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>JB</th>
            <th>THB</th>
            <th>Finish</th>
            <th>Unfinish</th>
            <th>TRB</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $readings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="width:4%;"><?php echo e($loop->iteration); ?></td>
            <td class="td1 title text-center" style="width:15%;"> <?php echo e($reading->user->nis); ?></td>
            <td style="width:60%;"><?php echo e($reading->user->name); ?></td>
            <td class="td1 title text-center">
                <?php $books= App\Book::where('users_id',$reading->user->id) ?>
                <!-- Button trigger modal -->
                <?php echo e($books->count()); ?>

            </td>
            <td class="td1 title text-center"><?php echo e($books->sum('jumlah_halaman')); ?></td>
            <td class="td1 title text-center"><?php if($books->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($books->sum('status',1)); ?>

                    <?php endif; ?></td> <td class="td1 title text-center"><?php echo e($books->count() - $books->sum('status',1)); ?></td>
            <td class="td1 title text-center">
                <?php $tReading= App\Reading::where('users_id',$reading->user->id) ?>
                <?php echo e($tReading->sum('total_baca')); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/reports/ranking.blade.php ENDPATH**/ ?>