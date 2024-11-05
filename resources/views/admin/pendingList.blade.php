@extends('admin.include')
@section('adminTitle')
Pending Student
@endsection
@section('adminContent')
<div class="row project-wrapper">
    <div class="col-12 col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Pending Student List</h3>
            </div>
            <div class="card-body">
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
                <table class="table table-bordered">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Shift</th>
                        <th>Total Participat</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>TXN ID</th>
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
                                    <td class="align-middle text-center">{{ $pending->department  }}</td>
                                    <td class="align-middle text-center">{{ $pending->shift  }}</td>
                                    <td class="align-middle text-center">{{ $pending->totalAttend  }}</td>
                                    <td class="align-middle text-center">@if($pending->paymentBy==1) Bkash @endif @if($pending->paymentBy==2) Nagad @endif</td>
                                    <td class="align-middle text-center">{{ $pending->paymentAmount  }}</td>
                                    <td class="align-middle text-center">{{ $pending->paymentId  }}</td>
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
                <a href="{{ route('verifiedList') }}" class="btn btn-success fw-bold"><i class="fa-duotone fa-solid fa-check-to-slot"></i> Verified List</a>
                <a href="{{ route('rejectedList') }}" class="btn btn-danger fw-bold"><i class="fa-regular fa-shuffle"></i> Rejected List</a>
            </div>
        </div>
    </div>
</div><!-- end row -->

@endsection