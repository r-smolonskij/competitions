
<?php $__env->startSection('title', $competition->title); ?>
<?php $__env->startSection('content'); ?>


<?php if($competition->time_zone == 0): ?>
<?php ($t_zone = '(UTC±0)'); ?>
<?php else: ?>
<?php ($t_zone = '(UTC'.$competition->time_zone.')'); ?>
<?php endif; ?>
<div class="row reorder">
    <div class="col-md-9 offset-1" id="competitionCard">
        <div class="card">
            <div class="card-body ">
                <img src="/storage/<?php echo e($competition->image); ?>" class="w-100">
                <h1 class="my-2 "><?php echo e($competition->title); ?></h1>
                <h4 class="mt-0 text-black">
                    <u><b>Starts:</b></u> <?php echo e(\Carbon\Carbon::parse($competition->competition_start)->format('d/m/Y H:i')); ?>

                    <?php echo e($t_zone); ?>

                </h4>
                <h4 class="mt-0 text-black"><u><b>Finishes:</b></u> <?php echo e(\Carbon\Carbon::parse($competition->competition_end)->format('d/m/Y H:i')); ?>

                    <?php echo e($t_zone); ?>

                </h4>
                <h4 class="mt-1 ">
                    <?php echo e($competition->description); ?>

                </h4>
                <br>
                <h5 class="text-dark"><u>Contact for more information:</u> <?php echo e($competition->contact); ?></h5>
                <?php if(!is_null($competition->url)): ?>
                <h4 class="text-dark"><u>Website for more information:</u> <a href="<?php echo e($competition->url); ?>"><?php echo e($competition->url); ?></a></h4>
                <?php endif; ?>
                </h4>
                <?php if($user->id === $competition->user_id): ?>
                <br>
                <br>
                
                <a href="/competition/<?php echo e($competition->id); ?>/edit" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 mr-3 ml-0" style="border: 2px solid; max-height:60px; ">
                    <span class=""> Edit Competition</span>
                </a>
                <a href="/competition/<?php echo e($competition->id); ?>/event/create" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 mr-3 ml-0" style="border: 2px solid; max-height:60px; ">
                    <span class=""> Add Event</span>
                </a>
                <a href="/competition/<?php echo e($competition->id); ?>/destroy" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 ml-0" style="border: 2px solid; max-height:60px; ">
                    <span class=""> Delete Competition</span>
                </a>
                <?php endif; ?>

                <?php if(count($events)>0): ?>
                <h2 class="mb-4">Events: </h2>
                <div class="row d-flex justify-content-between mx-5">
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-5 text-center btn-event d-flex align-items-center justify-content-center mb-3 px-0 ">
                        <a href="/event/<?php echo e($event->id); ?>?allResults=1">
                            <div>
                                <span class="w-100  my-1 text-uppercase" style="font-size: 32px; word-wrap:break-word"><?php echo e($event->event); ?></span>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-2 d-flex mb-3 justify-content-end">
        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; ">
            <span class="px-3"> Go Back</span>
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/show.blade.php ENDPATH**/ ?>