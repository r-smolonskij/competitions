<!DOCTYPE html>
<html lang="en">

<head>
    <title>Virtual Competitions - @yield('title')</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/theme-vendors.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/theme.min.css">
    <link rel="stylesheet" href="css/theme-color/theme-modern-one.css">
    <link href="https://fonts.googleapis.com/css?family=Muli%7cPlayfair+Display:700i" rel="stylesheet">
    <script data-ad-client="ca-pub-7479861415634646" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="vendors/modernizr.min.js"></script>
    <script src="https://use.typekit.net/owp3yqi.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: new Date
            });
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

<body class="footer-fixed">

    <div id="wrap">
        <header class="main-header header-overlay logo-sm-left main-header--style-modern-one" data-wait-for-images="true">
            <section class="main-bar-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-bar navbar-expand-lg">
                                <div class="navbar-header d-lg-none d-xl-none py-0 px-0">
                                    <a href="#" class="navbar-brand"><img src="./images/logo/logo-dark.png" alt="Virtual Competitions"></a>
                                </div><a href="/" class="navbar-brand d-md-none d-sm-none d-lg-inline-block d-xl-inline-block"><span class="brand-inner pt-3"><img src="./images/logo/logo-light.png" alt="Virtual Competitions" style="max-height: 50px"></span></a>
                                <div id="main-header-nav" class="collapse navbar-collapse">
                                    <ul id="menu-primary" class="nav navbar-nav main-nav underlined weight-light">
                                        <li class="menu-item "><a href="/"><span class="link-txt pt-0">Home</span></a></li>
                                        <li class="menu-item "><a href="#"><span class="link-txt pt-0">About</span></a></li>
                                        <li class="menu-item "><a href="/login"><span class="link-txt pt-0">Sign In</span></a></li>
                                        <li class="menu-item "><a href="/register"><span class="link-txt pt-0">Register</span></a></li>
                                    </ul>
                                </div>
                                <div class="header-module module-nav-trigger d-lg-none d-xl-none">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-nav" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        @yield('content')
        <footer class="main-footer main-footer--style-centro py-3 not-fixed" data-fixed="false">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
               <h4><b>©<a href="virtual-competitions.com">Virtual-Competitions.com</a>  All rights reserved.</b> </h4>   
                </div>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/theme.vendors.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/theme.min.js"></script>
</body>

</html>