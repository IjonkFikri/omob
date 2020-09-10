<?php $__env->startSection('title','Report Omob Kelas'); ?>
<?php $__env->startSection('content'); ?>


<?php $teachers = $teachers->where('users_id',Auth::user()->id); ?>


<h4>Report Laporan Kelas</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="col-md-5">
            <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JH</a> <small>Jumlah Halaman</small> <a href="#"
                class="alert-link ml-2">THB</a> <small>Total Halaman Baca</small> <a href="#"
                class="alert-link ml-2">RB</a> <small>Riwayat Bacaan</small>
        </div>
        <div class="col-md-7">
            <form action="<?php echo e(route('reports.store')); ?>" method="post" class="float-right">
                <?php echo csrf_field(); ?>
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="input-group" style="position: relative; top:-.1em;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i
                                    class="fas fa-filter text-info"></i></span>
                        </div>
                        <input type="hidden" name="kelas_id" id="" value="<?php echo e($teacher->kelas_id); ?>">
                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                            <input type="hidden" name="daterange" id="date" value="">
                        
                        
                        <button type="submit" class=" ml-2 btn btn-info text-light"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                

            </form>
        </div>
    </div>
</div>
<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th style="width:10%">Nis</th>
            <th style="width:35%">Nama</th>
            <th style="width:10%">Kelas</th>
            <th style="width:5%" class="text-center">JB</th>
            <th class="text-center">THB</th>
            <th class="text-center">RB</th>
            <th class="text-center">Finish</th>
            <th class="text-center">UnFinish</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $students->where('kelas_id',$teacher->kelas_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="title"><?php echo e($loop->iteration); ?></td>
            <td class="title"><?php echo e($student->user->nis); ?></td>
            <td><?php echo e($student->user->name); ?></td>
            <td class="title"><?php echo e($student->level->nama_kelas); ?></td>
            
            <?php $books = App\Book::where('users_id',$student->user->id)->where('kelas_id',$teacher->kelas_id)->get();
            // query reading
            $reading = App\Reading::where('users_id',$student->user->id)->where('kelas_id',$teacher->kelas_id)->get();
            ?>
            <td>
                <a href="#" data-toggle="modal" data-target="#detailData-<?php echo e($student->user->id); ?>"><button
                        class="btn btn-info">
                        <i class="fas fa-eye text-light"></i> <span
                            class=" text-light font-weight-bold"><?php echo e($books->count('judul_buku')); ?></span>
                    </button></a>

                <!-- Modal -->
                <div class="modal fade" id="detailData-<?php echo e($student->user->id); ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width:50em;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> <?php echo e($student->user->name); ?> -
                                    <?php echo e($student->user->nis); ?> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-info top-border mt-4" role="alert">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <a href="#" class="alert-link">JH</a> <small>Jumlah Halaman</small>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th class="td1">JH</th>
                                            <th class="td1">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($book->judul_buku); ?></td>
                                            <td class="title"><?php echo e($book->jumlah_halaman); ?></td>
                                            <td>
                                                <?php if($book->status == 1): ?>
                                                <span class="badge badge-success">Finish</span>
                                                <?php else: ?>
                                                <span class="badge badge-danger">Unfinish</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="title text-center"> <?php echo e($books->sum('jumlah_halaman')); ?></td>
            <td class="title text-center"> <?php echo e($reading->sum('total_baca')); ?></td>
            <td class="td1 title text-center">
                <?php if($books->sum('status',1) < 1): ?> 0 <?php else: ?> <?php echo e($books->sum('status',1)); ?> <?php endif; ?> </td> <td
                    class="td1 title text-center">
                    <?php echo e($books->count('jumlah_buku') - $books->sum('status',1)); ?></td>
            <td>
                <a href="<?php echo e(route('reports.detail',['id'=>$student->user->id,'kelas_id'=>$teacher->kelas_id])); ?>"
                    class="text-dark mr-2 card-link font-weight-bold"> <i class="fas fa-eye text-primary"></i> View</a>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/reports/index.blade.php ENDPATH**/ ?>