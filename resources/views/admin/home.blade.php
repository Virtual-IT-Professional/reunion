@extends('admin.include')
@section('adminTitle')
Dashboard
@endsection
@section('adminContent')
@php
    $verifiedList = \App\Models\studentRegister::where(['status'=>'Verified'])->orderby('id','DESC')->get();
    $pendingList = \App\Models\studentRegister::where(['status'=>'PendingVerify'])->orderby('id','DESC')->get();
    $verifiedGuest = \App\Models\geustRegister::where(['status'=>'Verified'])->orderby('id','DESC')->get();

    $todayRegister = \App\Models\studentRegister::whereDay('updated_at',now())->get();

    $totalRegister = count($verifiedList)+count($verifiedGuest);
@endphp
<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
                                    <i class="fa-solid fa-users-rays"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Pending List</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ count($pendingList) }}">{{ count($pendingList) }}</span></h4>
                                </div>
                                <p class="text-muted text-truncate mb-0">Newly register</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                    <i class="fa-solid fa-users"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-uppercase fw-medium text-muted mb-3">Total Register</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ $totalRegister }}">{{ $totalRegister }}</span></h4>
                                </div>
                                <p class="text-muted mb-0">Student & Guest</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
                                    <i class="fa-solid fa-user-graduate"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Total Student</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ count($verifiedList) }}">{{ count($verifiedList) }}</span></h4>
                                </div>
                                <p class="text-muted text-truncate mb-0">Total student</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->
            <div class="col-xl-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
                                    <i class="fa-solid fa-user-group-crown"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Total Guest</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ count($verifiedGuest) }}">{{ count($verifiedGuest) }}</span></h4>
                                </div>
                                <p class="text-muted text-truncate mb-0">Total guest</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-12 col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">Verified Members</div>
                    <div class="card-body table-responsive">
                        <table class="table text-center" id="dataTable">
                            <thead>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Total Guest</th>
                                <th>Method</th>
                                <th>Amout</th>
                                <th>Verify Date</th>
                                <th>Action</th>
                            </thead>
                            <thead>
                                @if(!empty($verifiedList) && count($verifiedList)>0)
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach($verifiedList as $verify)
                                        <tr>
                                            <td class="align-middle text-center">{{ $x }}</td>
                                            <td class="align-middle text-center">{{ $verify->studentName }}</td>
                                            <td class="align-middle text-center">{{ $verify->department  }}
                                                <br> ({{ $verify->shift  }} Shift)
                                            </td>
                                            <td class="align-middle text-center">{{ $verify->totalAttend  }}</td>
                                            <td class="align-middle text-center">@if($verify->paymentBy==1) Bkash @endif @if($verify->paymentBy==2) Nagad @endif</td>
                                            <td class="align-middle text-center">{{ $verify->paymentAmount }} BDT<br>TXN ID: {{ $verify->paymentId }}</td>
                                            <td class="align-middle text-center">{{ \Carbon\Carbon::parse($verify->updated_at)->format('d/m/Y') }}</td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('viewPerticipate',['id'=>$verify->id]) }}" class="btn btn-success btn-sm my-1">
                                                    <i class="fa-sharp fa-light fa-eye"></i>
                                                </a> 
                                                <a href="{{ route('returnPending',['id'=>$verify->id]) }}" class="btn btn-warning btn-sm my-1">
                                                    <i class="fa-sharp fa-light fa-calendar-clock"></i>
                                                </a> 
                                            </td>
                                        </tr>
                                    @php
                                        $x++;
                                    @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center py-2">Sorry! No data found</td>
                                    </tr>
                                @endif
                            </thead>                        
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">Pending for Verify</div>
                    <div class="card-body table-responsive">
                        <table class="table text-center" id="dataTable">
                            <thead>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Total Guest</th>
                                <th>Method</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </thead>
                            <thead>
                                @if(!empty($pendingList) && count($pendingList)>0)
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach($pendingList as $pending)
                                        <tr>
                                            <td class="align-middle text-center">{{ $x }}</td>
                                            <td class="align-middle text-center">{{ $pending->studentName }}</td>
                                            <td class="align-middle text-center">{{ $pending->department  }}
                                                <br> ({{ $pending->shift  }} Shift)
                                            </td>
                                            <td class="align-middle text-center">{{ $pending->totalAttend  }}</td>
                                            <td class="align-middle text-center">@if($pending->paymentBy==1) Bkash @endif @if($pending->paymentBy==2) Nagad @endif</td>
                                            <td class="align-middle text-center">{{ $pending->paymentAmount }} BDT<br>TXN ID: {{ $pending->paymentId }}</td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('acceptRegister',['id'=>$pending->id]) }}" onclick="alert('Are you sure, you verify the data?')" class="btn btn-success btn-sm my-1">
                                                    <i class="fa-solid fa-badge-check"></i>
                                                </a> 
                                                <a href="{{ route('rejectRegister',['id'=>$pending->id]) }}" onclick="alert('Are you sure to reject/cancel the register? It can not be undone')" class="btn btn-danger btn-sm my-1">
                                                    <i class="fa-sharp fa-regular fa-circle-xmark"></i>
                                                </a>
                                                <a href="{{ route('viewPerticipate',['id'=>$pending->id]) }}" class="btn btn-success btn-sm my-1">
                                                    <i class="fa-sharp fa-light fa-eye"></i>
                                                </a> 
                                            </td>
                                        </tr>
                                    @php
                                        $x++;
                                    @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center py-2">Sorry! No data found</td>
                                    </tr>
                                @endif
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

@endsection