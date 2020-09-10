<div class="form-group">
        <label for="formGroupExampleInput2">Unit Sekolah</label>
        <select name="units_id" id="" class="form-control <?php if ($errors->has('units_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('units_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
            <option value="">Pilih Unit</option>
            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($unit->id); ?>" <?php echo e(old('units_id')==$unit->id ?'selected':''); ?>><?php echo e($unit->nama_unit); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if ($errors->has('units_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('units_id'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
   
<div class="form-group">
    <label for="formGroupExampleInput">Nama Kelas</label>
    <input type="text" name="nama_kelas" id="" class="form-control <?php if ($errors->has('nama_kelas')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nama_kelas'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
        placeholder="Input New Kelas" value="<?php echo e(old('nama_kelas')); ?>" autocomplete="off">
        <?php if ($errors->has('nama_kelas')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nama_kelas'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/inc/form/_formLevelCreate.blade.php ENDPATH**/ ?>