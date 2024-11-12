@extends('admin.include')
@section('adminTitle')
Verified Student
@endsection
@section('adminContent')

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <!--end col-->
                        <div class="col-xxl-12">
                            @if(!empty($student))
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <div class="h4">
                                        <i class="fas fa-user"></i> Personal Details
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row mb-4">
                                        <div class="col-md-2 col-4">
                                            @if(!empty($student->avatar))
                                            <img src="{{ asset('public/upload/student/') }}/{{ $student->avatar }}" alt="{{ $student->studentName }}" class="w-100 img-thumbnail rounded-0">
                                            @else
                                            <img src="{{ asset('public/upload/') }}/avatar.png" alt="{{ $student->studentName }}" class="w-100 img-thumbnail rounded-0">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="firstnameInput" class="form-label">Full Name</label>
                                                <div>{{ $student->studentName }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="phonenumberInput" class="form-label">Phone Number</label>
                                                <div>{{ $student->phone }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="emailInput" class="form-label">Email Address</label>
                                                <div>{{ $student->emailAddress }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="lastnameInput" class="form-label">Department</label>
                                                <div>{{ $student->department }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="JoiningdatInput" class="form-label">Shift</label>
                                                <div>{{ $student->shift }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="skillsInput" class="form-label">Blood Group</label>
                                                <div>{{ $student->blGroup }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="designationInput" class="form-label">Current Address</label>
                                                <div class="">{{ $student->currentAddress }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="countryInput" class="form-label">T Shirt Size</label>
                                                <div>{{ $student->tShirtSize }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <!--end col-->
                                        <div class="col-lg-4 col-6">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="websiteInput1" class="form-label">Current Status</label>
                                                <div>{{ $student->status }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-8 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="cityInput" class="form-label">City</label>
                                                <div>{{ $student->professionDetails }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="zipcodeInput" class="form-label">Guest Attend</label>
                                                <div>{{ $student->totalAttend }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!-- guest details here -->
                                <div class="card-header">
                                    <div class="h4">
                                        <i class="fas fa-user-secret"></i> Guest Details
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    @php
                                        $guestList = \App\Models\geustRegister::where(['linkStudent'=>$student->id])->get();
                                        $x = 1;
                                    @endphp
                                    @if(!empty($guestList) && count($guestList)>0)
                                    @foreach($guestList as $guest)
                                    <h3 class="h4">Guest {{ $x }}</h3>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="firstnameInput" class="form-label">Full Name</label>
                                                <div>{{ $guest->guestName }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="phonenumberInput" class="form-label">Relation</label>
                                                <div>{{ $guest->guestRelation }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="emailInput" class="form-label">Age</label>
                                                <div>@if(!empty($guest->guestAge)) {{ $guest->guestAge }} @else - @endif</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    @php
                                        $x++;
                                    @endphp
                                    @endforeach
                                    @else
                                    <div class="row">
                                        <div class="col-12">No guest attend</div>
                                    </div>
                                    @endif
                                </div>
                                <!-- payment details here -->
                                
                                <div class="card-header">
                                    <a class="h4">
                                        <i class="fas fa-dollar"></i> Payment Details
                                    </a>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="firstnameInput" class="form-label">Payment Type</label>
                                                <div>@if($student->paymentBy==1) Bkash @endif @if($student->paymentBy==2) Nagad @endif</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="phonenumberInput" class="form-label">Amount</label>
                                                <div>{{ $student->paymentAmount }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="emailInput" class="form-label">TXN ID</label>
                                                <div>{{ $student->paymentId }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-12">
                                            <div class="mb-3">
                                                <label class="fw-bold" for="emailInput" class="form-label">Verified Date</label>
                                                <div>@if($student->status=='PendingVerify') Payment Not Verify @else {{ \Carbon\Carbon::parse($student->updated_at)->format('d/m/Y') }} @endif</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="row">
                                        <div class="col-md-12 col-6">
                                            <a href="{{ route('acceptRegister',['id'=>$student->id]) }}" onclick="alert('Are you sure, you verify the data?')" class="btn btn-success my-1">
                                                    <i class="fa-solid fa-badge-check"></i> Accept & Confirm
                                                </a> 
                                            <a href="{{ route('rejectRegister',['id'=>$student->id]) }}" onclick="alert('Are you sure, you verify the data?')" class="btn btn-danger my-1">
                                                    <i class="fa-solid fa-circle-xmark"></i> Deny & Reject
                                                </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card-body">
                                <div class="alert alert-info">Sorry! No data found</div>
                            </div>
                            @endif
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div><!-- End Page-content -->
@endsection