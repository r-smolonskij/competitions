<?php $__env->startSection('title', 'CoachApp - Sign In'); ?>
<?php $__env->startSection('content'); ?>
<section class="section pt-70 pb-70 d-flex flex-column justify-content-center" data-enable-fullheight="true" style="background-image: url(https://images.pexels.com/photos/207779/pexels-photo-207779.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);" data-parallax-bg="true" style="">
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center" style="margin-bottom: 200px">
            <div class="col-md-6" style="max-width: 350px">
                <div class="card">
                    <div class="card-header text-center ">
                        <h2 class="my-2">Sign In</h2>
                    </div>
                    <div class="contact-form contact-default contact-default-alt2 px-5">
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row justify-content-center">
                                <p class="col-md-12 mb-30"><span class="form-group"><input id="email" type="email" class="form-control " name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email" autofocus></span></p>
                                <p class="col-md-12 mb-30"><span class="form-group"><input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Password"></span></p>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="col-md-12 mb-30 text-danger">Invalid email address and/or password!</p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <!-- <p class="col-md-12 mb-30 "><span class="form-group"><input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <span class="pl-3">Remember Me</span></span></p> -->
                                <div class="col-md-12 mb-30 justify-content-center">
                                    <button type="submit" class="form-control m-auto"><?php echo e(__('Login')); ?></button>
                                </div>
                                <a class="text-primary my-2" href="/register">Don't have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/auth/login.blade.php ENDPATH**/ ?>