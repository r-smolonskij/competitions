
<?php $__env->startSection('title', 'Virtual Components - '.$user->name); ?>
<?php $__env->startSection('content'); ?>

<div class="row mx-2">
    <div class="col-lg-4 col-md-6">

        <div class="card">
            <div class="card-body">
                <img src="<?php echo e($user->profile->profileImage()); ?>" alt="">
                <h2 class="mt-0 mb-0"><?php echo e($user->name); ?></h2>
                <h3 class="mt-0"><?php echo e(\Carbon\Carbon::parse($user->profile->birthday)->diff(\Carbon\Carbon::now())->format('%y years')); ?> old</h3>

                <?php if(!is_null($user->profile->url)): ?>
                <hr>
                <h3 class="mt-0"><u>Social media link:</u> <a href="<?php echo e($user->profile->url); ?>"><?php echo e($user->profile->url); ?></a></h3>
                <hr>
                <?php endif; ?>
                <?php if(!is_null($user->profile->description)): ?>
                <h3 class="mt-0 mb-0"><u>About <?php echo e($user->name); ?>:</u></h3>
                <h3 class="mt-0"><?php echo e($user->profile->description); ?></h3>
                <?php endif; ?>


            </div>
        </div>


        <!-- <h3 class="mt-0"><?php echo e(\Carbon\Carbon::parse($user->profile->birthday)->diff(\Carbon\Carbon::now())->format('%y years')); ?> old</h3> -->
    </div>
    <div class="col-lg-8 col-md-6 mt-3">
        <div class="row d-flex justify-content-between ">
            <div class="col-lg-3 col-md-5 text-center  mb-3 bg-primary competition-badge">
                <h2 class=" mb-0 mt-1 text-white"><?php echo e($competitionsParticipatedCount); ?></h2>
                <p class=" mt-0 mb-2 text-white">Competitions Participated</p>
            </div>
            <div class="col-lg-3 col-md-5 text-center  mb-3 bg-danger competition-badge">
                <h2 class=" mb-0 mt-1 text-white"><?php echo e($competitionsTOP10Count); ?></h2>
                <p class=" mt-0 mb-2 text-white">TOP-10 Finishes</p>
            </div>
            <div class="col-lg-3 col-md-5 text-center  mb-3 bg-success competition-badge">
                <h2 class=" mb-0 mt-1 text-white"><?php echo e($competitionsTOP3Count); ?></h2>
                <p class=" mt-0 mb-2 text-white">TOP-3 Finishes</p>
            </div>
        </div>
        <h2>Competition history</h2>
        <?php $__currentLoopData = $userCompetitionsResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h4 style="font-family:'Courier New', Courier, monospace ;"><span class="text-dark">
                <?php if($res->placeByGender%10 == 1): ?>
                <?php echo e($res->placeByGender.'st'); ?>

                <?php elseif($res->placeByGender%10 == 2): ?>
                <?php echo e($res->placeByGender.'nd'); ?>

                <?php elseif($res->placeByGender%10 == 3): ?>
                <?php echo e($res->placeByGender.'rd'); ?>

                <?php else: ?>
                <?php echo e($res->placeByGender.'th'); ?>

                <?php endif; ?>
                Place
            </span> at <a href="/competition/<?php echo e($res->competition->id); ?>"><?php echo e($res->competition->title); ?></a>(<a href="/event/<?php echo e($res->event->id); ?>?allResults=1"><?php echo e($res->event->event); ?></a>)</h4>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/profiles/index.blade.php ENDPATH**/ ?>