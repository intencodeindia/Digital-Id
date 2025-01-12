@extends('layouts.user')
@section('title', 'My Profile')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card mb-6">
            <div class="card-body pt-9 pb-0">
                <div class="card-body border-top p-9">
                    <div class="d-flex flex-wrap align-items-center">
                        <div id="kt_signin_email">
                            <div class="fs-6 fw-bold mb-1">Email Address</div>
                            <div class="fw-semibold text-gray-600">{{ $vcardDetails->email ?? 'Your Email' }}</div>
                        </div>
                        <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                            <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                <div class="row mb-6">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
                                            <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="{{ $userDetails->email }}">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button id="kt_signin_submit" type="button" class="btn btn-primary btn-sm me-2 px-6">Update Email</button>
                                    <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div id="kt_signin_email_button" class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary btn-sm">Change Email</button>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-6"></div>
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div id="kt_signin_password">
                            <div class="fs-6 fw-bold mb-1">Password</div>
                            <div class="fw-semibold text-gray-600">************</div>
                        </div>
                        <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                            <form id="kt_signin_change_password" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid " name="currentpassword" id="currentpassword">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid " name="newpassword" id="newpassword">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid " name="confirmpassword" id="confirmpassword">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                                <div class="d-flex">
                                    <button id="kt_password_submit" type="button" class="btn btn-primary btn-sm me-2 px-6">Update Password</button>
                                    <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div id="kt_signin_password_button" class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary btn-sm">Reset Password</button>
                        </div>
                    </div>
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                        @if($userDetails->two_factor_authentication == 0)
                        <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
                        @endif
                        @if($userDetails->two_factor_authentication == 1)
                        <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
                        @endif
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <div class="mb-3 mb-md-0 fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
                                <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                            </div>
                            @if($userDetails->two_factor_authentication == 0)
                            <form action="{{ route('twofactor') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm px-6 align-self-center text-nowrap">
                                    Enable
                                </button>
                            </form>
                            @endif
                            @if($userDetails->two_factor_authentication == 1)
                            <form action="{{ route('twofactordisable') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm px-6 align-self-center text-nowrap">
                                    Disable
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection