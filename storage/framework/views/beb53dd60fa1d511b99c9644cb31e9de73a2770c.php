<?php $__env->startSection('title','Data Kelas'); ?>
<?php $__env->startSection('content'); ?>
<div class="alert alert-info top-border mt-4" role="alert">
        <label class="t-md mt-2"><?php echo $__env->yieldContent('title'); ?></label><a href="<?php echo e(route('levels.create')); ?>"
            class="float-right font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
    </div>
   <table class="table table-bordered ">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Unit Sekolah</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelasSiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($kelasSiswa->unit->nama_unit); ?></td>
                <td><?php echo e($kelasSiswa->nama_kelas); ?></td>
                <td>
                <form action="<?php echo e(route('levels.destroy',$kelasSiswa->id)); ?>" method="post" onsubmit="return confirm('Do you want to delete this user?');">
                <a href="<?php echo e(route('levels.edit',$kelasSiswa->id)); ?>" class="btn btn-warning">Edit</a>
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($levels->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/levels/index.blade.php ENDPATH**/ ?>