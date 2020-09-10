<input type="hidden" name="books_id" value="<?php echo e($book->id); ?>">
<div class="form-group">
    <label for="formGroupExampleInput">Sinopsis Buku</label>
    <textarea name="sinopsis" id="" cols="30" rows="4" class="form-control <?php if ($errors->has('sinopsis')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sinopsis'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Sinopsis"><?php echo e(old('sinopsis')); ?></textarea>
        <?php if ($errors->has('sinopsis')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sinopsis'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Kelebihan</label>
        <textarea name="kelebihan" id="" cols="30" rows="4" class="form-control <?php if ($errors->has('kelebihan')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kelebihan'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Kelebihan Buku"><?php echo e(old('kelebihan')); ?></textarea>
            <?php if ($errors->has('kelebihan')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kelebihan'); ?>
            <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
        </div>
    <div class="form-group">
            <label for="formGroupExampleInput">Kekurangan</label>
            <textarea name="kekurangan" id="" cols="30" rows="4" class="form-control <?php if ($errors->has('kekurangan')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kekurangan'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Kekurangan"><?php echo e(old('kekurangan')); ?></textarea>
                <?php if ($errors->has('kekurangan')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kekurangan'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
    <div class="form-group">
            <label for="formGroupExampleInput">Kesimpulan</label>
            <textarea name="kesimpulan" id="" cols="30" rows="4" class="form-control <?php if ($errors->has('kesimpulan')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kesimpulan'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Kesimpulan"><?php echo e(old('kesimpulan')); ?></textarea>
                <?php if ($errors->has('kesimpulan')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kesimpulan'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/inc/form/_formReview.blade.php ENDPATH**/ ?>