
<?php $__env->startSection('title','Dashboard Recap'); ?>
<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $recaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="mt-5">
    <div class="my-4 mx-3">
        <strong style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
        class="fas fa-tachometer-alt" style="color:#f9ca24;"></i>&nbsp; <?php echo $__env->yieldContent('title'); ?> - <?php echo e($recap->unit->nama_unit); ?></strong>
    </div>

    <div class="row mt-4 text-center m-auto">
       
        <div class="container">
            <div class="row">
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-users my-4" style="color:#f9ca24; font-size: 2.8em;"></i>
                    <div class="my-4">
                    <h2>
                            <?php
                                // get data siswa berdasarkan unit dan level 
                                $data    = $levels->where('units_id',$recap->unit->id)->pluck('id');
                                $student = $students->whereIn('kelas_id',$data);
                                // get data buku berdasarkan unit dan level 
                                $book = $books->whereIn('kelas_id',$data);
                            ?>
                            <?php echo e($student->count()); ?>

                    <h2>
                    </div>
                    <p class="title mt-2">Jumlah Siswa</p>
                </div>
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book my-4" style="color:#70a1ff; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            <?php echo e($book->count()); ?>

                        <h2>
                    </div>
                    <p class="title mt-2">Total Buku</p>
                </div>
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-smile-wink my-4" style="color:#2ed573; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            <?php if($book->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($book->sum('status',1)); ?> <?php endif; ?> 
                        </h2> 
                        </div> <p class="title mt-2">Total Finish</p>
                    </div>
                    
                    <div class="col-sm card mx-1 my-1">
                        <i class="fas fa-sad-cry my-4" style="color:#ff4757; font-size: 2.8em;"></i>
                        <div class="my-4">
                            <h2>
                                <?php echo e($book->count('judul_buku') - $book->sum('status',1)); ?>

                            </h2>
                        </div>
                        <p class="title mt-2">Total Unfinish</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/dashboard/recap.blade.php ENDPATH**/ ?>