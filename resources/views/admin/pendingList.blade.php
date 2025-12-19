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
                <table class="table table-bordered text-center datatable" id="pending">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Village</th>
                        <th>Total Guest</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(!empty($pendingList) && count($pendingList)>0)
                            @php
                                $x = 1;
                            @endphp
                            @foreach($pendingList as $pending)
                                <tr>
                                    <td class="align-middle text-center">{{ $x }}</td>
                                    <td class="align-middle text-center"><span class="bn-text">{{ $pending->studentName }}</span></td>
                                    <td class="align-middle text-center">
                                        <span>{{ $pending->batch ?? $pending->department }}</span>
                                        <br> ({{ $pending->shift }} Shift)
                                    </td>
                                    <td class="align-middle text-center"><span class="bn-text">{{ $pending->currentAddress }}</span></td>
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
                    </tbody>
                </table>
                <a href="{{ route('verifiedList') }}" class="btn btn-success fw-bold"><i class="fa-duotone fa-solid fa-check-to-slot"></i> Verified List</a>
                <a href="{{ route('rejectedList') }}" class="btn btn-danger fw-bold"><i class="fa-regular fa-shuffle"></i> Rejected List</a>
            </div>
        </div>
    </div>
</div><!-- end row -->
<script>
$(function(){ if (!$.fn.dataTable.isDataTable('#pending')) { $('#pending').DataTable(); } });
</script>

@endsection