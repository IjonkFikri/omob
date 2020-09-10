<h4>Kelas <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($level->nama_kelas); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</h4>
<table class="table table-light table-responsive" width="100" id="data">
    <thead>
        <tr>
            <th>#</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jumlah Buku</th>
            <th>Total Halaman Buku</th>
            <th>Finish</th>
            <th>Unfinish</th>
            <th>Total Riwayat Baca</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $readings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td> <?php echo e($reading->user->nis); ?></td>
            <td><?php echo e($reading->user->name); ?></td>
            <td>
                <?php $books= App\Book::where('users_id',$reading->user->id) ?>
                <!-- Button trigger modal -->
                <?php echo e($books->count()); ?>

            </td>
            <td><?php echo e($books->sum('jumlah_halaman')); ?></td>
            <td><?php if($books->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($books->sum('status',1)); ?> <?php endif; ?></td> <td><?php echo e($books->count() - $books->sum('status',1)); ?></td>
            <td>
                <?php $tReading= App\Reading::where('users_id',$reading->user->id) ?>
                <?php echo e($tReading->sum('total_baca')); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/exports/adminreport.blade.php ENDPATH**/ ?>