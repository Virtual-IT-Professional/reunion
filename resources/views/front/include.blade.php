<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>CPI – Cumilla Polytechnic Institute Reunion</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">
        <!-- description -->
        <meta name="description" content="কুমিল্লা পলিটেকনিক ইনস্টিটিউট (সংক্ষেপে: সিপিআই) হচ্ছে বাংলাদেশের শীর্ষস্থানীয় প্রযুক্তি ও প্রকৌশল-সম্পর্কিত উচ্চশিক্ষা প্রতিষ্ঠান। এটি কুমিল্লা শহরের কোটবাড়ী এলাকায় অবস্থিত। কারিগরি শিক্ষা প্রসারের জন্য ১৯৬২ সালে ২৬ একর জায়গায় কুমিল্লা পলিটেকনিক ইনস্টিটিউট নামে প্রতিষ্ঠিত হয় এবং এটি প্রথম আইসিটি বেসড পলিটেকনিক ইনস্টিটিউট।">
        <!-- keywords -->
        <meta name="keywords" content="cpi, cumilla poly, polytechnic, cpi reunion, reunion cpi, cpi reunion 2010-11, reunion cpi 2010-11, cpi reunion 10-11, reunion cpi 10-11">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('/public/front/html/') }}/images/favicon.png">
        <link rel="apple-touch-icon" href="{{ asset('/public/front/html/') }}/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/public/front/html/') }}/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/public/front/html/') }}/images/apple-touch-icon-114x114.png">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/front/html/') }}/css/bootsnav.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/front/html/') }}/css/font-icons.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/front/html/') }}/css/theme-vendors.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/front/html/') }}/css/style.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/front/html/') }}/css/responsive.css" />
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-light background-transparent white-link navbar-expand-lg">
                <div class="container-lg nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto ps-0">
                        <a href="#" title="cpi reunion" class="logo"><img src="{{ asset('/public/front/html/') }}/images/logo.jpeg" data-at2x="{{ asset('/public/front/html/') }}/images/logo.jpeg" class="logo-dark w-100" alt="cpi reunion"><img src="{{ asset('/public/front/html/') }}/images/logo.jpeg" data-at2x="{{ asset('/public/front/html/') }}/images/logo.jpeg" alt="cpi reunion" class="logo-light default w-100"></a>
                    </div>
                    <!-- end logo -->
                    <div class="col-auto col-lg accordion-menu pe-0">
                        <button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-end" id="navbar-collapse-toggle-1">
                            <ul class="nav navbar-nav alt-font font-weight-700">
                                <li><a href="{{ url('/') }}" title="Home" class="inner-link">Home</a></li>
                                <li><a href="#about" title="About" class="inner-link">About Reunion</a></li>
                                <!-- <li><a href="#services" title="Services" class="inner-link">Services</a></li> -->
                                <!-- <li><a href="#work" title="Work" class="inner-link">Work</a></li> -->
                                <li><a href="#team" title="Team" class="inner-link">Admin/Modarator</a></li>
                                <!-- <li><a href="#blog" title="Blog" class="inner-link">Blog</a></li> -->
                                <!-- <li><a href="#clients" title="Clients" class="inner-link">Clients</a></li> -->
                                <li><a href="#contact" title="Contact" class="inner-link">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation -->  
        </header>
        <!-- end header -->
         @yield('frontBody')
        <!-- start footer --> 
        <footer class="footer-strip bg-light-gray padding-50px-tb sm-padding-30px-tb">
            <div class="container">
                <div class="row align-items-center">
                    <!-- start logo -->
                    <div class="col-md-3 text-center text-lg-start sm-margin-20px-bottom">
                        <a href="#"><img class="footer-logo" src="{{ asset('/public/front/html/') }}/images/logo.jpeg" data-at2x="{{ asset('/public/front/html/') }}/images/logo.jpeg" alt="cip reunion"></a>
                    </div> 
                    <!-- end logo -->
                    <!-- start copyright -->
                    <div class="col-md-6 text-center text-small alt-font sm-margin-10px-bottom">
                        &copy; {{ date('Y') }} CPI Reunion is Proudly Powered by <a href="http://www.virtualitprofessional.com" target="_blank" title="Virtual IT Professional">Virtual IT Professional</a>.
                    </div>
                    <!-- end copyright -->
                    <!-- start social media -->
                    <div class="col-md-3 text-center text-lg-end">
                        <div class="social-icon-style-8 d-inline-block align-middle">
                            <ul class="small-icon mb-0">
                                <li><a class="facebook text-black" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a class="twitter text-black" href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a class="google text-black" href="https://plus.google.com" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a></li>
                                <li><a class="dribbble text-black" href="https://dribbble.com/" target="_blank"><i class="fa-brands fa-dribbble me-0" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end social media -->
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript -->
        <script type="text/javascript" src="{{ asset('/public/front/html/') }}/js/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('/public/front/html/') }}/js/bootsnav.js"></script>
        <script type="text/javascript" src="{{ asset('/public/front/html/') }}/js/jquery.nav.js"></script>
        <script type="text/javascript" src="{{ asset('/public/front/html/') }}/js/hamburger-menu.js"></script>
        <script type="text/javascript" src="{{ asset('/public/front/html/') }}/js/theme-vendors.min.js"></script>
        <!-- setting -->
        <script type="text/javascript" src="{{ asset('/public/front/html/') }}/js/main.js"></script>
    </body>
</html>