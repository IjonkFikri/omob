<?php $__env->startSection('title','Export Report'); ?>
<?php $__env->startSection('content'); ?>
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
        <h4>Export Data Omomb</h4>
        <form action="export_excel" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="">Data Kelas</label>
                <select class="form-control mr-1" name="kelas_id" id="" style="width:9em;">
                    <option value="">Kelas</option>
                    <?php $__currentLoopData = $recaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $levels->where('units_id',$recap->units_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($level->id); ?>"><?php echo e($level->nama_kelas); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <div id="reportrange" class="font-weight-bold"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; font-size:.8em !important;">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
                <input type="hidden" name="daterange" id="date">
            </div>

            <input type="submit" value="Export" class="btn btn-info text-light">
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/recaps/export.blade.php ENDPATH**/ ?>