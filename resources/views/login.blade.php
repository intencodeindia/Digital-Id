@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center flex-lg-row-fluid p-10">
            <div class="d-flex justify-content-center flex-column p-15 bg-body shadow-sm rounded w-100 w-md-550px mx-auto">
                <div class="text-center mb-2">
                    <a href="/" class="mb-5 d-inline-block">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo.jpg') }}" class="h-80px" />
                    </a>
                </div>

                <form class="form" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="text-center mb-10">
                        <h1 class="text-gray-900 mb-3">Sign In</h1>
                        <div class="text-gray-500 fw-semibold fs-6">
                            New Here? <a href="{{ url('/register') }}" class="link-primary">Create an Account</a>
                        </div>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
                        <input class="form-control form-control-solid" type="email" name="email" autocomplete="off" />
                    </div>

                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bold text-gray-900 fs-6">Password</label>
                            <a href="#" class="link-primary fs-6 fw-bold">Forgot Password?</a>
                        </div>
                        <input class="form-control form-control-solid" type="password" name="password" autocomplete="off" />
                    </div>

                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Sign In</span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection