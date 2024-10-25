@extends('front.include')
@section('frontBody')<!-- start hero section -->
        <section id="home" class="p-0 parallax mobile-height wow animate__fadeIn" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('/public/front/html/') }}/images/cpi_cover.jfif');">
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
        <div class="col-12 col-md-5 mx-auto">
            <p class="fw-bold h6 my-4">Registration Fee</p>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item"><b>General:</b> 1530 BDT(Including Vat)</li>
                <li class="list-group-item"><b>Family Member/Guest:</b> 1000 BDT(Including Vat)</li>
            </ol>
            <p><small class="text-success">*Don't need to register below 6 years baby</small></p>
            <p class="fw-bold h6 my-2">Payment Procedure</p>
            <ul class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Bkash</div>
                    01972-006267
                    </div>
                    <span class="badge text-bg-primary rounded-pill">Make Payment</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Nagad</div>
                    01972-006267
                    </div>
                    <span class="badge text-bg-primary rounded-pill">Make Payment</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-10 mx-auto">
            <div class="card card-body shadow p-4">
                <form class="row g-3">
                    <div class="col-12 col-md-4">
                        <label for="stdName" class="form-label">Your Name(*)</label>
                        <input type="text" class="form-control" id="stdName" required placeholder="Example: Md Abu Yousuf">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Department(*)</label>
                        <select id="dept" class="form-select" required>
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
                        <select id="shift" class="form-select" required>
                            <option selected>Choose...</option>
                            <option>1st</option>
                            <option>2nd</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="phone" class="form-label">Phone/Mobile(*)</label>
                        <input type="text" class="form-control" id="phone" placeholder="Example: 01716-841785" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="stdMail" class="form-label">e-Mail(*)</label>
                        <input type="email" class="form-control" id="stdMail" placeholder="Example: vitprofessional@gmail.com" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Blood Group(*)</label>
                        <select id="dept" class="form-select" required>
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
                        <select id="dept" class="form-select" required>
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
                        <label for="totalJoin" class="form-label">Total Joining Without You(*)</label>
                        <input type="number" class="form-control" id="totalJoin" placeholder="Example: 03" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="currentAddress" class="form-label">Current Address(*)</label><br>
                        <small>(Briefly Describe Current Location)</small>
                        <input type="text" class="form-control" id="currentAddress" placeholder="Apartment, studio, or floor" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="professionDetails" class="form-label">Profession Details</label>
                        <br><small>(Designation/Position/Company Name etc)</small>
                        <input type="text" class="form-control" id="professionDetails" placeholder="Example: Founder-Virtual IT Professional">
                    </div>
                    <div class="col-12">
                        <label for="totalJoin" class="form-label">Family/Guest Name</label></br>
                        <small class="text-danger">(Please mention age-only for baby & relation. Must be separate by comma)</small>
                        <input type="text" class="form-control" id="totalJoin" placeholder="Example: Tahmina Akter Wife, Orin Jahan (10) Daughter" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="dept" class="form-label">Payment Type(*)</label>
                        <select id="dept" class="form-select" required>
                            <option selected>Choose...</option>
                            <option>Bkash</option>
                            <option>Nagad</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="txnId" class="form-label">TXNID(*)</label>
                        <input type="text" class="form-control" id="txnId" placeholder="Example: BJP9PG9ZVB" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="totalJoin" class="form-label">Total Payment Amount(*)</label>
                        <input type="number" class="form-control" id="totalJoin" placeholder="Example: 3500" required>
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