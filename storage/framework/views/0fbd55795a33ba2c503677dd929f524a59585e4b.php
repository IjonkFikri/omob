
<?php $__env->startSection('title','Rekap Rangking'); ?>
<?php $__env->startSection('content'); ?>

<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="float-left col-10">
            
            <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#" class="alert-link ml-2">THB</a>
            <small>Total Halaman Buku</small> <a href="#" class="alert-link ml-2">TRB</a> <small>Total Riwayat
                Bacaan</small>
        </div>
        <div class="float-right col-2"> <a
                href="<?php if(Auth::user()->role == 1): ?><?php echo e(url('adminrecap')); ?> <?php elseif(Auth::user()->role ==4 ): ?><?php echo e(url('recap')); ?><?php else: ?><?php echo e(url('reports')); ?> <?php endif; ?>"
                class="card-link font-weight-bold "><i class="fas fa-arrow-circle-left"></i> Kembali</a></div>
    </div>

</div>

<table class="table table-striped table-responsive" id="data">
    <thead>
        <tr>
            <th>#</th>
            <th style="width:15%">Nis</th>
            <th style="width:40%">Nama</th>
            <th style="width:10%">Kelas</th>
            <th style="width:5%" class="text-center">JB</th>
            <th style="width:5%" class="text-center">THB</th>
            <th style="width:5%" class="text-center">RB</th>
            <th style="width:5%" class="text-center">Finish</th>
            <th style="width:5%" class="text-center">UnFinish</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $reading = $readings->where('users_id',$student->users_id);
        $book = $books->where('users_id',$student->users_id)->get();

        ?>
        <tr>
            <td class="title"><?php echo e($loop->iteration); ?></td>
            <td class="title"><?php echo e($student->nis); ?></td>
            <td><?php echo e($student->name); ?></td>
            <td class="title"><?php echo e($student->nama_kelas); ?></td>
            <td class="text-center">
                <span class=" title font-weight-bold">
                    <?php echo e($book->count('books_id')); ?>

                </span>
            </td>
            <td class="title text-center">
                
            </td>
            <td class="title text-center">
                
            </td>
            <td class="td1 title text-center">
                
                
                
            </td>
            <td class="td1 title text-center">
                
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/reports/ranking.blade.php ENDPATH**/ ?>