@extends('front.include')
@section('frontBody')

<!-- start hero section -->
<section id="home" class="p-0 parallax mobile-height wow animate__fadeIn" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('/public/front/html/') }}/images/cpi_cover.jpg');height:570px">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container position-relative full-screen">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <img src="{{ asset('/public/front/html/') }}/images/text2.png" alt=""/>
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
            <a class="fw-bold btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Program Details</a>
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
                <form class="row g-3" method="POST" action="{{ route('saveStudent') }}">
                    @csrf
                    <h6 class="mb-0 fw-bold">Personal Details</h6>
                    <div class="col-12 col-md-4">
                        <label for="stdName" class="form-label">Your Name(*)</label>
                        <input type="text" class="form-control" id="stdName" required placeholder="Example: Md Abu Yousuf" name="stdName">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Department(*)</label>
                        <select id="dept" class="form-select" required name="dept">
                            <option selected>Choose...</option>
                            <option>Civil-A</option>
                            <option>Civil-B</option>
                            <option>Electrical</option>
                            <option>Mechanical</option>
                            <option>Power</option>
                            <option>Eelectronics</option>
                            <option>Computer</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="shift" class="form-label">Shift(*)</label>
                        <select id="shift" class="form-select" required name="shift">
                            <option selected>Choose...</option>
                            <option>1st</option>
                            <option>2nd</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="phone" class="form-label">Phone/Mobile(*)</label>
                        <input type="text" class="form-control" id="phone" placeholder="Example: 01716-841785" required name="phone">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="stdMail" class="form-label">e-Mail(*)</label>
                        <input type="email" class="form-control" id="stdMail" placeholder="Example: vitprofessional@gmail.com" required name="mailAddress">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="gender" class="form-label">Gender(*)</label>
                        <select id="gender" class="form-select" required name="gender">
                            <option selected>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="blGroup" class="form-label">Blood Group(*)</label>
                        <select id="blGroup" class="form-select" required name="blGroup">
                            <option selected>Choose...</option>
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
                    <div class="col-12 col-md-4">
                        <label for="tShirtSize" class="form-label">T-Shirt Size(*)</label>
                        <select id="tShirtSize" class="form-select" required name="tShirtSize">
                            <option selected>Choose...</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="currentAddress" class="form-label">Current Address(*)</label>
                        <input type="text" class="form-control" id="currentAddress" placeholder="Briefly Describe Current Location" required name="currentAddress">
                    </div>
                    <h6 class="mb-0 fw-bold">Professional Details</h6>
                    <div class="col-12 col-md-6">
                        <label for="professionDetails" class="form-label">Profession</label>
                        <input type="text" class="form-control" id="professionDetails" placeholder="Designation/Position & Company Name" name="professionDetails">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="expreience" class="form-label">Professional Experience</label>
                        <input type="text" class="form-control" id="expreience" placeholder="Web Development, Server Maintain, etc" name="expreience">
                    </div>
                    <h6 class="mb-0 fw-bold">Guest Details</h6>
                    <div class="col-12 col-md-4">
                        <label for="totalJoin" class="form-label">Number of Guest(*)</label>
                        <select name="totalMember" onchange="totMember(this)" id="totalJoin" class="form-control">
                            <option value="">0</option>
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
                    <div class="col-12">
                        <div class="row" id="memberList"></div>
                    </div>
                    <h6 class="mb-0 fw-bold">Payment Details</h6>
                    <div class="col-12 col-md-4">
                        <label for="totalPayment" class="form-label">Total Amount(*)</label>
                        <input type="number" class="form-control" id="totalPayment" placeholder="Example: 3500" required name="payAmount">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Payment Method(*)</label>
                        <select id="dept" class="form-select" onchange='payNumber(this.value)' required name="payType">
                            <option selected>Choose...</option>
                            <option>Bkash</option>
                            <option>Nagad</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="txnId" class="form-label">TXNID(*)</label>
                        <input type="text" class="form-control" id="txnId" placeholder="Example: BJP9PG9ZVB" required name="payId">
                    </div>
                    <div class="col-12 mt-0" id="paymentNumber"></div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade main model mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg mt-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Program Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Where the reunion held in?</h6>
            <p class="fw-bold">Play ground of Cumilla Polytechnic Institute</p>
            <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">When (Date & Time) the reunion held in?</h6>
            <p class="fw-bold">25th December 2024, Friday at 9.00 AM to day long</p>
            <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Program Arrangement Details</h6>
            
            <ul>
                <li>Breakfast</li>
                <li>Lunch(All religions)</li>
                <li>Afternoon Snack</li>
                <li>Premium Quality Branding T-Shirt</li>
                <li>Branding Mug</li>
                <li>Cofee Corner</li>
                <li>Baby Feeding Zone</li>
                <li>Female Rest Room</li>
                <li>Photo Zone</li>
                <li>Baby Gamming Zone</li>
                <li>Female Guest Entertainment</li>
                <li>Refel Draw</li>
                <li>Foreighner Friends Joining(01674-779916 IMO)</li>
            </ul>
            <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Registration Fees</h6>
            
            <ul>
                <li><b>General:</b> 1530/- (Bkash/Nagad Charge Included)</li>
                <li><b>Guest/Family:</b> 1020/- (Bkash/Nagad Charge Included)</li>
            </ul>
            <p class="my-2 mt-4 fw-bold text-success">Payment System:</p>
            <ul>
                <li><b class="text-danger">Bkash:</b> 01972-006267 (Make Payment)</li>
                <li><b class="text-danger">Nagad:</b> 01972-006267 (Make Payment)</li>
            </ul>
            <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Registration Rules</h6>
            
            <ol>
                <li>Please fillup the form for one time only</li>
                <li>General member(Student of Session 2010-11 of CPI) joining fee 1.5K BDT</li>
                <li>Per guest or family member joining fees 1K BDT</li>
                <li>Don't need to pay the fees if you've any child/baby below 6 years.</li>
                <li>Below 6 years baby must be register(No fees applicable) for the reunion</li>
            </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
    function totMember(e){
        document.getElementById("memberList").innerHTML = "";
        document.getElementById("totalPayment").value = "";
        x = e.value
        for (let i = 0; i < x; i++) {
            text = "<div class='col-12 col-md-4'><label class='text-success'>Guest Name</label><input type='text' class='form-control border-success text-success' placeholder='Example: Thamina Akter' required name='guestName[]' required></div><div class='col-12 col-md-4'><label class='text-success'>Relation</label><select class='form-control border-success text-success' name='guestRelation[]' onchange='guestRelation(this.value,"+i+")' required><option value=''>-</option><option>Spouse</option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option><option>Son</option><option>Daughter</option><option>Other</option></select></div><div class='col-12 col-md-4'><div id='guestAge["+i+"]' style='display:none'><label class='text-success'>Guest Age</label><input onchange='paymentDetails(this.value)' type='number' class='form-control border-success text-success' placeholder='Example: 25' name='guestAge[]' id='memberAge[]' value=''></div></div>";
            document.getElementById("memberList").innerHTML += text;
        }
    }
    function sum(x,y){
        a = x;
        b = y;
        c = Number(a)+Number(b);
        return Number(c);
    }

    function payNumber(e){
        if(e === 'Bkash'){
            document.getElementById("paymentNumber").innerHTML = "<h6>`bKash` payment via USSD:</h6><ul><li>Go to your bKash Mobile Menu by dialing *247#</li><li>Choose “Payment”</li><li>Enter the Merchant bKash Account Number you want to pay to(01972-006267)</li><li>Enter the amount you want to pay(Don't need to pay less then 6 years baby)</li><li>Enter Reference(CPI 10-11)</li><li>Now enter your bKash Mobile Menu PIN to confirm</li><li>Done! You will receive confirmation SMS at the end of payment</li></ul> <h6>‘bKash’ payment via app:</h6><ul><li>Login to bKash App</li><li>Click the Payment button</li><li>Type the Merchant Account Number(01972-006267) or scan the QR code</li><li>Type The Amount(Don't need to pay less then 6 years baby)</li><li>Type The Reference(CPI 10-11) & Pin</li><li>Tap & Hold</li><li>Receive confirmation SMS at the end of payment</li></ul>";
        }else if(e === 'Nagad'){
            document.getElementById("paymentNumber").innerHTML = "<h6>‘Nagad’ payment via USSD:</h6><ul><li>Dial *167#</li><li>Press 4 from the menu to select payment</li><li>Tyoe The Marchand Account Number(01972-006267)</li><li>Type The Amount(Don't need to pay less then 6 years baby)</li><li>Type the counter number(Put 0)</li><li>Type The Reference(CPI 10-11)</li><li>Type PIN</li><li>Receive confirmation SMS at the end of payment</li></ul> <h6>‘Nagad’ payment via app:</h6><ul><li>Login to Nagad App</li><li>Click the Merchant Pay button</li><li>Type the Merchant Account Number(01972-006267) or scan the QR code</li><li>Type The Amount(Don't need to pay less then 6 years baby)</li><li>Type The Reference(CPI 10-11) & Pin</li><li>Tap & Hold</li><li>Receive confirmation SMS at the end of payment</li></ul>";
        }else{
            document.getElementById("paymentNumber").innerHTML = "";
        }
    }

    function guestRelation(e,f){
        var x = document.getElementById("guestAge["+f+"]");
        if(e==='Son' || e==='Daughter'){
            x.style.display = "block";
        }else{
            x.style.display = "none";
        }
    }

    // function paymentDetails(e){
    //     // document.getElementById("totalPayment").value = "";
    //     totId = document.querySelectorAll('#memberAge').length;
    //     payment = document.getElementById("totalPayment").value;
    //     // alert (totId)
    //     // i =0;
    //     idNo = document.querySelector("#memberAge");
    //     for (let i = 0; i <= totId; i++){
    //         return alert(idNo+=i);
    //         if(e>6){
    //             var totPayment = sum(payment,1000);
    //             document.getElementById("totalPayment").value = totPayment;
    //         }else{
    //             document.getElementById("totalPayment").value = payment;
    //         }
    //     }
        
    // }
</script>