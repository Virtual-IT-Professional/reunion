@extends('admin.include')
@section('adminTitle') Team @endsection
@section('adminContent')
<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card mb-4">
            <div class="card-header">Add Team Member</div>
            <div class="card-body">
                @if(Session::has('success'))<div class="alert alert-success">{{ Session::get('success') }}</div>@endif
                @if(Session::has('error'))<div class="alert alert-danger">{{ Session::get('error') }}</div>@endif
                <form method="POST" action="{{ route('adminTeamStore') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Name*</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Designation</label>
                        <select name="role" class="form-control">
                            <option value="">Choose...</option>
                            @foreach($designations as $des)
                                <option value="{{ $des }}">{{ $des }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Department</label>
                        <select name="department" class="form-control">
                            <option value="">Choose...</option>
                            @foreach($departments as $dep)
                                <option value="{{ $dep }}">{{ $dep }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label">Ordering</label>
                            <input type="number" name="ordering" class="form-control" value="0">
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Active</label><br>
                            <input type="checkbox" name="active" value="1" checked>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Facebook</label>
                        <input type="url" name="facebook" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Twitter</label>
                        <input type="url" name="twitter" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Google+</label>
                        <input type="url" name="google" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Instagram</label>
                        <input type="url" name="instagram" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Avatar (500KB max)</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Add Member</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-header">Team Members</div>
            <div class="card-body table-responsive">
                <table class="table table-sm align-middle">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $m)
                        <tr>
                            <td>{{ $m->ordering }}</td>
                            <td>@if($m->avatar)<img src="{{ asset('public/upload/team/'.$m->avatar) }}" style="height:50px;width:50px;object-fit:cover" class="rounded"/>@endif</td>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->role }}</td>
                            <td>{!! $m->active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="collapse" data-bs-target="#edit{{ $m->id }}">Edit</button>
                                <a href="{{ route('adminTeamDelete',['id'=>$m->id]) }}" onclick="return confirm('Delete member?')" class="btn btn-sm btn-danger">Del</a>
                            </td>
                        </tr>
                        <tr class="collapse" id="edit{{ $m->id }}">
                            <td colspan="6">
                                <form method="POST" action="{{ route('adminTeamUpdate') }}" enctype="multipart/form-data" class="border p-3 rounded bg-light">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $m->id }}" />
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Name*</label>
                                            <input type="text" name="name" class="form-control" value="{{ $m->name }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <select name="role" class="form-control">
                                                <option value="">Choose...</option>
                                                @foreach($designations as $des)
                                                    <option value="{{ $des }}" @if($m->role === $des) selected @endif>{{ $des }}</option>
                                                @endforeach
                                                @if($m->role && !in_array($m->role, $designations))
                                                    <option value="{{ $m->role }}" selected>{{ $m->role }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Department</label>
                                            <select name="department" class="form-control">
                                                <option value="">Choose...</option>
                                                @foreach($departments as $dep)
                                                    <option value="{{ $dep }}" @if($m->department === $dep) selected @endif>{{ $dep }}</option>
                                                @endforeach
                                                @if($m->department && !in_array($m->department,$departments))
                                                    <option value="{{ $m->department }}" selected>{{ $m->department }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Ordering</label>
                                            <input type="number" name="ordering" class="form-control" value="{{ $m->ordering }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Active</label><br>
                                            <input type="checkbox" name="active" value="1" @if($m->active) checked @endif>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Facebook</label>
                                            <input type="url" name="facebook" class="form-control" value="{{ $m->facebook }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Twitter</label>
                                            <input type="url" name="twitter" class="form-control" value="{{ $m->twitter }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Google+</label>
                                            <input type="url" name="google" class="form-control" value="{{ $m->google }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Instagram</label>
                                            <input type="url" name="instagram" class="form-control" value="{{ $m->instagram }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Avatar (replace)</label>
                                            <input type="file" name="avatar" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-success" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center text-muted">No team members yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
