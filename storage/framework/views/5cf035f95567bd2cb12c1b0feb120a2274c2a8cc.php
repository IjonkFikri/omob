<input type="hidden" name="kelas_id" value="<?php echo e($book->kelas_id); ?>">
<input type="hidden" name="books_id" value="<?php echo e($book->id); ?>">
<div class="form-group my-3">
    <label for="" class="font-weight-bold">Judul Buku</label>
    <p><?php echo e($book->judul_buku); ?></p>
</div>
<div class="form-group my-3">
    <label for="" class="font-weight-bold">Jumlah Halaman</label>
    <p><?php echo e($book->jumlah_halaman); ?></p>
<input type="hidden" name="jhb" value="<?php echo e($book->jumlah_halaman); ?>">
</div>
<div class="form-group my-3">
    <label for="" class="font-weight-bold">Riwayat Terakhir Bacaan</label>
    <p>
        <?php if($readings->count()== 0): ?>
        <span class="text-muted">Belum ada riwayat</span>
        <?php else: ?>
        <?php echo e($readings->sum('total_baca')); ?>

        <?php endif; ?>
    </p>
</div>


<?php if($readings->count()== 0): ?> <?php $n =1; ?> <?php else: ?> <?php $n = $readings->sum('total_baca'); ?> <?php endif; ?>
<div class="form-group my-3">
    <label for="">Update Halaman Baca</label>
    <div class="row">
            <div class="col-sm-4">
                    <input type="text" name="start" id="" value="<?php echo e($n); ?>" class="form-control " readonly>
            </div>
            <div onchange="endData()" class="col-sm-8">
                <input type="hidden" id="jhb" value="<?php echo e($book->jumlah_halaman); ?>">
                <select name="end" id="end" class="form-control">
                    <option value="">Halaman Akhir</option>
                    <?php for($i=$n+1; $i<= $book->jumlah_halaman; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?>
                </select>
            </div>
        </div>
</div>

<?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/inc/form/_formReadingCreate.blade.php ENDPATH**/ ?>