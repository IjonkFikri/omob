        <div class="form-group">
            <label for="">Pilih Kelas</label>
        <select name="kelas_id" id="" class="form-control <?php if ($errors->has('users_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('users_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
            <option value="">Pilih Kelas</option>
            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <optgroup label="<?php echo e($unit->nama_unit); ?>">
                <?php $__currentLoopData = $levels->where('units_id',$unit->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($level->id); ?>" <?php echo e(old('units_id')==$unit->id ?'selected':''); ?>><?php echo e($level->nama_kelas); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php if ($errors->has('kelas_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kelas_id'); ?>
    <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views////inc/form/_formStudentClass.blade.php ENDPATH**/ ?>