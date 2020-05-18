
<?php $__env->startSection('title',  'Competitions History'); ?>
<?php $__env->startSection('content'); ?>

<div class="col-12 ">
    <?php if(count($userCompetitionsResults) > 0): ?>
    <h1 class="text-center">Your Competitions History</h1>
    <table class="table">
        <thead class="thead-dark text-center text-center">
            <tr>
                <th scope="col">Competitions</th>
                <th scope="col">Sport's Type</th>
                <th scope="col">Event</th>
                <th scope="col">Result</th>
                <th scope="col">Place</th>
                <th scope="col">Place In
                    <?php if($user->profile->gender == 'male'): ?>
                    Men
                    <?php elseif($user->profile->gender == 'female'): ?>
                    Women
                    <?php elseif($user->profile->gender == 'other'): ?>
                    Other
                    <?php endif; ?>
                    's Category
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $userCompetitionsResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><a href="/competition/<?php echo e($result->competition->id); ?>"> <?php echo e($result->competition->title); ?></a></td>
                <td><?php echo e($result->competition->type); ?></td>
                <td><a href="/event/<?php echo e($result->event->id); ?>?allResults=1"> <?php echo e($result->event->event); ?></a></td>
                <td><?php echo e($result->result); ?></td>
                <td><?php echo e($result->place); ?></td>
                <td><?php echo e($result->placeByGender); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <div style="margin-top: 30vh">
        <h1 class="text-center ">You haven't competed in any competitions yet! Check out ongoing competitions here: </h1>
        <div class="text-center">
            <a href="/competitions/ongoing" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 mr-3 ml-0" style="border: 2px solid; max-height:60px; ">
                <span class=""> Ongoing Competitions</span>
            </a>
        </div>
    </div>
    <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/history.blade.php ENDPATH**/ ?>