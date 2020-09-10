
<?php $__env->startSection('title','Data Guru'); ?>
<?php $__env->startSection('content'); ?>
<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2"><?php echo $__env->yieldContent('title'); ?></label><a href="<?php echo e(route('teachers.create')); ?>"
        class="float-right font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
</div>
<table class="table table-bordered my-2" id="data">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Unit</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($teacher->user->nis); ?></td>
            <td><?php echo e($teacher->user->name); ?></td>
            <td><?php echo e($teacher->level->unit->nama_unit); ?></td>
            <td><?php echo e($teacher->level->nama_kelas); ?></td>
            <td style="width:12%;">
                <form action="<?php echo e(route('teachers.destroy',$teacher->id)); ?>" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="<?php echo e(route('teachers.edit',$teacher->id)); ?>" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($teachers->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/teachers/index.blade.php ENDPATH**/ ?>