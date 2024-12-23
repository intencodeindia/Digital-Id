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

                <!-- Check for Errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="form" novalidate="novalidate" id="kt_organization_registration_form" action="{{ route('organization.register.action') }}" method="POST">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-gray-900 mb-3">Create Organization Account</h1>
                    </div>

                    <!-- Organization Name -->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Organization Name</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="organization-name" autocomplete="off" value="{{ old('organization-name') }}" />
                    </div>

                    <!-- Organization Username -->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Organization Username</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="organization-username" autocomplete="off" value="{{ old('organization-username') }}" />
                    </div>

                    <!-- Organization Email -->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" name="organization-email" autocomplete="off" value="{{ old('organization-email') }}" />
                    </div>

                    <!-- Organization Phone -->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Phone Number</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="organization-phone" autocomplete="off" value="{{ old('organization-phone') }}" />
                    </div>

                    <!-- Password -->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <label class="form-label fw-bold text-gray-900 fs-6">Password</label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid" type="password" name="organization-password" autocomplete="off" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i> </span>
                        </div>
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bold text-gray-900 fs-6">Confirm Password</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" name="organization-confirm-password" autocomplete="off" />
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" checked name="organization-toc" value="1" />
                            <span class="form-check-label fw-semibold text-gray-700 fs-6">I Agree <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="{{ asset('assets/js/custom/authentication/sign-up/organization-general.js') }}"></script>