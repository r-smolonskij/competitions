

<?php $__env->startSection('content'); ?>




<form action="/event/<?php echo e($event->id); ?>/updating" enctype="multipart/form-data" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row">
                <div class="col-12 text-center mb-0">
                    <h1 class="mb-0">"<?php echo e($competition->title); ?>"</h1>
                    <h2 class="my-0">"<?php echo e($event->event); ?>"</h2>
                </div>
                <div class="col-12 mt-0">
                    <h2>Update Event</h2>
                </div>


            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Event Title</p>
                <input id="title" type="text" class="form-control <?php $__errorArgs = ['event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="event" value="<?php echo e($event->event); ?>">

                <?php $__errorArgs = ['event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
           
            <div class="form-group row">
                    <p class="pb-0 mb-0">Result Type</p>
                    <select class="form-control ml-0 pl-0" id="result_type" required name="result_type">
                        <option disabled>Select Result Type</option>
                        <option value="time" <?php echo e($event->result_type == "time" ? "selected":""); ?>>Time</option>
                        <option value="number" <?php echo e($event->result_type == "number" ? "selected":""); ?>>Number</option>
                    </select>
                    <?php $__errorArgs = ['result_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group row">
                <p class="pb-0 mb-0">Unit Of Measurment(If your result type is 'Time' then this field is not needed)</p>
                <input id="unit_of_measurment" maxlength="12" type="text" class="form-control <?php $__errorArgs = ['unit_of_measurment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="unit_of_measurment" value="<?php echo e($event->unit_of_measurment); ?>">

                <?php $__errorArgs = ['unit_of_measurment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Description</p>
                <textarea rows=10 class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" required name="description" autocomplete="off" ><?php echo e($event->description); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group row">
                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white"><?php echo e(__('Update Event')); ?></button>
            </div>
        </div>
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/events/edit.blade.php ENDPATH**/ ?>