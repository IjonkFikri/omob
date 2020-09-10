
<?php $__env->startSection('title','Data Buku'); ?>
<?php $__env->startSection('content'); ?>
<h4>Data Buku</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <i class="fas fa-info-circle mr-2"></i>
    <a href="#" class="alert-link">JB</a> <small>Judul Buku</small>
    <a href="<?php echo e(route('books.create')); ?>" class="card-link  float-right font-weight-bold"><i
            class="fas fa-plus-circle text-info"></i> Tambah Buku</a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th class="td1">#</th>
            <th style="width:9em;">Kelas</th>
            <th><i class="fas fa-bookmark "></i> Judul Buku</th>
            <th class="td1">JHB</th>
            <th class="td1">Status</th>
            <th style="width:6rem;"><i class="fas fa-tools "></i> Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td class="title"><?php echo e($book->level->nama_kelas); ?></td>
            <td class="text-judul"><?php echo e($book->judul_buku); ?></td>
            <td class="title"><?php echo e($book->jumlah_halaman); ?></td>
            <td>
                <?php $readings = App\Reading::where('books_id',$book->id)->get(); ?>
                <?php if($readings->sum('total_baca') == $book->jumlah_halaman): ?>
                <span class="badge badge-soft-success">Finish</span>
                <?php else: ?>
                <span class="badge badge-soft-danger">Unfinish</span>
                <?php endif; ?>
            </td>
            <td>
                
                <a href="<?php echo e(route('books.edit',$book->id)); ?>" class="btn-text"><i class="fas fa-pencil-alt text-info"></i>
                    Edit</a>
                
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/books/index.blade.php ENDPATH**/ ?>