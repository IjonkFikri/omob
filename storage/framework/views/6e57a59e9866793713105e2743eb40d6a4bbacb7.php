
<div class="form-group">
    <label for="name" class=""><?php echo e(__('Name')); ?></label>

        <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
            name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
</div>

<div class="form-group">
    <label for="nis" class=""><?php echo e(__('Nis/Nip')); ?></label>

        <input id="nis" type="nis" class="form-control <?php if ($errors->has('nis')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nis'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
            name="nis" value="<?php echo e(old('nis')); ?>" required autocomplete="nis">

        <?php if ($errors->has('nis')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nis'); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
</div>

<div class="form-group">
    <label for="password"
        class=""><?php echo e(__('Password')); ?></label>
        <input id="password" type="password"
            class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password"
            required autocomplete="new-password">

        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
</div>

<div class="form-group">
    <label for="password-confirm"
        class=""><?php echo e(__('Confirm Password')); ?></label>
        <input id="password-confirm" type="password" class="form-control"
            name="password_confirmation" required autocomplete="new-password">
</div>

<div class="form-group">
    <label for="role"
        class=""><?php echo e(__('Akses Role')); ?></label>

        <select name="role" id="" class="form-control <?php if ($errors->has('role')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('role'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
            <option value="">Pilih Role</option>
            <option value="1">Administrator</option>
            <option value="2">Guru</option>
            <option value="3">Siswa</option>
        </select>
        <?php if ($errors->has('role')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('role'); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
</div><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/inc/form/_formUserCreate.blade.php ENDPATH**/ ?>