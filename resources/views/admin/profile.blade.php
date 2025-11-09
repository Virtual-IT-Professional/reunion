@extends('admin.include')
@section('adminTitle')
Profile
@endsection
@section('adminContent')
<div class="row">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Avatar</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ !empty($admin->avatar) ? asset('public/upload/admin/'.$admin->avatar) : asset('public/admin/velzon/html/default/assets/images/users/avatar-1.jpg') }}" class="rounded-circle" style="width:90px;height:90px;object-fit:cover" alt="avatar">
                    <div class="ms-3">
                        <form method="POST" action="{{ route('adminAvatarUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar" class="form-control mb-2" accept="image/*" required>
                            @error('avatar')<div class="text-danger small">{{ $message }}</div>@enderror
                            <button class="btn btn-secondary btn-sm" type="submit">Upload New</button>
                        </form>
                    </div>
                </div>
                <p class="text-muted small">Max size 300KB. Formats: jpeg, png, jpg, gif, svg.</p>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">My Profile</h5>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <form method="POST" action="{{ route('adminProfileUpdate') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="adminName" class="form-control" value="{{ old('adminName', $admin->adminName) }}" required>
                            @error('adminName')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email (readonly)</label>
                            <input type="email" class="form-control" value="{{ $admin->emailAddress }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <select name="department" class="form-control">
                                <option value="">Choose...</option>
                                @foreach($departments as $dep)
                                    <option value="{{ $dep }}" @if(old('department', $admin->department) === $dep) selected @endif>{{ $dep }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Shift</label>
                            <input type="text" name="shift" class="form-control" value="{{ old('shift', $admin->shift) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Batch/Session</label>
                            <input type="text" name="batchSession" class="form-control" value="{{ old('batchSession', $admin->batchSession) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" value="{{ $admin->adminType }}" readonly>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('adminPasswordUpdate') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                            @error('current_password')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                            @error('new_password')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                            @error('confirm_password')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-warning">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
