
<?php $__env->startSection('title','Rekap Rangking'); ?>
<?php $__env->startSection('content'); ?>
<?php header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Report-Omob.xls");
?>
<table class="table table-light table-responsive" width="100" id="data">
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
            <td class="td1 title text-center" style="width:5%;"> <?php echo e($reading->user->nis); ?></td>
            <td style="width:60%;"><?php echo e($reading->user->name); ?></td>
            <td class="td1 title text-center">
                <?php $books= App\Book::where('users_id',$reading->user->id) ?>
                <!-- Button trigger modal -->
                <?php echo e($books->count()); ?>

            </td>
            <td class="td1 title text-center"><?php echo e($books->sum('jumlah_halaman')); ?></td>
            <td class="td1 title text-center"><?php if($books->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($books->sum('status',1)); ?> <?php endif; ?></td> <td class="td1 title text-center"><?php echo e($books->count() - $books->sum('status',1)); ?></td>
            <td class="td1 title text-center">
                <?php $tReading= App\Reading::where('users_id',$reading->user->id) ?>
                <?php echo e($tReading->sum('total_baca')); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/reports/export.blade.php ENDPATH**/ ?>