
<?php $__env->startSection('title','Data Siswa'); ?>
<?php $__env->startSection('content'); ?>

<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2"><?php echo $__env->yieldContent('title'); ?></label><a href="<?php echo e(route('students.create')); ?>"
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
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($student->user->nis); ?></td>
            <td><?php echo e($student->user->name); ?></td>
            <td><?php echo e($student->level->unit->nama_unit); ?></td>
            <td><?php echo e($student->level->nama_kelas); ?></td>
            <td style="width:12%;">
                <form action="<?php echo e(route('students.destroy',$student->id)); ?>" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="<?php echo e(route('students.edit',$student->id)); ?>" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                     <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>

                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/students/index.blade.php ENDPATH**/ ?>