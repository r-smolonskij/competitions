
<?php $__env->startSection('title', ucfirst(trans($slug1)).' '.$type->name.' Competitions'); ?>
<?php $__env->startSection('content'); ?>



<div class="row align-items-center mb-3">
    <?php if(count($competitions)>0): ?>
    <div class=" col-md-8">
        <h1 class="" style="word-wrap: break-word;"><?php echo e(ucfirst(trans($slug1))); ?> <?php echo e($type->name); ?> Competitions</h1>
    </div>
    <div class="col-md-4 d-flex  justify-content-md-end"">
            <a href='<?php echo e(url()->previous()); ?>' class=" btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style=" border: 2px solid; max-height:80px; ">
            <span> Go Back</span>
            </a>
    </div>
    <?php endif; ?>


    <div class=" row w-100">

        <div class="col-12">
            <div class="row mx-1 my-2">
            </div>
        </div>
        <?php if(count($competitions)>0): ?>
        <?php $__currentLoopData = $competitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($competition->time_zone == 0): ?>
        <?php ($t_zone = '(UTC±0)'); ?>
        <?php else: ?>
        <?php ($t_zone = '(UTC'.$competition->time_zone.')'); ?>
        <?php endif; ?>
        <div class=" col-lg-4 col-md-6 mb-4">
            <a href="/competition/<?php echo e($competition->id); ?>">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/<?php echo e($competition->image); ?>" class="w-100 competition-show-banner">
                        <h3 class="mt-1 mb-0"><?php echo e($competition->title); ?></h3>
                        <h5 class="text-black my-0"><i><?php echo e($competition->type); ?></i></h5>
                        <h5 class="mt-0 mb-0 text-black"><u><b>Starts:</b></u> <?php echo e(\Carbon\Carbon::parse($competition->competition_start)->format('d/m/Y H:i')); ?>

                            <?php echo e($t_zone); ?>

                            <h5 class="mt-0 text-black"><u><b>Finishes:</b></u> <?php echo e(\Carbon\Carbon::parse($competition->competition_end)->format('d/m/Y H:i')); ?>

                                <?php echo e($t_zone); ?>

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
                <?php if($cur-1 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur-1)); ?>">
                        <</a> </li><?php endif; ?> <?php if($cur-2> 0): ?>
                <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur-2)); ?>"><?php echo e($cur-2); ?></a></li><?php endif; ?>
                <?php if($cur-1 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur-1)); ?>"><?php echo e($cur-1); ?></a></li><?php endif; ?>

                <li class="page-item active"><span class="page-link"><?php echo e($cur); ?></span></li>

                <?php if($cur+1 <= $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur+1)); ?>"><?php echo e($cur+1); ?></a></li><?php endif; ?>
                    <?php if($cur+2 <= $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur+2)); ?>"><?php echo e($cur+2); ?></a></li><?php endif; ?>
                        <?php if($cur < $total): ?><li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($cur+1)); ?>">></a></li><?php endif; ?>
                            <?php if($cur+2 < $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($competitions->url($total)); ?>">Last</a></li><?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <div style="margin-top: 30vh">
            <h1 class="text-center px-3">There are no <?php echo e(ucfirst(trans($slug1))); ?> <?php echo e($type->name); ?> Competitions at this point! Check out later or make your own Competitions here:</h1>
            <div class="col-12 d-flex justify-content-center">
                <a href='/competition/create' class=" btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style=" border: 2px solid; max-height:80px; ">
                    <span> Create Competitions</span>
                </a>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/public/showbytype.blade.php ENDPATH**/ ?>