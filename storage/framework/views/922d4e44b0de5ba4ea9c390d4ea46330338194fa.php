

<?php $__env->startSection('content'); ?>


<div style="min-height: 100vh">
    <div class="row align-items-center reorder">
        <div class="col-md-12  text-center " id="eventTitle">
            <h1>"<?php echo e($competition->title); ?>"</h1>
        </div>
        <!-- <div class="col-md-3 d-flex  justify-content-end" >
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; "  >
                <span class="px-3"> Go Back</span>
            </a>
        </div> -->
    </div>

    <div class="row align-items-start">
        <div class="col-lg-4 text-center">
            <h2 class="my-0"><?php echo e($event->event); ?></h2>
            <h4 class="mt-1"><?php echo e($event->description); ?></h4>
            <?php if($competition->user_id == $user->id): ?>
            <a href="/event/<?php echo e($event->id); ?>/edit" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; ">
                <span class="px-3"> EDIT EVENT</span>
            </a>
            <a href="/event/<?php echo e($event->id); ?>/destroy" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; ">
                <span class="px-3"> DELETE EVENT</span>
            </a>
            <br>
            <br>
            <?php endif; ?>
            <div class="row">
                <?php if($place != 0 && $placeByGender !=0): ?>
                <div class=" col-10 offset-1 text-center  my-3 bg-primary competition-badge">
                    <h2 class=" mb-0 mt-1 text-white">
                        <?php if($place%10 == 1): ?>
                        <?php echo e($place.'st'); ?>

                        <?php elseif($place%10 == 2): ?>
                        <?php echo e($place.'nd'); ?>

                        <?php elseif($place%10 == 3): ?>
                        <?php echo e($place.'rd'); ?>

                        <?php else: ?>
                        <?php echo e($place.'th'); ?>

                        <?php endif; ?>
                        Place
                    </h2>
                    <p class=" mt-0 mb-2 text-white">From All Participants</p>
                </div>
                <div class=" col-10 offset-1 text-center  my-3 bg-warning competition-badge">
                    <h2 class=" mb-0 mt-1 text-white">
                        <?php if($placeByGender%10 == 1): ?>
                        <?php echo e($placeByGender.'st'); ?>

                        <?php elseif($placeByGender%10 == 2): ?>
                        <?php echo e($placeByGender.'nd'); ?>

                        <?php elseif($placeByGender%10 == 3): ?>
                        <?php echo e($placeByGender.'rd'); ?>

                        <?php endif; ?>
                        Place
                    </h2>
                    <p class=" mt-0 mb-2 text-white">
                        <?php if($user_profile->gender == 'female'): ?>Women
                        <?php elseif($user_profile->gender == 'male'): ?>Men
                        <?php elseif($user_profile->gender == 'other'): ?>Other
                        <?php endif; ?>
                        's category</p>
                </div>
                <?php endif; ?>
                <?php if($place == 0 && $placeByGender ==0): ?>
                <form action="/event/<?php echo e($event->id); ?>/result-add" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="col-10 offset-1 text-center  my-3 ">
                        <h2 class="mb-0">Add Your Result</h2>
                        <?php if($event->result_type == 'time'): ?>
                        <div class="form-group row ">
                            <div class="col-4">
                                <p class="pb-0 mb-0">Hours</p>
                                <input id="hours" type="number" min="0" class="text-center form-control <?php $__errorArgs = ['hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="hours" value="0">
                            </div>
                            <div class="col-4">
                                <p class="pb-0 mb-0">Minutes</p>
                                <input id="minutes" type="number" min="0" max="59" class="text-center form-control <?php $__errorArgs = ['event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="minutes" value="0">
                            </div>
                            <div class="col-4">
                                <p class="pb-0 mb-0">Seconds</p>
                                <input id="seconds" type="number" min="0" max="59" class="text-center form-control <?php $__errorArgs = ['event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="seconds" value="0">
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group d-flex justify-content-start align-items-center">
                            <div class="col-4 pl-0 pr-1 text-left">
                                <p class="pb-0 mb-0">Result</p>
                                <input id="number_result" type="number" min="0" class="text-center form-control <?php $__errorArgs = ['number_result'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="number_result" value="0">
                            </div>
                            <div class="col-8 pl-0 text-left">
                                <p class="mb-0" style="font-size: 20px; padding-top: 33px; word-break: break-word; "><?php echo e($event->unit_of_measurment); ?></p>
                            </div>

                        </div>

                        <?php endif; ?>
                        <div class="form-group row mt-2 " style="padding-left: 15px">
                            <p class="pb-0 mb-0">Proof URL</p>
                            <input id="proof_url" type="text" class="form-control <?php $__errorArgs = ['proof_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="proof_url">
                            <?php $__errorArgs = ['proof_url'];
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
                        <div class="form-group row" style="padding-left: 15px">
                            <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white"><?php echo e(__('Add Result')); ?></button>
                        </div>
                    </div>
                </form>
                <?php else: ?>
                <div class="col-12">
                    <form action="/event/<?php echo e($event->id); ?>/<?php echo e($user_result->id); ?>/result-update" enctype="multipart/form-data" method="post" class="w-100">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class=" offset-1 text-center  my-3 ">
                            <h2 class="mb-0">Update Your Result</h2>
                            <?php if($event->result_type == 'time'): ?>
                            <div class="d-none">
                                <?php echo e($user_result_hours = intval(date('H', strtotime($user_result->time_result))),
                                $user_result_minutes = intval(date('i', strtotime($user_result->time_result))),
                                $user_result_seconds = intval(date('s', strtotime($user_result->time_result)))); ?>

                            </div>
                            <div class="form-group row w-100 mx-0">
                                <div class="col-4 px-0 pr-1">
                                    <p class="pb-0 mb-0">Hours</p>
                                    <input style="padding-left: 2px; padding-right:2px" id="hours" type="number" min="0" class="text-center form-control <?php $__errorArgs = ['hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="hours" value="<?php echo e($user_result_hours); ?>">
                                </div>
                                <div class="col-4 px-1">
                                    <p class="pb-0 mb-0">Minutes</p>
                                    <input style="padding-left: 2px; padding-right:2px" id="minutes" type="number" min="0" max="59" class="text-center form-control <?php $__errorArgs = ['event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="minutes" value="<?php echo e($user_result_minutes); ?>">
                                </div>
                                <div class="col-4 px-0 pl-1">
                                    <p class="pb-0 mb-0">Seconds</p>
                                    <input style="padding-left: 2px; padding-right:2px" id="seconds" type="number" min="0" max="59" class="text-center form-control <?php $__errorArgs = ['event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="seconds" value="<?php echo e($user_result_seconds); ?>">
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="form-group d-flex justify-content-start align-items-center w-100">
                                <div class="col-4 pl-0 pr-1 text-left">
                                    <p class="pb-0 mb-0">Result</p>
                                    <input id="number_result" type="number" min="0" class="text-center form-control <?php $__errorArgs = ['number_result'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="off" name="number_result" value="<?php echo e($user_result->number_result); ?>">
                                </div>
                                <div class="col-8 pl-0 text-left">
                                    <p class="mb-0" style="font-size: 20px; padding-top: 33px; word-break: break-word; "><?php echo e($event->unit_of_measurment); ?></p>
                                </div>

                            </div>

                            <?php endif; ?>
                            <div class="form-group row mt-2 w-100 mx-0">
                                <p class="pb-0 mb-0">Proof URL</p>
                                <input id="proof_url" type="text" class="form-control <?php $__errorArgs = ['proof_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="proof_url" value="<?php echo e($user_result->proof_url); ?>">
                                <?php $__errorArgs = ['proof_url'];
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
                            <div class="form-group row w-100 mx-0">
                                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white"><?php echo e(__('Update Result')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>


            </div>


        </div>
        <div class="col-lg-8">
            <div class="container">
                <div class='d-none'>
                    <?php ($active_list = '0'); ?>
                    <?php if( strpos($_SERVER['REQUEST_URI'], 'allResults') !== false): ?>{
                    <?php echo e($active_list = 1); ?>

                    }
                    <?php elseif( strpos($_SERVER['REQUEST_URI'], 'femaleResults') !== false): ?>{
                    <?php echo e($active_list = 2); ?>

                    }
                    <?php elseif( strpos($_SERVER['REQUEST_URI'], 'maleResults') !== false): ?>{
                    <?php echo e($active_list = 3); ?>

                    }
                    <?php elseif( strpos($_SERVER['REQUEST_URI'], 'othersResults') !== false): ?>{
                    <?php echo e($active_list = 4); ?>

                    }
                    <?php endif; ?>
                </div>
                <ul class="nav nav-tabs d-flex justify-content-between mb-3">
                    <li class=""><a href="?allResults=1">
                            <h4 class="btn-event p-2" <?php if($active_list===1): ?> style="background: black; color:white" <?php endif; ?>>All</h4>
                        </a></li>

                    <li><a href="?femaleResults=1">
                            <h4 class="btn-event p-2" <?php if($active_list===2): ?> style="background: black; color:white" <?php endif; ?>>Women's list</h4>
                        </a></li>
                    <li><a href="?maleResults=1">
                            <h4 class="btn-event p-2" <?php if($active_list===3): ?> style="background: black; color:white" <?php endif; ?>>Men's list</h4>
                        </a></li>
                    <li><a href="?othersResults=1">
                            <h4 class="btn-event p-2" <?php if($active_list===4): ?> style="background: black; color:white" <?php endif; ?>>Other's list</h4>
                        </a></li>
                </ul>
            </div>
            <!-- 
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div> -->
            <div class="tab-content">
                <div id="allResults" class="tab-pane fade in active">
                    <?php if(count($results)>0): ?>
                    <?php ($counter= 1 + ($results->currentPage()-1)*50); ?>
                    <table class="table">
                        <thead class="thead-dark text-center text-center">
                            <tr>
                                <th scope="col">Place</th>
                                <th scope="col">Name</th>
                                <th scope="col">Result</th>
                                <th scope="col">Proof URL</th>
                                <?php if($competition->user_id == $user->id): ?>
                                <th scope="col">Delete</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <th scope="row">
                                    <?php if($counter == 1): ?>
                                    <img src="<?php echo e(URL::asset('./images/results/first-place.svg')); ?>" class="award-icon">
                                    <?php elseif($counter == 2): ?>
                                    <img src="<?php echo e(URL::asset('./images/results/second-place.svg')); ?>" class="award-icon">
                                    <?php elseif($counter == 3): ?>
                                    <img src="<?php echo e(URL::asset('./images/results/third-place.svg')); ?>" class="award-icon">
                                    <?php else: ?>
                                    <?php echo e($counter); ?>

                                    <?php endif; ?>
                                </th>
                                <td><?php echo e($result->user->name); ?></td>
                                <td>
                                    <?php if($event->result_type == 'time'): ?>
                                    <?php echo e($result->time_result); ?>

                                    <?php else: ?>
                                    <?php echo e($result->number_result); ?>

                                    <?php endif; ?>
                                </td>
                                <td><a target='_blank' href="<?php echo e($result->proof_url); ?>">Link to proof</a></td>
                                <?php if($competition->user_id == $user->id): ?>
                                <td><a href="/result/<?php echo e($result->id); ?>/destroy" class="badge badge-danger p-2">X</a></td>
                                <?php endif; ?>
                            </tr>
                            <?php ($counter++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php if( $results->lastPage() > 1): ?>
                    <div class="col-12 d-flex justify-content-center">
                        <ul class="pagination">
                            <?php ($cur = $results->currentPage()); ?>
                            <?php ($total = $results->lastPage()); ?>
                            <?php if($cur-3 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($results->url(1)); ?>">First</a></li><?php endif; ?>
                            <?php if($cur-1 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($results->url($cur-1)); ?>">
                                    <</a> </li><?php endif; ?> <?php if($cur-2> 0): ?>
                            <li class="page-item"><a class="page-link" href="<?php echo e($results->url($cur-2)); ?>"><?php echo e($cur-2); ?></a></li><?php endif; ?>
                            <?php if($cur-1 > 0): ?> <li class="page-item"><a class="page-link" href="<?php echo e($results->url($cur-1)); ?>"><?php echo e($cur-1); ?></a></li><?php endif; ?>

                            <li class="page-item active"><span class="page-link"><?php echo e($cur); ?></span></li>

                            <?php if($cur+1 <= $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($results->url($cur+1)); ?>"><?php echo e($cur+1); ?></a></li><?php endif; ?>
                                <?php if($cur+2 <= $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($results->url($cur+2)); ?>"><?php echo e($cur+2); ?></a></li><?php endif; ?>
                                    <?php if($cur < $total): ?><li class="page-item"><a class="page-link" href="<?php echo e($results->url($cur+1)); ?>">></a></li><?php endif; ?>
                                        <?php if($cur+2 < $total): ?> <li class="page-item"><a class="page-link" href="<?php echo e($results->url($total)); ?>">Last</a></li><?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if( strpos($_SERVER['REQUEST_URI'], 'allResults') !== false): ?>
                    <h2>Nobody have competed yet. Be first to compete!</h2>
                    <?php elseif( strpos($_SERVER['REQUEST_URI'], 'femaleResults') !== false): ?>
                    <h2>No women have participated yet!</h2>
                    <?php elseif( strpos($_SERVER['REQUEST_URI'], 'maleResults') !== false): ?>
                    <h2>No men have participated yet!</h2>
                    <?php elseif( strpos($_SERVER['REQUEST_URI'], 'othersResults') !== false): ?>
                    <h2>Nobody with gender 'other' have participated yet!</h2>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authorized', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/events/show.blade.php ENDPATH**/ ?>