<?php $__env->startSection('title','Dashboard Siswa'); ?>
<?php $__env->startSection('content'); ?>

<?php if($students->count() == 0): ?>
<div class="mt-5">

    <div class="card m-auto" style="width:20rem;">
        <form action="/tambahkelas" method="post" class="my-4 mx-4">
            <h6 class="my-3 title">Tingkatan Kelas</h6>
            <?php echo method_field('POST'); ?>
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('inc/form/_formStudentCreateLevel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php else: ?>
<div class="mt-5">
    <div class="my-4 mx-3">
        <strong style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
                class="fas fa-tachometer-alt" style="color:#f9ca24;"></i>&nbsp;Dashboard Siswa</strong>
    </div>
    <div class="row mt-4 text-center m-auto">
        <div class="container">
            <div class="row d-flex">
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book my-4" style="color:#70a1ff; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2> <?php echo e($books->count()); ?> <h2>
                    </div>
                    <p class="title mt-4">Total Buku</p>

                </div>

                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book-reader mt-4" style="color:#f9ca24; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <div class="input-group">
                            <div class="alert alert-info top-border mr-2 ml-4">
                                <label>Sudah</label>
                                <h4><?php echo e($readings->sum('total_baca')); ?></h4>
                            </div>

                            <div class="alert alert-info top-border">
                                <label for="">Belum</label>
                                <h4> <?php echo e($books->sum('jumlah_halaman') - $readings->sum('total_baca')); ?> </h4>
                            </div>
                        </div>
                    </div>
                    <p class="title" style="margin-top:-6%;">Total Halaman</p>

                </div>

                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-smile-wink my-4" style="color:#2ed573; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            
                            <?php if($review->isEmpty()): ?> 
                            0
                            <?php else: ?>
                            
                            <?php echo e($review->whereIn('books_id',$books->pluck('id'))->count()); ?>

                            <?php endif; ?>
                        </h2>
                    </div>
                    <p class="title mt-4">Total Finish</p>
                  
                </div>
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-sad-cry my-4" style="color:#ff4757; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            <?php echo e(($books->count('jumlah_buku') )- ($review->whereIn('books_id',$books->pluck('id'))->count())); ?>

                        </h2>
                    </div>
                    <p class="title mt-4">Total Unfinish</p>
                    
                </div>
            </div>
            <div class="row d-block">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-light shadow-sm my-3">
                       <small class="btn-text"><i class="fas fa-tags text-secondary"></i>&nbsp;Review Buku Bacaan</small>
                        <span class="text-black-50 btn-text mr-3">Status</span>
                      </li>
                      <div class="scroll p-2">
                      <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center mt-1 shadow-sm border-0">
                       
                       <?php echo e($book->judul_buku); ?> &nbsp;
                            <?php if($review->where('books_id',$book->id)->isEmpty()): ?> 
                            <span class="badge badge-danger p-2 shadow-sm">Belum</span>
                            <?php else: ?>
                            <span class="badge badge-success p-2 shadow-sm">Sudah</span>
                            <?php endif; ?>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </div>
                  </ul>
            </div>

        </div>

        
    </div>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/dashboard/student.blade.php ENDPATH**/ ?>