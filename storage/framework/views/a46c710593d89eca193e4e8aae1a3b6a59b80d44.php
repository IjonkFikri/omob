
<?php $__env->startSection('title','Riwayat Bacaan'); ?>
<?php $__env->startSection('content'); ?>
<h4>Riwayat Bacaan</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <i class="fas fa-info-circle mr-2"></i>
    <a href="#" class="alert-link">JH</a> <small>Jumlah Halaman</small> <a href="#" class="alert-link ml-2">RB</a>
    <small>Riwayat Bacaan</small>
</div>
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th class="td1">#</th>
            <th style="width:8rem;">Kelas</th>
            <th> <i class="fas fa-bookmark "></i> Judul Buku</th>
            <th class="td1">JH</th>
            <th class="td1">RB</th>
            <th class="td1 text-center"><i class="fas fa-percentage "></i></th>
            <th class="td1">Status</th>
            <th class="" style="width:15rem;"><i class="fas fa-tools "></i> Action</th>
        </tr>
    </thead>
    <tbody>
    <tbody>

        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $readings = App\Reading::where('books_id',$book->id)->get();
        ?>
        <tr>
            <td class="btn-text"><?php echo e($loop->iteration); ?></td>
            <td class="btn-text"><?php echo e($book->level->nama_kelas); ?></td>
            <td class="text-judul"><?php echo e($book->judul_buku); ?></td>
            <td class="btn-text"><?php echo e($book->jumlah_halaman); ?></td>
            <td class="btn-text">
                <?php echo e($readings->sum('total_baca')); ?>

            </td>
            <td class="btn-text">
                <?php echo e(round(($readings->sum('total_baca')/$book->jumlah_halaman)*100)); ?>

            </td>
            <td>
                <?php if($review->where('books_id',$book->id)->isNotEmpty()): ?>
                <span class="badge badge-soft-success">Finish</span>
                <?php else: ?>
                <span class="badge badge-soft-danger">Unfinish</span>
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo e(route('readings.show',$book->id)); ?>" class="mr-2 btn-text"> <i
                        class="fas fa-eye text-primary"></i> Detail</a>
                
                <?php echo csrf_field(); ?>
                <?php if(($book->jumlah_halaman == $readings->sum('total_baca')) &&
                ($review->where('books_id',$book->id)->count() >= 1)): ?>
                <i class="fas fa-check-circle text-success"></i> <span class="btn-text">Selesai</span>
                <?php elseif(($review->where('books_id',$book->id)->count() == 0) && ($book->jumlah_halaman ==
                $readings->sum('total_baca'))): ?>
                <!-- Button trigger modal -->
                <a href="#" data-toggle="modal" data-target="#modelId" class="btn-text"><i class="far fa-clipboard"></i>
                    Review</a>
                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h6 class="btn-text">Judul Buku</h6>
                                    <small class=""><?php echo e($book->judul_buku); ?></small>
                                </div>
                                <form action="savereview" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make('inc/form/_formReview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <input type="submit" value="Save Review" class="btn btn-primary">
                                </form>
                            </div>
                            

                        </div>
                    </div>
                </div>

                <?php else: ?>
                <a href="/create/<?php echo e($book->id); ?>" class="btn-text"> <i class="fas fa-plus-circle text-info"></i> Add
                    Bacaan</a>
                <?php endif; ?>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </tbody>
</table>
<?php echo e($books->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/readings/index.blade.php ENDPATH**/ ?>