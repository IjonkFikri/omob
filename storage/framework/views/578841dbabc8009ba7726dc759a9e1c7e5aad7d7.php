<div class="form-group">
        <label for="">Choose User</label>
        <select name="users_id" id="" class="form-control <?php if ($errors->has('users_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('users_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
            <option value="">Pilih User</option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $recaps->users_id ? 'selected' : ''); ?> ><?php echo e($user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if ($errors->has('users_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('users_id'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
        <label for="">Choose Unit</label>
        <select name="units_id" id="" class="form-control <?php if ($errors->has('units_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('units_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
            <option value="">Pilih Kelas</option>
            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($unit->id); ?>" <?php echo e($unit->id ==$recaps->units_id ?'selected':''); ?>><?php echo e($unit->nama_unit); ?></option>
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
   <?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/inc/form/_formRecapEdit.blade.php ENDPATH**/ ?>