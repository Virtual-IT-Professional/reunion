<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>CPI Reunion || Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CPI Reunion Admin Panel" name="description" />
    <meta content="Virtual IT Professional" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/admin/velzon/html/default/') }}/assets/images/logo.png">

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
            padding:3px
        }
        .table{
            outline-style: solid;
            outline-width: 1px;
            outline-color: #ff0000;
        }
        body{
            font-size: 8px;
        }
    </style>

</head>

<body>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!--end col-->
                <div class="col-xxl-12">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <div class="h4">
                                <i class="fas fa-user"></i> Personal Details
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $verifiedList = \App\Models\studentRegister::where(['status'=>'Verified'])->orderby('id','DESC')->get();
                            @endphp
                            @if(!empty($verifiedList))
                            @foreach($verifiedList as $verified)
                            <div class="row g-0">
                                <div class="col-2">
                                    <table class="table table-bordered bg-danger-subtle border-danger">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Office Copy</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Full Name</td>
                                            <td>{{ $verified->studentName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Mobile</td>
                                            <td>{{ $verified->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Department</td>
                                            <td>{{ $verified->department }}({{ $verified->shift }})</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Guest</td>
                                            <td>{{ $verified->totalAttend }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Baby Guest</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                CPI Engineer's Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-1">
                                    <table class="table table-bordered bg-success-subtle border-success">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Refel Draw</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2">
                                    <table class="table table-bordered bg-danger-subtle border-danger">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Participate Copy</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Full Name</td>
                                            <td>{{ $verified->studentName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Mobile</td>
                                            <td>{{ $verified->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Department</td>
                                            <td>{{ $verified->department }}({{ $verified->shift }})</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Guest</td>
                                            <td>{{ $verified->totalAttend }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Baby Guest</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                CPI Engineer's Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2">
                                    <table class="table table-bordered bg-success-subtle border-success">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Food-Snacks</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Meal</td>
                                            <td>Full/Null</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                CPI Engineer's Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2">
                                    <table class="table table-bordered bg-danger-subtle border-danger">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Food-Lunch</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Meal</td>
                                            <td>Full/Null</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                CPI Engineer's Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2">
                                    <table class="table table-bordered bg-success-subtle border-success">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Food-Breakfast</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Meal</td>
                                            <td>Full/Null</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                CPI Engineer's Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-1">
                                    <table class="table table-bordered bg-danger-subtle border-danger">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-center bg-primary bg-primary text-white">Gift</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Token No</td>
                                            <td>{{ $verified->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">T-Shirt</td>
                                            <td>{{ Str::limit($verified->tShirtSize, 5,'') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Mug</td>
                                            <td>Yes/Null</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Key Ring</td>
                                            <td>Yes/Null</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Other Gift</td>
                                            <td>Yes/Null</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">-</td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center bg-primary text-white">
                                            <td colspan="2">
                                                Reunion 2024<br>
                                                (Session 2010-11)
                                            </td>
                                        </tr>
                                        <tr class="text-center bg-info text-white">
                                            <td colspan="2">
                                                www.cpireunion.com
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->
            

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