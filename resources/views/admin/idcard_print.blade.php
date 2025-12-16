@extends('admin.include')
@section('adminTitle')
Print ID Card
@endsection
@section('adminContent')
@php
    $avatar = !empty($student->avatar) ? asset('public/upload/student/'.$student->avatar) : asset('public/admin/velzon/html/default/assets/images/users/avatar-1.jpg');
@endphp
<div class="row">
    <div class="col-12 col-md-8 mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <img src="{{ $avatar }}" alt="Avatar" class="rounded" style="width:100px;height:100px;object-fit:cover;">
                    </div>
                    <div class="col">
                        <h4 class="mb-1">{{ $student->studentName }}</h4>
                        <div>Department: <b>{{ $student->department }}</b> &nbsp; | &nbsp; Shift: <b>{{ $student->shift }}</b></div>
                        <div>ID Card No: <b>{{ $student->id_card_number }}</b></div>
                    </div>
                </div>
                <hr>
                <div class="p-3" style="border:2px dashed #ddd">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div><b>Gender:</b> {{ $student->gender }}</div>
                            <div><b>Blood Group:</b> {{ $student->blGroup }}</div>
                            <div><b>Phone:</b> {{ $student->phone }}</div>
                        </div>
                        <div class="text-end">
                            <img src="{{ asset('public/admin/velzon/html/default/') }}/assets/images/adminLogo.png" alt="Logo" style="height:60px">
                            <div class="text-muted">CPI Reunion {{ date('Y') }}</div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button onclick="window.print()" class="btn btn-primary"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
