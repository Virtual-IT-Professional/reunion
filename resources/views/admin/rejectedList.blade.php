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
                <style>
                    @font-face {
                        font-family: 'SutonnyMJ';
                        src: local('SutonnyMJ'),
                             url('{{ asset('public/fonts/SutonnyMJ.woff2') }}') format('woff2'),
                             url('{{ asset('public/fonts/SutonnyMJ.woff') }}') format('woff'),
                             url('{{ asset('public/fonts/SutonnyMJ.ttf') }}') format('truetype');
                        font-display: swap;
                    }
                    .bn-text { font-family: 'SutonnyMJ', Segoe UI, Roboto, Arial, sans-serif; }
                </style>
                <table class="table table-bordered text-center datatable" id="reject">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Village</th>
                        <th>Date Rejected</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(!empty($rejectedList) && count($rejectedList)>0)
                            @php
                                $x = 1;
                            @endphp
                            @foreach($rejectedList as $reject)
                                <tr>
                                    <td class="align-middle text-center">{{ $x }}</td>
                                    <td class="align-middle text-center"><span class="bn-text">{{ $reject->studentName }}</span></td>
                                    <td class="align-middle text-center">
                                        <span>{{ $reject->batch ?? $reject->department }}</span>
                                        <br> ({{ $reject->shift }} Shift)
                                    </td>
                                    <td class="align-middle text-center"><span class="bn-text">{{ $reject->currentAddress }}</span></td>
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
                    </tbody>
                </table>
                <a href="{{ route('pendingList') }}" class="btn btn-warning fw-bold"><i class="fa-sharp fa-regular fa-calendar-clock"></i> Pending List</a>
                <a href="{{ route('verifiedList') }}" class="btn btn-success fw-bold"><i class="fa-duotone fa-solid fa-check-to-slot"></i> Verified List</a>
            </div>
        </div>
    </div>
</div><!-- end row -->

<script>
$(function(){ if (!$.fn.dataTable.isDataTable('#reject')) { $('#reject').DataTable(); } });
</script>
@endsection