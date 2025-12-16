@extends('admin.include')
@section('adminTitle')
Import Registrations
@endsection
@section('adminContent')
<div class="row align-items-center mt-2">
    <div class="col-12 col-xl-8 mx-auto">
        <div class="card card-body shadow p-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="fw-bold mb-0">Import Student Registrations from CSV</h4>
                <a class="btn btn-outline-secondary" href="{{ asset('public/admin/templates/student_import_template.csv') }}" download>
                    Download CSV Template
                </a>
            </div>
            <p class="text-muted">CSV should include headers like: <code>name,dept,shift,phone,email,gender,blGroup,tShirtSize,currentAddress,profession,experience,totalAttend,payType,payId,payAmount,status,rollNo</code>. Unknown columns are ignored.</p>
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form class="row g-3" method="POST" action="{{ route('adminImportStudentsProcess') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label class="form-label fw-bold">CSV File*</label>
                    <input type="file" class="form-control" name="csv" required accept=".csv,text/csv">
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Mode</label>
                    <select class="form-select" name="mode">
                        <option value="upsert">Upsert (create or update by email/phone)</option>
                        <option value="create">Create only (skip existing)</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Default Status</label>
                    <select class="form-select" name="default_status">
                        <option value="PendingVerify">PendingVerify</option>
                        <option value="Verified">Verified</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Guest Behavior (on update)</label>
                    <select class="form-select" name="guest_behavior">
                        <option value="replace">Replace existing guests</option>
                        <option value="append">Append to existing guests</option>
                        <option value="ignore">Ignore guests in CSV</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
            <div class="mt-4">
                <h6 class="fw-bold">Guest Columns</h6>
                <p class="text-muted mb-1">Include guest details using repeated columns:</p>
                <pre class="bg-light p-2 rounded border">guest_1_name,guest_1_relation,guest_1_age, guest_2_name,guest_2_relation,guest_2_age, ...</pre>
                <p class="text-muted mb-0">Only rows with a guest name are imported; age is optional.</p>
            </div>
            @if(Session::has('importLog'))
                <hr>
                <h6 class="fw-bold">Import Details</h6>
                <ul class="mb-0">
                    @foreach(Session::get('importLog') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
