
<?php $__env->startSection('title','Dashboard Administrator'); ?>
<?php $__env->startSection('content'); ?>


<div class="mt-5">
    <div class="my-4 mx-3">
        <strong style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
                class="fas fa-tachometer-alt" style="color:#f9ca24;"></i>&nbsp; <?php echo $__env->yieldContent('title'); ?></strong>
    </div>

    <div class="row mt-4 text-center m-auto">

        <div class="container">
            <div class="row">
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-users my-4" style="color:#f9ca24; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2> <?php echo e($students->count()); ?><h2>
                    </div>
                    <p class="title mt-2">Jumlah Siswa</p>
                </div>
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book my-4" style="color:#70a1ff; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2> <?php echo e($books->count()); ?> <h2>
                    </div>
                    <p class="title mt-2">Total Buku</p>
                </div>
                
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-smile-wink my-4" style="color:#2ed573; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            <?php if($books->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($books->sum('status',1)); ?> <?php endif; ?> </h2> </div> <p
                                class="title mt-2">Total Finish</p>
                    </div>
                    
                    <div class="col-sm card mx-1 my-1">
                        <i class="fas fa-sad-cry my-4" style="color:#ff4757; font-size: 2.8em;"></i>
                        <div class="my-4">
                            <h2>
                                <?php echo e($books->count('judul_buku') - $books->sum('status',1)); ?>

                            </h2>
                        </div>
                        <p class="title mt-2">Total Unfinish</p>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <strong class="float-left mb-3"
                    style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
                        class="fas fa-book-open" style="color:#badc58;"></i>&nbsp;Data History Reading</strong>
                <div class="tabel-rekap" style="height: 50em; width:78em; overflow-y:auto;">
                    <table class="table table-borderless table-responsive table-hover bg-white" style="width:100%;">
                        <thead style="text-align: center; background-color:#dff9fb !important;">
                            <tr>
                                <th>#</th>
                                <th style="width:50%;">Kelas</th>
                                <th>Siswa</th>
                                <th>Books</th>
                                <th>Finish</th>
                                <th>Unfinish</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center; font-family: 'Nunito Sans', sans-serif; font-weight:bold;">
                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($level->nama_kelas); ?></td>
                                <td style="width:30%;">
                                    
                                    <?php
                                    $students =App\Student::where('kelas_id',$level->id);
                                    // print_r($students);
                                    ?>
                                    
                                    <?php echo e($students->count()); ?>

                                </td>
                                <td style="width:10%;">
                                    <?php
                                    $booksTotal = App\Book::select('*')->where('kelas_id',$level->id)->get();
                                    ?>
                                    <?php echo e($booksTotal->count()); ?>

                                </td>
                                <td style="width:10%;">
                                    <?php
                                    $booksFinish = App\Book::select('*')->where('status',1)->where('kelas_id',$level->id)->get();
                                    ?>
                                    <?php echo e($booksFinish->count()); ?>

                                </td>
                                <td style="width:10%;">
                                    <?php echo e($booksTotal->count() - $booksFinish->count()); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>