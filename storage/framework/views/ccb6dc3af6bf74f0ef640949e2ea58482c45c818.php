<div class="form-group">
        <label for="">Nama Unit</label>
        <input type="text" name="nama_kelas" id="" class="form-control <?php if ($errors->has('nama_kelas')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nama_kelas'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
        placeholder="Input New Kelas" value="<?php echo e(old('nama_kelas') ?? $levels->nama_kelas); ?>" autocomplete="off">
    <?php if ($errors->has('nama_kelas')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nama_kelas'); ?>
    <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/inc/form/_formLevelEdit.blade.php ENDPATH**/ ?>