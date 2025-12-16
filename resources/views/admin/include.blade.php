<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    @php $adminSiteName = $siteSettings?->site_name ?? 'CPI Reunion'; @endphp
    <title>{{ $adminSiteName }} || @yield('adminTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CPI Reunion Admin Panel" name="description" />
    <meta content="Virtual IT Professional" name="author" />
    <!-- App favicon -->
    @php
        $adminFavicon = !empty($siteSettings?->favicon) ? asset('public/upload/site/'.$siteSettings->favicon) : asset('public/admin/velzon/html/default/').'/assets/images/logo.png';
    @endphp
    <link rel="shortcut icon" href="{{ $adminFavicon }}">

    <script src="https://kit.fontawesome.com/32dcd4a478.js" crossorigin="anonymous"></script>
 
    <!-- Layout config Js -->
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('public/admin/velzon/html/default/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('public/admin/velzon/html/default/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('public/admin/velzon/html/default/') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('public/admin/velzon/html/default/') }}/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- Include DataTables CSS and JS -->

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <style>
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ url('/') }}" class="logo logo-dark" target="_blank" title="{{ $adminSiteName }}">
                        <span class="logo-sm">
                            <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo-light.png" class="p-2" alt="" height="80">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo.png" class="p-2" alt="" height="80">
                        </span>
                    </a>

                    <a href="{{ url('/') }}" class="logo logo-light" target="_blank" title="{{ $adminSiteName }}">
                        <span class="logo-sm">
                            <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo-light.png" class="p-2" alt="" height="80">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo-light.png" class="p-2" alt="" height="80">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            @php
                                $headerAvatar = !empty($authAdmin?->avatar) ? asset('public/upload/admin/'.$authAdmin->avatar) : asset('public/admin/velzon/html/default/assets/images/users/avatar-1.jpg');
                            @endphp
                            <img class="rounded-circle header-profile-user" src="{{ $headerAvatar }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ $authAdmin->adminName ?? 'Admin Panel' }}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ $authAdmin->adminType ?? '' }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ $authAdmin->adminName ?? 'Guest' }}!</h6>
                        <a class="dropdown-item" href="{{ route('adminProfile') }}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Verify Fund : <b>$5971.67</b></span></a>
                        <a class="dropdown-item" href="{{ route('adminSettings') }}"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{ url('/') }}" class="logo logo-dark" target="_blank" title="{{ $adminSiteName }}">
                    <span class="logo-sm">
                        <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo-light.png" class="p-2" alt="" height="80">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo.png" class="p-2" alt="" height="80">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{ url('/') }}" class="logo logo-light" target="_blank" title="{{ $adminSiteName }}">
                    <span class="logo-sm">
                        <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo-light.png" class="p-2" alt="" height="80">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo-light.png" class="p-2" alt="" height="80">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('adminHome') }}">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-apps">Dashboard</span>
                            </a>
                        </li>
                        <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Registration</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('pendingList') }}" class="nav-link" data-key="t-chat"> Pending List </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('verifiedList') }}" class="nav-link"> <span data-key="t-file-manager">Active List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('rejectedList') }}" class="nav-link"> <span data-key="t-to-do">Spam/Reject List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('adminCreateStudent') }}" class="nav-link"> <span data-key="t-to-do">Create Registration</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('adminImportStudents') }}" class="nav-link"> <span data-key="t-to-do">Import via CSV</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('adminIdCards') }}">
                                <i class="fa-solid fa-id-card"></i> <span data-key="t-apps">ID Cards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('adminTeam') }}">
                                <i class="fa-solid fa-users-gear"></i> <span data-key="t-apps">Working Team</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('adminClients') }}">
                                <i class="fa-regular fa-rectangle-history"></i> <span data-key="t-apps">Clients / Sponsors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('adminSettings') }}">
                                <i class="fa-solid fa-gear"></i> <span data-key="t-apps">Settings</span>
                            </a>
                        </li>
                        @if(Session::has('superAdmin')):
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('adminSignup') }}">
                                <i class="fa-solid fa-user-vneck"></i> <span data-key="t-apps">Create Profile</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('logout') }}">
                                <i class="fa-regular fa-left-from-bracket"></i> <span data-key="t-apps">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Home</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                     @yield('adminContent')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © {{ $adminSiteName }} | All rights reserved.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                {{ $siteSettings?->tagline ?? 'Design & Develop by Virtual IT Professional' }}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
    </script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- projects js -->
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/js/pages/dashboard-projects.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('public/admin/velzon/html/default/') }}/assets/js/app.js"></script>
    @yield('scripts')
</body>

</html>