<?php $__env->startSection('title','Data User'); ?>
<?php $__env->startSection('content'); ?>
<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2"><?php echo $__env->yieldContent('title'); ?></label>   
    <div class="float-right">
        <a href="<?php echo e(route('users.create')); ?>" class="font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
        <!-- Button trigger modal -->
        <a href="#" class="font-weight-bold text-success" data-toggle="modal" data-target="#importExcel">
            <i class="fas fa-file-import text-success"></i> Import Data
        </a>
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="post" action="<?php echo e(url('/importUser')); ?>" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <p> <i class="fas fa-file-download text-info"></i> <a href="/download/importuser.xlsx">Download Format Import</a></p>
                </div>
                <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<table class="table table-striped my-2" id="data">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Nis / Nip</th>
            <th> <i class="fas fa-key text-light"></i> User Akses</th>
            <th><i class="fas fa-tools text-light"></i> Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td style="width:20%;"><?php echo e($user->name); ?></td>
            <td><?php echo e($user->nis); ?></td>
            <td>
                <?php $__currentLoopData = $roles->where('id',$user->role); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($role->nama_role); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td style="width:12%">
                <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/users/index.blade.php ENDPATH**/ ?>