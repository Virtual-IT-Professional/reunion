@extends('admin.include')
@section('adminTitle','Clients / Sponsors')
@section('adminContent')
<div class="row">
  <div class="col-12">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <div class="col-12">
    <div class="card mb-3">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Client / Sponsor Logo</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('adminClientStore') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">URL (optional)</label>
              <input type="url" name="url" class="form-control" placeholder="https://...">
            </div>
            <div class="col-md-2">
              <label class="form-label">Ordering</label>
              <input type="number" name="ordering" class="form-control" value="0">
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="active_add" name="active" value="1" checked>
                <label class="form-check-label" for="active_add">Active</label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Logo Image</label>
              <input type="file" name="image" class="form-control" required>
              <small class="text-muted">PNG/JPG/SVG, min 200x100, max 1MB</small>
            </div>
          </div>
          <div class="text-end mt-3">
            <button class="btn btn-primary" type="submit"><i class="mdi mdi-plus"></i> Add Client</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">All Clients</h5>
      </div>
      <div class="card-body table-responsive">
        <table class="table align-middle" id="dataTable">
          <thead>
            <tr>
              <th style="width:40px">#</th>
              <th style="width:90px">Logo</th>
              <th>Name</th>
              <th>URL</th>
              <th style="width:110px">Ordering</th>
              <th style="width:80px">Active</th>
              <th style="width:220px" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($clients as $i => $c)
            <tr>
              <td>{{ $i+1 }}</td>
              <td>
                @if(!empty($c->image))
                  <img src="{{ asset('public/upload/clients/'.$c->image) }}" alt="{{ $c->name }}" style="height:40px" class="img-fluid">
                @else
                  <span class="text-muted">N/A</span>
                @endif
              </td>
              <td>
                <form action="{{ route('adminClientUpdate') }}" method="POST" enctype="multipart/form-data" id="form-client-{{ $c->id }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $c->id }}">
                  <input type="text" name="name" class="form-control form-control-sm" value="{{ $c->name }}" placeholder="Client name">
              </td>
              <td>
                  <input type="url" name="url" class="form-control form-control-sm" value="{{ $c->url }}" placeholder="https://">
              </td>
              <td>
                  <input type="number" name="ordering" class="form-control form-control-sm" value="{{ $c->ordering }}" min="0">
              </td>
              <td class="text-center">
                  <input type="checkbox" name="active" value="1" {{ $c->active ? 'checked' : '' }}>
              </td>
              <td class="text-end">
                  <div class="d-flex justify-content-end gap-1">
                      <input type="file" name="image" class="form-control form-control-sm" style="max-width:160px" title="Replace logo">
                      <button class="btn btn-success btn-sm" type="submit"><i class="mdi mdi-content-save"></i></button>
                      <a href="{{ route('adminClientToggle',$c->id) }}" class="btn btn-warning btn-sm" title="Toggle Active"><i class="mdi mdi-power"></i></a>
                      <a href="{{ route('adminClientDelete',$c->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete this client?')" title="Delete"><i class="mdi mdi-delete"></i></a>
                  </div>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center">No clients added yet.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
