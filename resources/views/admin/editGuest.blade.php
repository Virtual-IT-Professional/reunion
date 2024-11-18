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
                                                <label class="fw-bold" for="websiteInput1" class="form-label">Current Status</label>
                                                <div>{{ $student->status }}</div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    
                                    <div class="card-header mb-2">
                                        <a class="h4">
                                            <i class="fas fa-user-secret"></i> Guest Details
                                        </a>
                                    </div>
                                    <form action="{{ route('updateGuest') }}" method="POST" class="form">
                                        @csrf
                                        <input type="hidden" name="perticipateId" value="{{ $student->id }}">
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
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
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
                                            <a href="{{ route('editPerticipate',['id'=>$student->id]) }}" class="btn btn-warning my-1">
                                                <i class="fa-solid fa-pencil-square"></i> Edit Details
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
                                    <select  class='form-control border-success text-success' name='guestAge[]' id='memberAge${i}' onchange='calculateGuestCharge(${i})'>
                                        <option value='0'>0</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>
                                        <option value='13'>13</option>
                                        <option value='14'>14</option>
                                        <option value='15'>15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    `;
                }

                // Append all accumulated HTML at once to #memberList
                $("#memberList").append(member);
                if(totalGuest===0){
                    $("#totalPayment").val(1530);
                }
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
