@extends('front.include')
@section('frontBody')

<!-- start hero section -->
<section id="home" class="p-0 parallax mobile-height wow animate__fadeIn" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('public/front/html/') }}/images/cpi_cover.jpg');height:570px">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container position-relative full-screen">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <img src="{{ asset('public/front/html/') }}/images/text2.png" alt=""/>
                <div class="down-section text-center"><a href="#about" class="inner-link"><i class="ti-arrow-down icon-extra-small text-white-2 bg-deep-pink padding-15px-all sm-padding-10px-all rounded-circle"></i></a></div>
            </div>
        </div>
    </div>
</section>
<!-- end hero section -->
<div class="container p-4">
    <div class="row align-items-center my-3 mb-4">
        <div class="col-12 text-center">
            <h2 class="display-6 fw-bold">Reunion Registration Form</h2>
            <!-- Button trigger modal -->
            <a class="fw-bold btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#programDetails"><i class="fa-sharp fa-light fa-memo-circle-info"></i> Program Details</a>
            <a class="fw-bold btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#tShirtDetails"><i class="fa-sharp fa-solid fa-shirt"></i> T-Shirt Details</a>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-11 mx-auto">
            <div class="card card-body shadow p-4">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h5 class="fw-bold d-none d-md-block">Emergency Help: 01674-779916</h5>
                <h5 class="fw-bold d-md-none d-block text-center">Emergency Help: <br>01674-779916</h5>
                <div class="alert alert-danger fw-bold h3">
                    Sorry! Our registration process is closed.<br>
                    দুঃখিত! আমাদের রেজিস্ট্রেশন প্রক্রিয়াটি বন্ধ হয়ে গেছে।
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Program Details -->
<div class="modal fade main model mt-5" id="programDetails" tabindex="-1" role="dialog" aria-labelledby="programDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl mt-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="programDetailsModalLabel">Program Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Reunion Venue</h6>
                <p class="fw-bold">Play Ground of Cumilla Polytechnic Institute</p>
                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Reunion Will Held</h6>
                <p class="fw-bold">25th December 2024, Wednesday at 8.30 AM to Day Long</p>
                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Registration Fees</h6>
                
                <ul>
                    <li><b>Participate:</b> 1530/- (Bkash/Nagad Charge Included)</li>
                    <li><b>Guest:</b> 1020/- (Bkash/Nagad Charge Included)</li>
                </ul>
                <p class="my-2 mt-4 fw-bold text-success">Payment System:</p>
                <ul>
                    <li><b class="text-danger">Bkash:</b> 01972-006267 (Merchant Make Payment)</li>
                    <li><b class="text-danger">Nagad:</b> 01972-006267 (Merchant Make Payment)</li>
                </ul>
                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Registration Rules</h6>
                
                <ol>
                    <li>Fill The Form for Only Once Even If There Are Multiple Guests</li>
                    <li>General Member(Student of Session 2010-11 of CPI) joining fee 1530 BDT</li>
                    <li>Per Guest Member Joining Fees 1020 BDT</li>
                    <li>6 Years of Age Own Children Must Register, Don't Need to Below 6 Years</li>
                </ol>
            </div>
            <div class="col-12 col-md-6">
                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Program Arrangement Details</h6>
                
                <ul>
                    <li>Breakfast(Premium Package)</li>
                    <li>Lunch(Premium Package for Any Religion)</li>
                    <li>Evening Snacks</li>
                    <li>Premium Quality Branded T-Shirt(Polo)</li>
                    <li>Souvenir Mog(Branded)</li>
                    <li>Coffee Corner</li>
                    <li>Baby Feeding Zone</li>
                    <li>Female Rest Room</li>
                    <li>Photo Zone</li>
                    <li>Fun Zone for Kids</li>
                    <li>Guest Female/Entertainment for Woman</li>
                    <li>Raffle Draw (Attractive Gift)</li>
                    <li>Gettings Video Message Display About Ex Engineers from Foreigners Friends(01674-779916 Imo,WhatsApp, Viber)</li>
                </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal T-Shirt Details -->
<div class="modal fade main model mt-5" id="tShirtDetails" tabindex="-1" role="dialog" aria-labelledby="tShirtDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mt-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tShirtDetailsModalLabel">T-Shirt Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <p>*All size details here are inch</p>
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Sizes</th>
                        <th>Chest</th>
                        <th>Length</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>S</td>
                            <td>36</td>
                            <td>26</td>
                        </tr>
                        <tr>
                            <td>M</td>
                            <td>38</td>
                            <td>27</td>
                        </tr>
                        <tr>
                            <td>L</td>
                            <td>40</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>XL</td>
                            <td>42</td>
                            <td>29</td>
                        </tr>
                        <tr>
                            <td>2XL</td>
                            <td>44</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>3XL</td>
                            <td>46</td>
                            <td>31</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>

    $(document).ready(function() {
        // Hide payment options initially
        $("#bkashPaymentNumber").addClass('d-none');
        $("#nagadPaymentNumber").addClass('d-none');

        $('#totalGuest').on('change', function() {
            // Get totalGuest value
            const totalGuest = parseInt($(this).val());

            // Check if totalGuest is a valid number
            if (!isNaN(totalGuest)) {
                let member = ""; // Initialize an empty string to accumulate HTML
                $("#memberList").empty();
                for (let i = 0; i < totalGuest; i++) {
                    member += `
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
                    `;
                }

                // Append all accumulated HTML at once to #memberList
                $("#memberList").append(member);
                if(totalGuest===0){
                    $("#totalPayment").val(1530);
                }
            }
        });

        // Event handler for payment method selection
        $('#paymentMethod').on('change', function() {
            const paymentMethod = $(this).val();
            
            if (paymentMethod == 1) {
                $("#bkashPaymentNumber").removeClass("d-none").addClass("d-block");
                $("#nagadPaymentNumber").addClass('d-none');
            } else if (paymentMethod == 2) {
                $("#bkashPaymentNumber").addClass('d-none');
                $("#nagadPaymentNumber").removeClass('d-none').addClass("d-block");
            } else {
                $("#bkashPaymentNumber").addClass('d-none');
                $("#nagadPaymentNumber").addClass('d-none');
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
