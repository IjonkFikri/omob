<?php $__env->startSection('title','Report Omob Kelas'); ?>
<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $recaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h4>Report Laporan Kelas</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="col-md-5 mt-2">
            <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#"
                class="alert-link ml-2">THB</a> <small>Total Halaman Buku</small> <a href="#"
                class="alert-link ml-2">RB</a> <small>Riwayat Bacaan</small>
        </div>
        <div class="col-md-7">
            
            <form action="<?php echo e(route('reports.store')); ?>" method="post" class="float-right">
                <?php echo csrf_field(); ?>
                <div class="row">
                        <div class="input-group">
                                <select class="form-control mr-1" name="kelas_id" id="" style="width:8em;">
                                        <option value="">Kelas</option>
                                        <?php $__currentLoopData = $levels->where('units_id',$recap->unit->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id); ?>"><?php echo e($level->nama_kelas); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span> <i class="fa fa-caret-down"></i>
                                        </div>
                                        <input type="hidden" name="daterange" id="date">
                                    
                                    
                        <button type="submit" name="action"  value="cari" class=" ml-2 btn btn-info text-light"><i class="fas fa-search"></i></button>
                        
                    </div>
                </div>
                

            </form>
        </div>
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

        <?php
        $data = $levels->where('units_id',$recap->unit->id)->pluck('id');
        $students = $students->whereIn('kelas_id',$data);
        ?>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $reading = $readings->where('users_id',$student->users_id);
        $book = $books->where('users_id',$student->user->id);
        ?>
        <tr>
            <td class="title"><?php echo e($loop->iteration); ?></td>
            <td class="title"><?php echo e($student->user->nis); ?></td>
            <td><?php echo e($student->user->name); ?></td>
            <td class="title"><?php echo e($student->level->nama_kelas); ?></td>
            <td class="text-center">
                <span class=" title font-weight-bold"><?php echo e($book->count('books_id')); ?></span>
            </td>
            <td class="title text-center"> <?php echo e($book->sum('jumlah_halaman')); ?></td>
            <td class="title text-center"> <?php echo e($reading->sum('total_baca')); ?></td>
            <td class="td1 title text-center">
                <?php if($book->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($book->sum('status',1)); ?> <?php endif; ?> </td> <td
                    class="td1 title text-center">
                    <?php echo e($book->count('jumlah_buku') - $book->sum('status',1)); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($recaps->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/reports/recap.blade.php ENDPATH**/ ?>