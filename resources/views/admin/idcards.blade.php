@extends('admin.include')
@section('adminTitle')
ID Cards
@endsection
@section('adminContent')
<style>
    @font-face {
        font-family: 'SutonnyMJ';
        src: local('SutonnyMJ'),
             url('{{ asset('public/fonts/SutonnyMJ.woff2') }}') format('woff2'),
             url('{{ asset('public/fonts/SutonnyMJ.woff') }}') format('woff'),
             url('{{ asset('public/fonts/SutonnyMJ.ttf') }}') format('truetype');
        font-display: swap;
    }
    .bn-text { font-family: 'SutonnyMJ','Nikosh','SolaimanLipi','Kalpurush','AdorshoLipi','Bangla','Bangla MN','Noto Sans Bengali', Segoe UI, Roboto, Arial, sans-serif; }
</style>
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
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span>Student ID Cards</span>
                    @php
                        $batches = collect($students)->map(function($s){ return $s->batch ?? $s->department; })->filter()->unique()->values();
                    @endphp
                    <div class="d-flex align-items-center gap-2">
                        <select id="batchSelect" class="form-select form-select-sm" style="min-width:180px;">
                            <option value="">Select Batch</option>
                            @foreach($batches as $b)
                                <option value="{{ $b }}">{{ $b }}</option>
                            @endforeach
                        </select>
                        <form id="batchIssueForm" method="POST" action="{{ route('issueIdCardsBatch') }}">
                            @csrf
                            <input type="hidden" name="batch" id="batchIssueValue">
                            <button type="submit" class="btn btn-sm btn-outline-primary" onclick="return setBatchValue()">Issue for Batch</button>
                        </form>
                        <form id="batchPrintForm" method="GET" action="{{ route('printIdCardsBatch') }}" target="_blank">
                            <input type="hidden" name="batch" id="batchPrintValue">
                            <button type="submit" class="btn btn-sm btn-secondary" onclick="return setBatchValue(true)">Open Batch Print</button>
                        </form>
                        <form id="batchRegenForm" method="POST" action="{{ route('regenerateIdCards') }}" onsubmit="return setBatchValueFor('batchRegenValue')">
                            @csrf
                            <input type="hidden" name="batch" id="batchRegenValue">
                            <button type="submit" class="btn btn-sm btn-warning">Regenerate IDs (Batch)</button>
                        </form>
                        <form id="regenAllOldForm" method="POST" action="{{ route('regenerateIdCardsAllOld') }}" onsubmit="return confirm('Regenerate all old-format/empty IDs?')">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Regenerate IDs (All old)</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle datatable" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Shift</th>
                            <th>Village</th>
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
                            <td><span class="bn-text">{{ $s->studentName }}</span></td>
                            <td><span>{{ $s->batch ?? $s->department }}</span></td>
                            <td>{{ $s->shift }}</td>
                            <td><span class="bn-text">{{ $s->currentAddress }}</span></td>
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
<script>
function setBatchValue(forPrint){
    const sel = document.getElementById('batchSelect');
    const val = sel ? sel.value : '';
    if(!val){ alert('Please select a batch'); return false; }
    if(forPrint){ document.getElementById('batchPrintValue').value = val; }
    else { document.getElementById('batchIssueValue').value = val; }
    return true;
}
function setBatchValueFor(hiddenId){
    const sel = document.getElementById('batchSelect');
    const val = sel ? sel.value : '';
    if(!val){ alert('Please select a batch'); return false; }
    const hid = document.getElementById(hiddenId);
    if(hid){ hid.value = val; return true; }
    return false;
}
</script>
@endsection
