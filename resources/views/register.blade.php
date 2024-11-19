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

                <form class="form" novalidate="novalidate" id="kt_free_trial_form" action="{{ route('registeruser') }}" method="POST">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-gray-900 mb-3">Create Account</h1>
                    </div>

                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-xl-6">
                            <label class="form-label fw-bold text-gray-900 fs-6">First Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first-name" autocomplete="off" />
                        </div>

                        <div class="col-xl-6">
                            <label class="form-label fw-bold text-gray-900 fs-6">Last Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" data-kt-redirect-url="/login" type="email" placeholder="" name="email" autocomplete="off" />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bold text-gray-900 fs-6">
                                Password
                            </label>
                            <!--end::Label-->

                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />

                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i> </span>
                            </div>
                            <!--end::Input wrapper-->

                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Hint-->
                        <div class="text-muted">
                            Use 8 or more characters with a mix of letters, numbers & symbols.
                        </div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group--->

                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bold text-gray-900 fs-6">Confirm Password</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                            <span class="form-check-label fw-semibold text-gray-700 fs-6">
                                I Agree <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                            </span>
                        </label>
                    </div>
                    <!--end::Input group-->

                    <div class="text-center">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">
                                Submit
                            </span>
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

<script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>