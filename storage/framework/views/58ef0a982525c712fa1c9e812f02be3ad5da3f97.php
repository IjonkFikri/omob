
<?php $__env->startSection('title','Detail Riwayat'); ?>
    <?php $__env->startSection('content'); ?>
    <h4>Detail Riwayat</h4>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th><i class="fas fa-list-ol"></i> Halaman</th>
                <th> <i class="fas fa-calendar-alt"></i> Tanggal</th>
                <th><i class="fas fa-history"></i> Created At</th>
                <th style="width:10%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $readings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($reading->start); ?> - <?php echo e($reading->end); ?> </td>
            <td><?php echo e(\Carbon\Carbon::parse($reading->created_at)->format('d F Y')); ?></td>
                    <td>
                        <?php echo e($reading->created_at->diffForHumans()); ?>

                    </td>
                    <td>
                    <form action="<?php echo e(route('readings.destroy',$reading->id)); ?>" method="post" onsubmit="return confirm('Yakin akan di hapus ?')">
                        <?php echo csrf_field(); ?> 
                        <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-link btn-text">
                                <i class="far fa-trash-alt"></i>&nbsp; Delete
                            </button>
                        </form>
                    </td>
                </tr> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/readings/show.blade.php ENDPATH**/ ?>