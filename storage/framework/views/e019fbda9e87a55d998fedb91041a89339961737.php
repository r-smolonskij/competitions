<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/theme-vendors.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/theme.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/theme-color/theme-modern-one.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Muli%7cPlayfair+Display:700i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d56c43b3b6.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(URL::asset('vendors/modernizr.min.js')); ?>"></script>
    <script src="https://use.typekit.net/owp3yqi.js"></script>
    <script data-ad-client="ca-pub-7479861415634646" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        $(function() {
            //$("competition_start").value = "2020-05-18T10:30:55";
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: new Date,
                minDate: new Date('1900-01-01'),
            });
        });
    </script>
    <script>
        $(function() {
            var today = new Date();
            var date = today.toISOString().split('.')[0]
            document.getElementById("competition_start").setAttribute('min', date);
            document.getElementById("competition_end").setAttribute('min', date);
            document.getElementById("competition_start").setAttribute('value', date);
            document.getElementById("competition_end").setAttribute('value', date);
            document.getElementById("competition_start_edit").setAttribute('value', date);
            document.getElementById("competition_end_edit").setAttribute('value', date);
        });
    </script>
    <script>
        try {
            Typekit.load({
                async: true
            });
        } catch (e) {}
    </script>
    <meta name="keywords" content="html, template, modern, creative, minimal, theme">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400" rel="stylesheet">
</head>

<body class="footer-fixed header-side">

    <div id="wrap">

        <?php if(isset($authorizedUser)): ?>
        <?php else: ?>
        <div class="d-none">
            <?php echo e($authorizedUser = $user); ?>

        </div>

        <?php endif; ?>

        <body class="footer-fixed header-side">
            <div id="wrap">
                <header class="main-header logo-sm-left main-header--style-chester">
                    <div class="main-bar-container main-bar-side" style="overflow-y: auto !important; overflow-x:hidden">
                        <div class="main-bar pt-0">
                            <div class="navbar-header d-lg-none d-xl-none py-0 px-0">
                                <a href="/profile/<?php echo e($authorizedUser->id); ?>" class="navbar-brand "><img src="<?php echo e(URL::asset('./images/logo/logo-dark.png')); ?>"></a>
                                <div class="header-module module-nav-trigger d-lg-none d-xl-none">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-nav" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                </div>
                                <!-- /.header-module -->
                            </div>
                            <!-- /.navbar-header --><a href="/profile/<?php echo e($authorizedUser->id); ?>" class="navbar-brand d-md-none d-sm-none d-lg-inline-block d-xl-inline-block px-0 mr-0"><span class="brand-inner"><img src="<?php echo e(URL::asset('./images/logo/logo-light.png')); ?>"></span></a>
                            <div id="main-header-nav" class="collapse navbar-collapse my-0">
                                <ul id="menu-primary" class="nav navbar-nav main-nav">

                                    <li class="menu-item menu-item-has-children" style="padding-left: 15px !important"><a href="/profile/<?php echo e($authorizedUser->id); ?>" class="pl-3"><img src="<?php echo e($authorizedUser->profile->profileImage()); ?>" alt="" class="rounded-circle mx-2" style="height: 25px; "><span class="link-txt"><?php echo e($authorizedUser->name); ?></span></a>
                                        <ul class="nav-item-children">
                                            <li class="menu-item"><a href="/profile/<?php echo e($authorizedUser->id); ?>"><span class="link-txt">View Profile</span></a></li>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $authorizedUser->profile )): ?>
                                            <li class="menu-item"><a href="/profile/<?php echo e($authorizedUser->id); ?>/edit"><span class="link-txt">Edit Profile</span></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <hr class="w-100 border-white mt-0 " />
                                    <li class="menu-item "><a href="/competitions/ongoing"><span class="link-txt"><i class="fas fa-running"></i> Ongoing Competitions</span></a></li>
                                    <hr class="w-100 border-white mt-0" />
                                    <li class="menu-item "><a href="/competitions/upcoming"><span class="link-txt"><i class="far fa-calendar-alt"></i> Upcoming Competitions</span></a></li>
                                    <hr class="w-100 border-white mt-0" />
                                    <li class="menu-item "><a href="/competitions/competitions-history"><span class="link-txt"><i class="fas fa-chart-bar"></i> Competitions History</span></a></li>
                                    <hr class="w-100 border-white mt-0" />
                                    <li class="menu-item "><a href="/competition/create"><span class="link-txt"><i class="far fa-plus-square"></i> Create Competitions</span></a></li>
                                    <hr class="w-100 border-white mt-0" />
                                    <li class="menu-item "><a href="/competitions/my-competitions"><span class="link-txt"><i class="far fa-calendar-alt"></i> My Organized Competitions</span></a></li>
                                    <hr class="w-100 border-white mt-0" />
                                    <li class="menu-item "><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-item">
                                            <span class="link-txt"><i class="fas fa-sign-out-alt"></i> Sign Out</span>
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>

                                </ul>

                            </div>
                            <!-- /.collapse -->

                            <!-- /.modules-container -->
                        </div>
                        <!-- /.main-bar -->
                    </div>
                    <!-- /.main-bar-container -->
                </header>

                <div id="content" style="min-height: 100vh">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-10" style="min-height: 100vh">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                            <div class="col-md-2 main-header--style-chester" style="background-color: red;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="snackbars" id="form-output-global"></div>
            <script src="<?php echo e(URL::asset('js/core.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('js/theme.vendors.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('js/script.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('js/theme.min.js')); ?>"></script>
        </body>

</html><?php /**PATH C:\Users\Computer\Tutorials\virtualCompetitions\resources\views/layouts/authorized.blade.php ENDPATH**/ ?>