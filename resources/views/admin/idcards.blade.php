@extends('admin.include')
@section('adminTitle')
ID Cards
@endsection
@section('adminContent')
<div class="row">
    <div class="col-12">
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Student ID Cards</div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Dept</th>
                            <th>Shift</th>
                            <th>Status</th>
                            <th>ID Card No</th>
                            <th>ID Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $i => $s)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $s->studentName }}</td>
                            <td>{{ $s->department }}</td>
                            <td>{{ $s->shift }}</td>
                            <td>
                                <span class="badge bg-{{ $s->status==='Verified' ? 'success' : ($s->status==='Rejected' ? 'danger' : 'warning') }}">{{ $s->status }}</span>
                            </td>
                            <td>{{ $s->id_card_number ?? '-' }}</td>
                            <td>{{ $s->id_card_status ?? 'NotIssued' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ route('issueIdCard',['id'=>$s->id]) }}" class="d-flex gap-2">
                                        @csrf
                                        <input type="text" class="form-control form-control-sm" name="id_card_number" placeholder="Auto" style="max-width: 150px;" value="{{ $s->id_card_number ?? '' }}">
                                        <button class="btn btn-sm btn-outline-primary" {{ $s->id_card_status==='Printed' ? 'disabled' : '' }}>Issue</button>
                                    </form>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('printIdCard',['id'=>$s->id]) }}" target="_blank">Print</a>
                                    <form method="POST" action="{{ route('markIdCardPrinted',['id'=>$s->id]) }}">
                                        @csrf
                                        <button class="btn btn-sm btn-success" {{ $s->id_card_status==='Printed' ? 'disabled' : '' }}>Mark Printed</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
