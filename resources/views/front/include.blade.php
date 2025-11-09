<!doctype html>
<html class="no-js" lang="en">
    <head>
    <!-- title -->
    <title>{{ $siteSettings?->site_name ?? "CPI – Engineer's Reunion 2024 (Session10-11)" }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="Virtual IT Professional">
        <!-- description -->
        <meta name="description" content="কুমিল্লা পলিটেকনিক ইনস্টিটিউট (সংক্ষেপে: সিপিআই) হচ্ছে বাংলাদেশের শীর্ষস্থানীয় প্রযুক্তি ও প্রকৌশল-সম্পর্কিত উচ্চশিক্ষা প্রতিষ্ঠান। এটি কুমিল্লা শহরের কোটবাড়ী এলাকায় অবস্থিত। কারিগরি শিক্ষা প্রসারের জন্য ১৯৬২ সালে ২৬ একর জায়গায় কুমিল্লা পলিটেকনিক ইনস্টিটিউট নামে প্রতিষ্ঠিত হয় এবং এটি প্রথম আইসিটি বেসড পলিটেকনিক ইনস্টিটিউট।">
        <!-- keywords -->
        <meta name="keywords" content="cpi, cumilla poly, polytechnic, cpi reunion, reunion cpi, cpi reunion 2010-11, reunion cpi 2010-11, cpi reunion 10-11, reunion cpi 10-11">
        <script src="https://kit.fontawesome.com/32dcd4a478.js" crossorigin="anonymous"></script>
        <!-- favicon -->
        @php
            $favicon = !empty($siteSettings?->favicon) ? asset('public/upload/site/'.$siteSettings->favicon) : asset('public/front/html/').'/images/favicon-cpi.png';
        @endphp
        <link rel="shortcut icon" href="{{ $favicon }}">
        <link rel="apple-touch-icon" href="{{ $favicon }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ $favicon }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ $favicon }}">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/html/') }}/css/bootsnav.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/html/') }}/css/font-icons.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/html/') }}/css/theme-vendors.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/html/') }}/css/style.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/html/') }}/css/responsive.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        <!-- Include DataTables CSS and JS -->
 
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <style>
            body{
                font-family: "Red Hat Display", sans-serif;
                font-optical-sizing: auto;
                font-weight: 400;
                font-style: normal;
            }
            header a.logo img {
                max-height: 120px;
                width: 120px !important;
                padding: 1.5rem;
            }
            .footer-logo {
                max-height: 70px;
            }
            .topHeader{
                font-size: 17px !important;
            }
            section{
                padding: 65px 0;
            }
            .bg-transper {
                background-color: rgb(255, 255, 255, 0.7);
                color: #000 !important;
                margin-top: -10rem !important;
            }
        </style>
    </head>
    <body>
        <style>
            /* Team grid enhancements */
            .team-card {transition: all .35s ease; border-radius: 12px; overflow: hidden; background: #ffffff;}
            .team-card:hover {transform: translateY(-6px); box-shadow: 0 12px 30px -8px rgba(0,0,0,.25);}
            .team-image {aspect-ratio: 1/1; object-fit: cover; max-height: 260px;}
            .team-badge {position: absolute; left: 12px; top: 12px; background: linear-gradient(135deg,#ff3d7f,#ff7950); color:#fff; padding:4px 10px; font-size:11px; font-weight:600; letter-spacing:.5px; border-radius: 20px; text-transform: uppercase; box-shadow:0 4px 10px -2px rgba(0,0,0,.3);}        
            .team-social a {color:#666; font-size:14px; transition: color .25s, transform .25s;}
            .team-social a:hover {color:#ff3d7f; transform: scale(1.15);}        
            #team h5 {letter-spacing:2px;}
            @media (max-width: 991px){.team-image{max-height:220px;}}
            @media (max-width: 575px){.team-image{max-height:180px;}}
        </style>
        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-light background-transparent white-link navbar-expand-lg">
                <div class="container-lg nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto ps-0">
                        @php
                            $logo = !empty($siteSettings?->logo) ? asset('public/upload/site/'.$siteSettings->logo) : asset('public/front/html/').'/images/logo.png';
                            $logoLight = $logo; // reuse
                        @endphp
                        <a href="#" title="cpi reunion" class="logo"><img src="{{ $logo }}" data-at2x="{{ $logo }}" class="logo-dark w-100" alt="cpi reunion"><img src="{{ $logoLight }}" data-at2x="{{ $logoLight }}" alt="cpi reunion" class="logo-light default w-100"></a>
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
                                    @php $regOpen = ($siteSettings?->registration_open ?? true); @endphp
                                    @if($regOpen)
                                    <li><a href="{{ route('studentRegister') }}" title="Services" class="inner-link">Register</a></li>
                                    @endif
                                <li><a href="#work" title="Work" class="inner-link">Details Community List</a></li>
                                <li><a href="#perticipate" title="Team" class="inner-link">Perticipate List</a></li>
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
        <!-- start features section -->
        <section class="wow animate__fadeIn border-bottom border-color-extra-light-gray">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
                    <!-- start features box item -->
                    <div class="col text-center md-margin-50px-bottom sm-margin-30px-bottom wow animate__fadeInUp last-paragraph-no-margin">
                        <i class="icon-map-pin icon-medium margin-25px-bottom sm-margin-10px-bottom"></i>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Contact Us</div>
                        <p class="w-70 lg-w-85 md-w-55 sm-w-75 sm-margin-10px-bottom mx-auto">{{ $siteSettings?->address ?? '401 Motteejel, Dhaka.' }}</p>
                    </div>
            @if($regOpen)
            <div class="col-12 text-center"><a href="{{ route('studentRegister') }}" class="btn btn-success my-4"><i class="fa-solid fa-right-to-bracket"></i> Let's Register</a></div>
            @else
            <div class="col-12 text-center"><span class="badge bg-secondary p-3">Registration is closed</span></div>
            @endif
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col text-center md-margin-50px-bottom sm-margin-30px-bottom wow animate__fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <i class="icon-chat icon-medium margin-25px-bottom sm-margin-10px-bottom"></i>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Let's Talk</div>
                        <p class="w-70 lg-w-85 md-w-55 sm-w-75 sm-margin-10px-bottom mx-auto">{{ $siteSettings?->contact_phone ?? '01674-779916 (Register) · 01972-006267 (Payment) · 01926-139346 (Foreign)' }}</p>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col text-center sm-margin-30px-bottom wow animate__fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <i class="icon-envelope icon-medium margin-25px-bottom sm-margin-10px-bottom"></i>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">E-mail Us</div>
                        @php $mail = $siteSettings?->contact_email ?? 'support@cpireunion.com'; @endphp
                        <p class="w-70 lg-w-85 md-w-55 sm-w-75 sm-margin-10px-bottom mx-auto"><a href="mailto:{{ $mail }}">{{ $mail }}</a></p>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col text-center wow animate__fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <i class="icon-megaphone icon-medium margin-25px-bottom sm-margin-10px-bottom"></i>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Customer Services</div>
                        <p class="w-70 lg-w-85 md-w-55 sm-w-75 sm-margin-10px-bottom mx-auto">Lorem Ipsum is simply dummy text of the printing.</p>
                    </div>
                    <!-- end features box item -->
                </div>
            </div>
        </section>
        <!-- end features section -->
        <!-- start footer --> 
        @php
            // Footer assets and text from Site Settings
            $footerLogo = !empty($siteSettings?->logo) ? asset('public/upload/site/'.$siteSettings->logo) : asset('public/front/html/').'/images/logo.png';
            $siteName = $siteSettings?->site_name ?? "CPI Reunion";
            $tagline = $siteSettings?->tagline ?? null;
        @endphp
        <footer class="footer-strip bg-light-gray padding-50px-tb sm-padding-30px-tb">
            <div class="container">
                <div class="row align-items-center">
                    <!-- start logo -->
                    <div class="col-md-3 text-center text-lg-start sm-margin-20px-bottom">
                        <a href="#"><img class="footer-logo" src="{{ $footerLogo }}" data-at2x="{{ $footerLogo }}" alt="{{ $siteName }}"></a>
                    </div> 
                    <!-- end logo -->
                    <!-- start copyright -->
                    <div class="col-md-6 text-center text-small alt-font sm-margin-10px-bottom">
                        &copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.
                        @if($tagline)
                            <div class="small text-muted">{{ $tagline }}</div>
                        @endif
                        <div class="mt-1">Website developed by <a href="#" target="_blank" title="Virtual IT Professional">Virtual IT Professional</a></div>
                    </div>
                    <!-- end copyright -->
                    <!-- start social media -->
                    <div class="col-md-3 text-center text-lg-end">
                        <div class="social-icon-style-8 d-inline-block align-middle">
                            <ul class="small-icon mb-0">
                                @php
                                    $fb = $siteSettings?->facebook ?? 'https://www.facebook.com/CPIEngineersReunion/';
                                    $yt = $siteSettings?->youtube ?? 'https://youtube.com/@CPIEngineersReunion';
                                    $ig = $siteSettings?->instagram ?? null;
                                @endphp
                                <li><a class="facebook text-black" href="{{ $fb }}" target="_blank"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a class="twitter text-danger" href="{{ $yt }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                @if($ig)
                                <li><a class="google text-black" href="{{ $ig }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- end social media -->
                </div>
            </div>
        </footer>
        <!-- end footer -->
         <script>
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
         </script>
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <script type="text/javascript" src="{{ asset('public/front/html/') }}/js/bootsnav.js"></script>
        <script type="text/javascript" src="{{ asset('public/front/html/') }}/js/jquery.nav.js"></script>
        <script type="text/javascript" src="{{ asset('public/front/html/') }}/js/hamburger-menu.js"></script>
        <script type="text/javascript" src="{{ asset('public/front/html/') }}/js/theme-vendors.min.js"></script>
        <!-- setting -->
        <script type="text/javascript" src="{{ asset('public/front/html/') }}/js/main.js"></script>
        @yield('scripts')
    </body>
</html>