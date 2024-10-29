@extends('front.include')
@section('frontBody')
<div class="container p-4">
    <div class="row align-items-center mt-5">
        <div class="col-11 mx-auto">
            <div class="card card-body shadow p-4">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                
                <a class="fw-bold btn btn-success" href="{{ url('/') }}">Back to Home</a>
                <a class="fw-bold btn btn-danger" href="{{ route('studentRegister') }}">Go back Register</a>
            </div>
        </div>
    </div>
</div>
@endsection