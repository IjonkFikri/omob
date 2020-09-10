
<?php $__env->startSection('title','Data Review'); ?>
<?php $__env->startSection('content'); ?>

<h4>Data Review Buku Kelas <span class=" rounded-pill p-1 shadow-sm bg-info text-light">
    <?php if(!Request::get('level')): ?>
    All
    <?php else: ?> 
    <?php echo e($u->nama_kelas); ?>

    <?php endif; ?>
    
</span></h4>
    <div class="input-group mb-3">
        <div class="input-group-prepend shadow-sm">
          <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fas fa-filter text-black-50"></i></span>
        </div>
        <div class="dropdown show shadow-sm border-left-0" aria-describedby="basic-addon1">
            <?php if(!Request::get('level')): ?>
            <a class="btn btn-light dropdown-toggle" href="<?php echo e(route('review.index')); ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All
              </a>
            <?php else: ?>
            <a class="btn btn-light dropdown-toggle" href="<?php echo e(route('review.index',['level' => $u->id])); ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo e($u->nama_kelas); ?>

              </a>
            <?php endif; ?>
          
            <div class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuLink">
                <?php if(Request::get('level')): ?>
                <a class="dropdown-item" href="<?php echo e(route('review.index')); ?>">All</a>
                <?php endif; ?>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item <?php echo e(Request::get('level') == $data->id ? 'active' : ''); ?>" href="<?php echo e(route('review.index', ['level' => $data->id])); ?>"><?php echo e($data->nama_kelas); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
      </div>

    
      <table class="table table-borderles" id="data">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th><i class="fas fa-book-open text-secondary"></i>Nama Lengkap</th>
               <th><i class="fas fa-list text-secondary"></i>JB</th>
                 <th><i class="fas fa-list text-secondary"></i> Sudah</th>
                <th><i class="fas fa-clock text-secondary"></i> Belum</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($data->name); ?></td>
            <td>
                <?php $countBook = $books->where('users_id',$data->users_id)->where('kelas_id',$data->kelas_id); ?>
                <?php echo e($countBook->count('judul_buku')); ?>

            </td>
                <td>
                    <?php $cReview = $review->whereIn('books_id',$countBook->pluck('id')) ?>
                    <?php echo e($cReview->count('books_id')); ?>

                </td>
                <td>
                    <?php echo e($countBook->count('judul_buku') - $cReview->count('books_id')); ?>

                </td>
                <td>
                <a href="<?php echo e(route('review.show',$data->users_id."-".$data->kelas_id)); ?>" class="btn btn-link text-decoration-none btn-txt">View Detail</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/review/index.blade.php ENDPATH**/ ?>