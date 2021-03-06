
<?php $__env->startSection('title', 'My Organized Competitions'); ?>
<?php $__env->startSection('content'); ?>

<?php if(count($myorganizedongoingcompetitions) == 0 && count($myorganizedfinishedcompetitions) == 0 && count($myorganizedupcomingcompetitions) == 0 ): ?> 
<div class="row align-items-center" style="min-height: 100vh">
    <div class="col-12">
        <h1 class="mb-0">You never organized any competitions!</h1>
        <h1 class="mt-1">Do you want to start with your first one? </h1>

        <a href="/competition/create" class="btn btn-lg wide btn-solid btn-light text-uppercase " style="border: 2px solid; ">
            <span> Create competitions now</span>
        </a>
    </div>
</div>
<?php endif; ?>
<div>
    <?php if(count($myorganizedongoingcompetitions)>0): ?>
    <div>
        <div class="row d-flex align-items-center mb-3">
            <div class=" col-md-8">
                <h1>My Organized Ongoing Competitions</h1>
            </div>
            <div class="col-md-4 d-flex  justify-content-md-end">
                <a href="/competitions/my-competitions/ongoing" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:80px; ">
                    <span> See All</span>
                </a>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $myorganizedongoingcompetitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/competition/<?php echo e($competition->id); ?>">
                    <div class="card">
                        <div class="card-body">
                            <img src="/storage/<?php echo e($competition->image); ?>" class="w-100 competition-show-banner">
                            <h3 class="mt-1 mb-0"><?php echo e($competition->title); ?></h3>
                            <h5 class="text-black my-0"><i><?php echo e($competition->type); ?></i></h5>
                            <!-- $competition->competition_start -->
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

        </div>
    </div>
    <?php endif; ?>
    <?php if(count($myorganizedupcomingcompetitions)>0): ?>
    <div>
        <div class="row d-flex align-items-center mb-3">
            <div class=" col-md-8">
                <h1>My Organized Upcoming Competitions</h1>
            </div>
            <div class="col-md-4 d-flex  justify-content-md-end">
                <a href="/competitions/my-competitions/upcoming" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:80px; ">
                    <span> See All</span>
                </a>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $myorganizedupcomingcompetitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/competition/<?php echo e($competition->id); ?>">
                    <div class="card">
                        <div class="card-body">
                            <img src="/storage/<?php echo e($competition->image); ?>" class="w-100 competition-show-banner">
                            <h3 class="mt-1 mb-0"><?php echo e($competition->title); ?></h3>
                            <h5 class="text-black my-0"><i><?php echo e($competition->type); ?></i></h5>
                            <!-- $competition->competition_start -->
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

        </div>
    </div>
    <?php endif; ?>
    <?php if(count($myorganizedfinishedcompetitions)>0): ?>
    <div>
        <div class="row d-flex align-items-center mb-3">
            <div class=" col-md-8">
                <h1>My Organized Finished Competitions</h1>
            </div>
            <div class="col-md-4 d-flex  justify-content-md-end">
                <a href="/competitions/my-competitions/finished" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:80px; ">
                    <span> See All</span>
                </a>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $myorganizedfinishedcompetitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/competition/<?php echo e($competition->id); ?>">
                    <div class="card">
                        <div class="card-body">
                            <img src="/storage/<?php echo e($competition->image); ?>" class="w-100 competition-show-banner">
                            <h3 class="mt-1 mb-0"><?php echo e($competition->title); ?></h3>
                            <h5 class="text-black my-0"><i><?php echo e($competition->type); ?></i></h5>
                            <!-- $competition->competition_start -->
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

        </div>
    </div>
    <?php endif; ?>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/own/mycompetitions.blade.php ENDPATH**/ ?>