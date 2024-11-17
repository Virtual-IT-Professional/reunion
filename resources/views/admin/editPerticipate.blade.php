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
                                <div class="card-body p-4">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif
                                    <div class="card-header mb-2">
                                        <div class="h4">
                                            <i class="fas fa-user"></i> Personal Details
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-3 col-6">
                                            @if(!empty($student->avatar))
                                            <img src="{{ asset('public/upload/student/') }}/{{ $student->avatar }}" alt="{{ $student->studentName }}" class="w-100 img-thumbnail rounded-0">
                                            <a href="{{ route('delAvatar',['id'=>$student->id]) }}" class="btn btn-danger btn-sm w-100 mt-2">Delete</a>
                                            @else
                                            <form action="{{ route('updateAvatar') }}" method="POST" class="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="perticipateId" value="{{ $student->id }}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="avatar" class="form-label fw-bold">Picture (Passport Size)</label>
                                                        <input type="file" class="form-control" id="avatar" required name="avatar">
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="submit" value="Update" class="btn btn-primary w-100 mt-2">
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                    <form action="{{ route('updatePerticipate') }}" method="POST" class="form">
                                        <div class="row">
                                            @csrf
                                            <input type="hidden" name="perticipateId" value="{{ $student->id }}">
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="fullName" class="form-label">Full Name</label>
                                                    <div><input type="text" class="form-control" name="fullName" value="{{ $student->studentName }}" id="fullName"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="phoneNumber" class="form-label">Phone Number</label>
                                                    <div><input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ $student->phone }}"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="email" class="form-label">Email Address</label>
                                                    <div><input type="email" name="email" id="email" class="form-control" value="{{ $student->emailAddress }}"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="dept" class="form-label">Department</label>
                                                    <div>
                                                        <select id="dept" class="form-select" required name="dept">
                                                            <option selected>{{ $student->department }}</option>
                                                            <option>Civil Technology</option>
                                                            <option>Electrical Technology</option>
                                                            <option>Mechanical Technology</option>
                                                            <option>Power Technology</option>
                                                            <option>Eelectronics Technology</option>
                                                            <option>Computer Technology</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="shift" class="form-label">Shift</label>
                                                    <div>
                                                        <select id="shift" class="form-select" required name="shift">
                                                            <option selected>{{ $student->shift }}</option>
                                                            <option>1st</option>
                                                            <option>2nd</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="blGroup" class="form-label">Blood Group</label>
                                                    <div>
                                                        <select id="blGroup" class="form-select" required name="blGroup">
                                                            <option selected>{{ $student->blGroup }}</option>
                                                            <option>A+</option>
                                                            <option>A-</option>
                                                            <option>B+</option>
                                                            <option>B-</option>
                                                            <option>AB+</option>
                                                            <option>AB-</option>
                                                            <option>O+</option>
                                                            <option>O-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="currentAddress" class="form-label">Current Address</label>
                                                    <div class=""><input type="text" name="currentAddress" id="currentAddress" class="form-control" value="{{ $student->currentAddress }}"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="tShirtSize" class="form-label">T Shirt Size</label>
                                                    <div>
                                                        <select name="tShirtSize" id="tShirtSize" class="form-control">
                                                            <option>{{ $student->tShirtSize }}</option>
                                                            <option>S &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Chest-36 X Length-26 INCH]</option>
                                                            <option>M &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Chest-38 X Length-27 INCH]</option>
                                                            <option>L &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Chest-40 X Length-28 INCH]</option>
                                                            <option>XL  &nbsp;&nbsp;&nbsp;&nbsp;[Chest-42 X Length-29 INCH]</option>
                                                            <option>2XL &nbsp;[Chest-44 X Length-30 INCH]</option>
                                                            <option>3XL &nbsp;[Chest-46 X Length-31 INCH]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="websiteInput1" class="form-label">Current Status</label>
                                                    <div>
                                                        <select name="status" class="form-control" id="">
                                                            <option value="{{ $student->status }}">{{ $student->status }}</option>
                                                            <option value="PendingVerify">PendingVerify</option>
                                                            <option value="Verified">Verified</option>
                                                            <option value="Rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="professionalDetails" class="form-label">Professional Details</label>
                                                    <div><input type="text" name="professionalDetails" id="professionalDetails" class="form-control" value="{{ $student->professionDetails }}" placeholder="Enter your professional details"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="experience" class="form-label">Professional Experience</label>
                                                    <div><input type="text" name="experience" id="experience" class="form-control" value="{{ $student->experience }}" placeholder="Enter your professional experience"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <!-- guest details here -->
                                        <div class="card-header mb-2">
                                            <div class="h4">
                                                <i class="fas fa-user-secret"></i> Guest Details(Total-{{ $student->totalAttend }})
                                            </div>
                                        </div>
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
                                        <a href="{{ route('editGuest',['id'=>$student->id]) }}" class="btn btn-danger my-1 btn-sm">
                                            <i class="fa-solid fa-pencil-square"></i> Edit Guest
                                        </a>
                                        @else
                                        <div class="row">
                                            <div class="col-12">No guest attend</div>
                                        </div>
                                        @endif
                                        <!-- payment details here -->
                                    
                                        <div class="card-header mb-2">
                                            <a class="h4">
                                                <i class="fas fa-dollar"></i> Payment Details
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="paymentMethod" class="form-label">Payment Type</label>
                                                    <div>
                                                        <select id="paymentMethod" class="form-select" required name="payType">
                                                            <option value="{{ $student->paymentBy }}" selected>@if($student->paymentBy==1) Bkash @endif @if($student->paymentBy==2) Nagad @endif</option>
                                                            <option value="1">Bkash</option>
                                                            <option value="2">Nagad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6 col-12">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="totalPayment" class="form-label">Amount</label>
                                                    <div>
                                                        <input type="number" class="form-control" id="totalPayment" placeholder="Enter payment amount" required name="payAmount" readonly value="{{ $student->paymentAmount }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6 col-12">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="emailInput" class="form-label">TXN ID</label>
                                                    <div>
                                                        <input type="text" class="form-control" id="txnId" placeholder="Example: BJP9PG9ZVB" required name="payId" value="{{ $student->paymentId }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </form>
                                    <!--end row-->
                                    <div class="row">
                                        <div class="col-12 my-2">
                                            @if($student->status == 'PendingVerify')
                                            <a href="{{ route('acceptRegister',['id'=>$student->id]) }}" onclick="alert('Are you sure, you verify the data?')" class="btn btn-success my-1">
                                                <i class="fa-solid fa-badge-check"></i> Accept & Confirm
                                            </a> 
                                            <a href="{{ route('rejectRegister',['id'=>$student->id]) }}" onclick="alert('Are you sure, you verify the data?')" class="btn btn-danger my-1">
                                                <i class="fa-solid fa-circle-xmark"></i> Deny & Reject
                                            </a> 
                                            @endif
                                            <a href="{{ route('pendingList') }}" class="btn btn-warning fw-bold"><i class="fa-sharp fa-regular fa-calendar-clock"></i> Pending List</a>
                                            <a href="{{ route('verifiedList') }}" class="btn btn-success fw-bold"><i class="fa-duotone fa-solid fa-check-to-slot"></i> Verified List</a>
                                            <a href="{{ route('rejectedList') }}" class="btn btn-danger fw-bold"><i class="fa-regular fa-shuffle"></i> Rejected List</a>
                                            <a href="{{ route('viewPerticipate',['id'=>$student->id]) }}" class="btn btn-primary my-1">
                                                <i class="fa-solid fa-eye"></i> Return View
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
