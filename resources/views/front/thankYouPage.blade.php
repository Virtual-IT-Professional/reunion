@extends('front.include')
@section('frontBody')
<div class="container p-4" style="margin: 10rem auto;">
    <div class="row align-items-center mt-4">
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
                <div class="row">
                    <div class="col-8 col-md-5 mx-auto">
                        <a class="fw-bold btn btn-success my-2" href="{{ url('/') }}">
                            Back to Home
                        </a>
                        <a class="fw-bold btn btn-danger my-2" href="{{ route('studentRegister') }}">
                            Go back Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection