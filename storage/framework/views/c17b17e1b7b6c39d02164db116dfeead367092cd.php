

<?php $__env->startSection('content'); ?>

<div>
    <div class="row align-items-center mb-3">
        <div class=" col-md-8">
            <h1 class="" style="word-wrap: break-word;">Upcoming <?php echo e($type->name); ?> Competitions</h1>
        </div>
        <div class="col-md-4 d-flex  justify-content-md-end"">
            <a href="/competitions/upcoming" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:80px; ">
            <span> Go Back</span>
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="row mx-1 my-2">
            </div>
        </div>
        <?php $__currentLoopData = $competitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- <h1><?php echo e($competition->title); ?></h1> -->
        <div class=" col-lg-4 col-md-6 mb-4">
            <a href="/competition/<?php echo e($competition->id); ?>">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/<?php echo e($competition->image); ?>" class="w-100 competition-show-banner">
                        <h3 class="mt-1 mb-0"><?php echo e($competition->title); ?></h3>
                        <h5 class="text-black my-0"><i><?php echo e($competition->type); ?></i></h5>
                        <h5 class="mt-0"><span class="text-black"><i class="far fa-clock"></i> <?php echo e($competition->competition_start); ?></span></h5>
                    </div>
                </div>
            </a>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/upcomingshowbytype.blade.php ENDPATH**/ ?>