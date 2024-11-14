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
                                            <div class="col-lg-8 col-12">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="professionalDetails" class="form-label">Professional Details</label>
                                                    <div><input type="text" name="professionalDetails" id="professionalDetails" class="form-control" value="{{ $student->professionDetails }}"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 col-12">
                                                <div class="mb-3">
                                                    <label class="fw-bold" for="totalGuest" class="form-label">Guest Attend</label>
                                                    <div>
                                                        <select name="totalMember" id="totalGuest" class="form-control">
                                                            <option>{{ $student->totalAttend }}</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <!-- guest details here -->
                                        <div class="card-header mb-2">
                                            <div class="h4">
                                                <i class="fas fa-user-secret"></i> Guest Details
                                            </div>
                                        </div>
                                        <div id="memberList">
                                            @php
                                                $guestList = \App\Models\geustRegister::where(['linkStudent'=>$student->id])->get();
                                                $x = 1;
                                                $y = 0;
                                            @endphp
                                            @if(!empty($guestList) && count($guestList)>0)
                                            @foreach($guestList as $guest)
                                            <h3 class="h4">Guest {{ $x }}</h3>
                                            <div class='row my-2'>
                                                <div class='col-12 col-md-4'>
                                                    <label class='text-success'>Guest Name</label>
                                                    <input type='text' class='form-control border-success text-success' placeholder='Enter name' required name='guestName[]' value="{{ $guest->guestName }}">
                                                </div>
                                                <div class='col-12 col-md-4'>
                                                    <label class='text-success'>Relation</label>
                                                    <select class='form-control border-success text-success' name='guestRelation[]' onchange='guestRelation({{ $y }})' required>
                                                        <option value='{{ $guest->guestRelation }}'>{{ $guest->guestRelation }}</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <input type='hidden' name='guestCharge[]' id='guestCharge{{ $y }}' value='' />  
                                                </div>
                                                <div class='col-12 col-md-4'>
                                                    <div id='guestAge{{ $y }}' @if($guest->guestRelation=="Son" || $guest->guestRelation=="Daughter") style='display:block' @else style='display:none' @endif>
                                                        <label class='text-success'>Guest Age</label>
                                                        <input type='text' class='form-control border-success text-success' placeholder='25' name='guestAge[]' id='memberAge{{ $y }}' oninput='calculateGuestCharge({{ $y }})' @if(!empty($guest->guestAge)) value='{{ $guest->guestAge }}' @else value='Null' @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                            @php
                                                $x++;
                                                $y++;
                                            @endphp
                                            @endforeach
                                            @else
                                            <div class="row">
                                                <div class="col-12">No guest attend</div>
                                            </div>
                                            @endif
                                        </div>
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

@section('scripts')
<script>

    $(document).ready(function() {
        $('#totalGuest').on('change', function() {
            // Get totalGuest value
            const totalGuest = parseInt($(this).val());

            // Check if totalGuest is a valid number
            if (!isNaN(totalGuest)) {
                let member = ""; // Initialize an empty string to accumulate HTML
                $("#memberList").empty();
                for (let i = 0; i < totalGuest; i++) {
                    member += `
                        <div class='row my-2'>
                            <div class='col-12 col-md-4'>
                                <label class='text-success'>${ i+1 }. Guest Name</label>
                                <input type='text' class='form-control border-success text-success' placeholder='Enter name' required name='guestName[]'>
                            </div>
                            <div class='col-12 col-md-4'>
                                <label class='text-success'>Relation</label>
                                <select class='form-control border-success text-success' name='guestRelation[]' onchange='guestRelation(${i})' required>
                                    <option value=''>-</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type='hidden' name='guestCharge[]' id='guestCharge${i}' value='' />  
                            </div>
                            <div class='col-12 col-md-4'>
                                <div id='guestAge${i}' style='display:none'>
                                    <label class='text-success'>Guest Age</label>
                                    <input type='text' class='form-control border-success text-success' placeholder='25' name='guestAge[]' id='memberAge${i}' oninput='calculateGuestCharge(${i})' value=''>
                                </div>
                            </div>
                        </div>
                    `;
                }

                // Append all accumulated HTML at once to #memberList
                $("#memberList").append(member);
            }
        });
    });

    // Show/hide age input based on relation selection
    function guestRelation(index) {
        const relation = $(`select[name='guestRelation[]']`).eq(index).val();
        if (relation === "Son" || relation === "Daughter") {
            $(`#guestAge${index}`).show();
            $(`#guestCharge${index}`).val(0); 
        } else {
            $(`#guestAge${index}`).hide();
            $(`#guestCharge${index}`).val(1020); 
        }
        updateTotalPayment();
    }

    // Calculate guest charge based on age
    function calculateGuestCharge(index) {
        const age = parseInt($(`#memberAge${index}`).val());
        const charge = (age <= 6) ? 0 : 1020;
        $(`#guestCharge${index}`).val(charge);
        updateTotalPayment();
    }

    // Function to calculate and update the total payment
    function updateTotalPayment() {
        let totalCharge = 0;
        $("input[name='guestCharge[]']").each(function() {
            const charge = parseInt($(this).val()) || 0; // Convert to integer or 0 if NaN
            totalCharge += charge;
        });
        const finalCharge = parseInt(totalCharge + 1530);
        $("#totalPayment").val(finalCharge);
    }
</script>
@endsection
