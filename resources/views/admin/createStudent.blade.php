@extends('admin.include')
@section('adminTitle')
Create Registration
@endsection
@section('adminContent')
<div class="row align-items-center mt-2">
    <div class="col-12 col-xl-10 mx-auto">
        <div class="card card-body shadow p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold mb-0">Create Student Registration</h4>
                <a href="{{ route('adminImportStudents') }}" class="btn btn-outline-secondary">Import via CSV</a>
            </div>
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="row g-3" method="POST" action="{{ route('adminStoreStudent') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-4">
                    <label for="avatar" class="form-label fw-bold">Picture (Passport Size)</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
                <div class="col-12 col-md-4">
                    <label for="stdName" class="form-label">Name*</label>
                    <input type="text" class="form-control" id="stdName" required name="stdName">
                </div>
                <div class="col-12 col-md-4">
                    <label for="dept" class="form-label">Department*</label>
                    <input type="text" class="form-control" id="dept" required name="dept" placeholder="e.g. Power, Civil, Computer">
                </div>
                <div class="col-12 col-md-4">
                    <label for="shift" class="form-label">Shift*</label>
                    <select id="shift" class="form-select" required name="shift">
                        <option value="">Choose...</option>
                        <option>1st</option>
                        <option>2nd</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="phone" class="form-label">Phone*</label>
                    <input type="text" class="form-control" id="phone" required name="phone">
                </div>
                <div class="col-12 col-md-4">
                    <label for="mailAddress" class="form-label">Email*</label>
                    <input type="email" class="form-control" id="mailAddress" required name="mailAddress">
                </div>
                <div class="col-12 col-md-4">
                    <label for="gender" class="form-label">Gender*</label>
                    <select id="gender" class="form-select" required name="gender">
                        <option value="">Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="blGroup" class="form-label">Blood Group*</label>
                    <select id="blGroup" class="form-select" required name="blGroup">
                        <option value="">Choose...</option>
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
                    <label for="tShirtSize" class="form-label">T-Shirt Size*</label>
                    <input type="text" class="form-control" id="tShirtSize" required name="tShirtSize">
                </div>
                <div class="col-12 col-md-6">
                    <label for="currentAddress" class="form-label">Current Address*</label>
                    <input type="text" class="form-control" id="currentAddress" required name="currentAddress">
                </div>
                <div class="col-12 col-md-6">
                    <label for="professionDetails" class="form-label">Profession</label>
                    <input type="text" class="form-control" id="professionDetails" name="professionDetails">
                </div>
                <div class="col-12 col-md-6">
                    <label for="experience" class="form-label">Experience</label>
                    <input type="text" class="form-control" id="experience" name="experience">
                </div>
                <div class="col-12 col-md-3">
                    <label for="totalMember" class="form-label">Number of Guests</label>
                    <select name="totalMember" id="totalMember" class="form-select">
                        @for($i=0;$i<=10;$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-12" id="guestContainer"></div>
                <div class="col-12 mt-3">
                    <h6 class="fw-bold">Payment (optional)</h6>
                </div>
                <div class="col-12 col-md-4">
                    <label for="payAmount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="payAmount" name="payAmount">
                </div>
                <div class="col-12 col-md-4">
                    <label for="payType" class="form-label">Method</label>
                    <select id="payType" class="form-select" name="payType">
                        <option value="">Choose...</option>
                        <option value="1">Bkash</option>
                        <option value="2">Nagad</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="payId" class="form-label">TXNID</label>
                    <input type="text" class="form-control" id="payId" name="payId">
                </div>
                <div class="col-12 col-md-4">
                    <label for="status" class="form-label">Initial Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="PendingVerify">PendingVerify</option>
                        <option value="Verified">Verified</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.getElementById('totalMember').addEventListener('change', function(){
        const n = parseInt(this.value || '0');
        const wrap = document.getElementById('guestContainer');
        wrap.innerHTML = '';
        for(let i=0;i<n;i++){
            wrap.insertAdjacentHTML('beforeend', `
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Guest Name</label>
                        <input type="text" class="form-control" name="guestName[]" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Relation</label>
                        <select class="form-select" name="guestRelation[]" required>
                            <option value="">-</option>
                            <option>Spouse</option>
                            <option>Father</option>
                            <option>Mother</option>
                            <option>Brother</option>
                            <option>Sister</option>
                            <option>Son</option>
                            <option>Daughter</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Age (optional)</label>
                        <select class="form-select" name="guestAge[]">
                            <option value="">-</option>
                            @for($a=0;$a<=15;$a++)
                                <option value="{{ $a }}">{{ $a }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            `);
        }
    });
</script>
@endsection
