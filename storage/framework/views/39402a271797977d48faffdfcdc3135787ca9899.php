
<?php $__env->startSection('title', 'My '.ucfirst(trans($slug)).' Competitions'); ?>
<?php $__env->startSection('content'); ?>

<div>
    <h1>My <?php echo e(ucfirst(trans($slug))); ?> Competitions</h1>
    <div class="row">
        <div class="col-12">
            <div class="row mx-1 my-2">
                <?php $__currentLoopData = $sportTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sportType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/competitions/my-competitions/<?php echo e($slug); ?>/<?php echo e($sportType->name); ?>" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mx-0" style="border: 2px solid">
                    <span> <?php echo e($sportType->name); ?></span>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php $__currentLoopData = $competitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="/competition/<?php echo e($competition->id); ?>">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/<?php echo e($competition->image); ?>" class="w-100 competition-show-banner">
                        <h3 class="mt-1 mb-0"><?php echo e($competition->title); ?></h3>
                        <h5 class="text-black my-0"><i><?php echo e($competition->type); ?></i></h5>
                        <h5 class="mt-0 mb-0 text-black"><u><b>Starts:</b></u> <?php echo e(\Carbon\Carbon::parse($competition->competition_start)->format('d/m/Y H:i')); ?>

                                <?php if($competition->time_zone == 0): ?>
                                (UTC±0)
                                <?php else: ?>
                                (UTC<?php echo e($competition->time_zone); ?>)
                                <?php endif; ?>
                                <h5 class="mt-0 text-black"><u><b>Finishes:</b></u> <?php echo e(\Carbon\Carbon::parse($competition->competition_end)->format('d/m/Y H:i')); ?>

                                    <?php if($competition->time_zone == 0): ?>
                                    (UTC±0)
                                    <?php else: ?>
                                    (UTC<?php echo e($competition->time_zone); ?>)
                                    <?php endif; ?>
                                </h5>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if( $competitions->lastPage() > 1): ?>
        <div class="col-12 d-flex justify-content-center">
            <ul class="pagination">
                <?php ($cur = $competitions->currentPage()); ?>
                <?php ($total = $competitions->lastPage()); ?>
                <?php if($cur-3 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url(1)); ?>">First</a></li><?php endif; ?>
                <?php if($cur-1 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur-1)); ?>"><</a></li><?php endif; ?>
                <?php if($cur-2 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur-2)); ?>"><?php echo e($cur-2); ?></a></li><?php endif; ?>
                <?php if($cur-1 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur-1)); ?>"><?php echo e($cur-1); ?></a></li><?php endif; ?>

                <li class="page-item active"><span class="page-link"><?php echo e($cur); ?></span></li>

                <?php if($cur+1 <= $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur+1)); ?>"><?php echo e($cur+1); ?></a></li><?php endif; ?>
                <?php if($cur+2 <= $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur+2)); ?>"><?php echo e($cur+2); ?></a></li><?php endif; ?>
                <?php if($cur < $total): ?><li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur+1)); ?>">></a></li><?php endif; ?>
                <?php if($cur+2 < $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($total)); ?>">Last</a></li><?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>

    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/own/mycompetitionsshowall.blade.php ENDPATH**/ ?>