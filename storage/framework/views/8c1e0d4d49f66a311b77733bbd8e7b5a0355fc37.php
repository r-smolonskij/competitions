

<?php $__env->startSection('content'); ?>

<form action="/competition/<?php echo e($competition->id); ?>/updating" enctype="multipart/form-data" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <h1>Edit Competition</h1>
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Title</p>
                <input id="title" type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="title" value="<?php echo e(old('title') ?? $competition->title); ?>">

                <?php $__errorArgs = ['title'];
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
                <p class="pb-0 mb-0">Sports Type</p>
                <select class="form-control ml-0 pl-0" id="type" name="type">
                    <?php $__currentLoopData = $sportTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sportType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sportType->name); ?>" <?php echo e($competition->type == $sportType->name ? "selected":""); ?>><?php echo e($sportType->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php $__errorArgs = ['type'];
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
            <!-- <div class="form-group row">
                    <p class="pb-0 mb-0">Result Type</p>
                    <select class="form-control ml-0 pl-0" id="result_type" required name="result_type">
                        <option disabled selected>Select Result Type</option>
                        <option value="time">Time</option>
                        <option value="number">Number</option>
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
                </div> -->

            <div class="form-group row">
                <p class="pb-0 mb-0">Extra URL (Not Required)</p>
                <input id="url" type="text" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="url" value="<?php echo e(old('url') ?? $competition->url); ?>">

                <?php $__errorArgs = ['url'];
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
                <p class="pb-0 mb-0">Contact email</p>
                <input id="contact" type="email" class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="contact" value="<?php echo e(old('contact') ?? $competition->contact); ?>">
                <?php $__errorArgs = ['contact'];
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
                <p class="pb-0 mb-0">Time Zone</p>
                <select class="form-control ml-0 pl-0" id="time_zone" name="time_zone">
                    <option value="-12" <?php echo e($competition->time_zone == "-12" ? "selected":""); ?>>UTC−12:00</option>
                    <option value="-11" <?php echo e($competition->time_zone == "-11" ? "selected":""); ?>>UTC−11:00</option>
                    <option value="-10" <?php echo e($competition->time_zone == "-10" ? "selected":""); ?>>UTC−10:00</option>
                    <option value="-9" <?php echo e($competition->time_zone == "-9" ? "selected":""); ?>>UTC−09:00</option>
                    <option value="-8" <?php echo e($competition->time_zone == "-8" ? "selected":""); ?>>UTC−08:00</option>
                    <option value="-7" <?php echo e($competition->time_zone == "-7" ? "selected":""); ?>>UTC−07:00</option>
                    <option value="-6" <?php echo e($competition->time_zone == "-6" ? "selected":""); ?>>UTC−06:00</option>
                    <option value="-5" <?php echo e($competition->time_zone == "-5" ? "selected":""); ?>>UTC−05:00</option>
                    <option value="-4" <?php echo e($competition->time_zone == "-4" ? "selected":""); ?>>UTC−04:00</option>
                    <option value="-3" <?php echo e($competition->time_zone == "-3" ? "selected":""); ?>>UTC−03:00</option>
                    <option value="-2" <?php echo e($competition->time_zone == "-2" ? "selected":""); ?>>UTC−02:00</option>
                    <option value="-1" <?php echo e($competition->time_zone == "-1" ? "selected":""); ?>>UTC−01:00</option>
                    <option value="0" <?php echo e($competition->time_zone == "0" ? "selected":""); ?>>UTC±00:00</option>
                    <option value="+1" <?php echo e($competition->time_zone == "+1" ? "selected":""); ?>>UTC+01:00</option>
                    <option value="+2" <?php echo e($competition->time_zone == "+2" ? "selected":""); ?>>UTC+02:00</option>
                    <option value="+3" <?php echo e($competition->time_zone == "+3" ? "selected":""); ?>>UTC+03:00</option>
                    <option value="+4" <?php echo e($competition->time_zone == "+4" ? "selected":""); ?>>UTC+04:00</option>
                    <option value="+5" <?php echo e($competition->time_zone == "+5" ? "selected":""); ?>>UTC+05:00</option>
                    <option value="+6" <?php echo e($competition->time_zone == "+6" ? "selected":""); ?>>UTC+06:00</option>
                    <option value="+7" <?php echo e($competition->time_zone == "+7" ? "selected":""); ?>>UTC+07:00</option>
                    <option value="+8" <?php echo e($competition->time_zone == "+8" ? "selected":""); ?>>UTC+08:00</option>
                    <option value="+9" <?php echo e($competition->time_zone == "+9" ? "selected":""); ?>>UTC+09:00</option>
                    <option value="+10" <?php echo e($competition->time_zone == "+10" ? "selected":""); ?>>UTC+10:00</option>
                    <option value="+11" <?php echo e($competition->time_zone == "+11" ? "selected":""); ?>>UTC+11:00</option>
                    <option value="+12" <?php echo e($competition->time_zone == "+12" ? "selected":""); ?>>UTC+12:00</option>
                </select>
                <?php $__errorArgs = ['time_zone'];
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
                <p class="pb-0 mb-0">Competition Start</p>
                <input class="form-control <?php $__errorArgs = ['competition_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="datetime-local" name="competition_start"  value='<?php echo e($competition_start); ?>' step="60">
                <?php $__errorArgs = ['competition_start'];
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
                <p class="pb-0 mb-0">Competition End</p>
                <input class="form-control <?php $__errorArgs = ['competition_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="datetime-local" name="competition_end" id="competition_end" value="<?php echo e($competition_end); ?>">
                <?php $__errorArgs = ['competition_end'];
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
            <div class="form-group row mb-0">
                <p class="pb-0 mb-0">Banner Image</p>
            </div>
            <div class="row mt-0">
                <input type="file" class="form-control-file " id="image"  name="image">
            </div>
            <div class="form-group row">
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <strong class='text-danger'><?php echo e($message); ?></strong>
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
unset($__errorArgs, $__bag); ?>" id="description" required name="description" autocomplete="off"><?php echo e($competition->description); ?></textarea>
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
                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white"><?php echo e(__('Update Competition')); ?></button>
            </div>
        </div>
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/competitions/edit.blade.php ENDPATH**/ ?>