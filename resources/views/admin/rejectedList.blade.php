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
                <table class="table table-bordered text-center" id="reject">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Date Rejected</th>
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
                                    <td class="align-middle text-center">{{ $reject->department  }}
                                        <br> ({{ $reject->shift  }} Shift)
                                    </td>
                                    <td class="align-middle text-center">{{ \Carbon\Carbon::parse($reject->updated_at)->format('d/m/Y') }}</td>
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

<script>
$(document).ready( function () {
    $('#reject').DataTable();
} );
</script>
@endsection