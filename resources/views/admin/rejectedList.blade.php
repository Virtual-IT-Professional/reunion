@extends('admin.include')
@section('adminTitle')
Reject Student
@endsection
@section('adminContent')
<div class="row project-wrapper">
    <div class="col-12 col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Reject Student List</h3>
            </div>
            <div class="card-body table-responsive">
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
                        <th>Date Verify</th>
                        <th>Verified By</th>
                        <th>Action</th>
                    </thead>
                    <thead>
                        @if(!empty($rejectedList) && count($rejectedList)>0)
                            @php
                                $x = 1;
                            @endphp
                            @foreach($rejectedList as $reject)
                                <tr>
                                    <td class="align-middle text-center">{{ $x }}</td>
                                    <td class="align-middle text-center">{{ $reject->studentName }}</td>
                                    <td class="align-middle text-center">{{ $reject->department  }}</td>
                                    <td class="align-middle text-center">{{ $reject->shift  }}</td>
                                    <td class="align-middle text-center">{{ $reject->totalAttend  }}</td>
                                    <td class="align-middle text-center">{{ $reject->paymentBy }}</td>
                                    <td class="align-middle text-center">{{ $reject->paymentId  }}</td>
                                    <td class="align-middle text-center">-</td>
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
                <a href="{{ route('pendingList') }}" class="btn btn-warning fw-bold"><i class="fa-sharp fa-regular fa-calendar-clock"></i> Pending List</a>
                <a href="{{ route('verifiedList') }}" class="btn btn-success fw-bold"><i class="fa-duotone fa-solid fa-check-to-slot"></i> Verified List</a>
            </div>
        </div>
    </div>
</div><!-- end row -->

@endsection