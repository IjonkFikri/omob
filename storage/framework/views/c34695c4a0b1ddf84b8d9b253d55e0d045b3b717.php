<?php if($students->count() <= 1): ?>
    
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" name="kelas_id" value="<?php echo e($student->kelas_id); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?> 
<div class="form-group">
        <label for="formGroupExampleInput2">Unit Sekolah</label>
        <select name="kelas_id" id="" class="form-control <?php if ($errors->has('kelas_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kelas_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
            <option value="">Pilih Kelas</option>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($student->kelas_id); ?>" <?php echo e(old('kelas_id')==$student->id ?'selected':''); ?>><?php echo e($student->level->nama_kelas); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if ($errors->has('kelas_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kelas_id'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
<?php endif; ?>
<div class="form-group">
    <label for="formGroupExampleInput">Penulis</label>
    <input type="text" name="penulis" id="" class="form-control <?php if ($errors->has('penulis')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('penulis'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
        placeholder="Nama Penulis" value="<?php echo e(old('penulis')); ?>" autocomplete="off">
        <?php if ($errors->has('penulis')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('penulis'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
<div class="form-group">
    <label for="formGroupExampleInput">Penerbit</label>
    <input type="text" name="penerbit" id="" class="form-control <?php if ($errors->has('penerbit')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('penerbit'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
        placeholder="Penerbit" value="<?php echo e(old('penerbit')); ?>" autocomplete="off">
        <?php if ($errors->has('penerbit')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('penerbit'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
<div class="form-group">
    <label for="formGroupExampleInput">Tempat Terbit</label>
    <input type="text" name="tempat_terbit" id="" class="form-control <?php if ($errors->has('tempat_terbit')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tempat_terbit'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
        placeholder="Tempat Terbit" value="<?php echo e(old('tempat_terbit')); ?>" autocomplete="off">
        <?php if ($errors->has('tempat_terbit')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tempat_terbit'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
<div class="form-group">
    <label for="formGroupExampleInput">Jumlah Halaman</label>
    <input type="text" name="jumlah_halaman" id="" class="form-control <?php if ($errors->has('jumlah_halaman')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('jumlah_halaman'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
        placeholder="Jumlah Halaman" value="<?php echo e(old('jumlah_halaman')); ?>" autocomplete="off">
        <?php if ($errors->has('jumlah_halaman')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('jumlah_halaman'); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
            <label for="formGroupExampleInput">Judul Buku Bacaan</label>
            <textarea name="judul_buku" id="" cols="30" rows="4" class="form-control <?php if ($errors->has('judul_buku')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('judul_buku'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Judul Buku Bacaan"><?php echo e(old('judul_halaman')); ?></textarea>
                <?php if ($errors->has('judul_buku')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('judul_buku'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/inc/form/_formBookCreate.blade.php ENDPATH**/ ?>