@extends('layouts.app')
@section('content')
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center flex-lg-row-fluid p-10">
            <div class="d-flex justify-content-center flex-column p-15 bg-body shadow-sm rounded w-100 w-md-550px mx-auto">
                <div class="text-center mb-2">
                    <a href="/" class="mb-5 d-inline-block">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-color.png') }}" class="h-80px" />
                    </a>
                </div>
                @if(session('otp_status'))
                <script>
                    Swal.fire({
                        text: "{{ session('otp_status') }}",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                </script>
                @endif
                <form class="form" novalidate="novalidate" action="{{ route('two-factor-authentication-verify') }}" method="POST">
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
                        <h1 class="text-gray-900 mb-3">Two-Factor Authentication</h1>
                        <div class="text-gray-500 fw-semibold fs-6">
                            Please enter the 6-digit code sent to your email.
                        </div>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="form-label fw-bold text-gray-900 fs-6">6-Digit Code</label>
                        <input class="form-control form-control-solid" type="text" name="otp" autocomplete="off" />
                    </div>

                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Verify</span>
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