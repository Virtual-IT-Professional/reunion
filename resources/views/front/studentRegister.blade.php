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
        <h2 class="display-6 fw-bold text-center">Reunion Registration Form</h2>
    <div class="row align-items-center mt-5">
        <div class="col-10 mx-auto">
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
                    <div class="col-12 col-md-4">
                        <label for="stdName" class="form-label">Your Name(*)</label>
                        <input type="text" class="form-control" id="stdName" required placeholder="Example: Md Abu Yousuf" name="stdName">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Department(*)</label>
                        <select id="dept" class="form-select" required name="dept">
                            <option selected>Choose...</option>
                            <option>Civil</option>
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
                        <label for="dept" class="form-label">Blood Group(*)</label>
                        <select id="dept" class="form-select" required name="blGroup">
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
                        <label for="dept" class="form-label">T-Shirt Size(*)</label>
                        <select id="dept" class="form-select" required name="tShirtSize">
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
                    <div class="col-12 col-md-4">
                        <label for="totalJoin" class="form-label">Total Joining Without You(*)</label>
                        <select name="totalMember" onchange="totMember(this)" id="totalJoin" class="form-control">
                            <option value="">-</option>
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
                    <div class="col-12"><div class="row" id="memberList"></div></div>
                    <div class="col-12">
                        <label for="professionDetails" class="form-label">Profession Details</label>
                        <small>(Designation/Position & Company Name)</small>
                        <input type="text" class="form-control" id="professionDetails" placeholder="Example: Founder-Virtual IT Professional" name="professionDetails">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="totalPayment" class="form-label">Total Payment Amount(*)</label>
                        <input type="number" class="form-control" id="totalPayment" placeholder="Example: 3500" required name="payAmount">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Payment Type(*)</label>
                        <select id="dept" class="form-select" required name="payType">
                            <option selected>Choose...</option>
                            <option>Bkash</option>
                            <option>Nagad</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="txnId" class="form-label">TXNID(*)</label>
                        <input type="text" class="form-control" id="txnId" placeholder="Example: BJP9PG9ZVB" required name="payId">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
            text = "<div class='col-12 col-md-4'><label class='text-success'>Guest Name</label><input type='text' class='form-control border-success text-success' placeholder='Example: Thamina Akter' required name='guestName[]'></div><div class='col-12 col-md-4'><label class='text-success'>Relation</label><select class='form-control border-success text-success' name='guestRelation[]'><option value=''>-</option><option>Spouse</option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option><option>Son</option><option>Daughter</option><option>Other</option></select></div><div class='col-12 col-md-4'><label class='text-success'>Guest Age</label><input onchange='paymentDetails(this.value)' type='number' class='form-control border-success text-success' placeholder='Example: 25' required name='guestAge[]' id='memberAge[]' value=''></div>";
            document.getElementById("memberList").innerHTML += text;
        }
    }
    function sum(x,y){
        a = x;
        b = y;
        c = Number(a)+Number(b);
        return Number(c);
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