@extends('layouts.user')
@section('title', 'My Profile')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-column flex-md-row-auto w-100 w-lg-250px w-xxl-275px">
                <div class="card mb-6 mb-xl-9" data-kt-sticky="true" data-kt-sticky-name="account-settings" data-kt-sticky-offset="{default: false, lg: 300}" data-kt-sticky-width="{lg: '250px', xxl: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-zindex="95">
                    <div class="card-body py-10 px-6">
                        <ul id="kt_account_settings" class="nav nav-flush menu menu-column menu-rounded menu-title-gray-600 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-semibold fs-6 mb-2">
                            <li class="menu-item px-3 pt-0 pb-1">
                                <a href="#kt_account_settings_overview" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link active">
                                    <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                                    <span class="menu-title">Overview</span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0 pb-1">
                                <a href="#kt_account_settings_signin_method" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                                    <span class="menu-title">Sign-in Method</span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0 pb-1">
                                <a href="#kt_account_settings_profile_details" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                                    <span class="menu-title">Profile Details</span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0">
                                <a href="#kt_account_settings_notifications" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                                    <span class="menu-title">Notifications</span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0">
                                <a href="#kt_account_settings_deactivate" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                                    <span class="menu-title">Deactivate Account</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex-md-row-fluid ms-lg-12">
                <div class="card  mb-5 mb-xl-10" id="kt_account_settings_overview" data-kt-scroll-offset="{default: 100, md: 125}">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_overview">
                        <div class="card-title">
                            <h3 class="fw-bold m-0">Overview</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_overview" class="collapse show">
                        <div class="card-body border-top p-9">
                            <div class="d-flex align-items-start flex-wrap">
                                <div class="d-flex flex-wrap">
                                    <div class="symbol symbol-125px mb-7 me-7 position-relative">
                                        <img src="/good/assets/media/avatars/300-1.jpg" alt="image">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="fs-2 fw-bold mb-1">{{ Auth::user()->name }}</div>
                                        <div class="fs-2 fw-bold mb-1">{{ $vcardDetails->title }}</div>
                                        <a href="#" class="text-gray-500 text-hover-primary fs-6 fw-semibold mb-5">{{ Auth::user()->email }}</a>
                                        <div class="badge badge-light-success text-success fw-bold fs-7 me-auto mb-3 px-4 py-3">{{ Auth::user()->role }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card  mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Sign-in Method</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <div class="card-body border-top p-9">
                            <div class="d-flex flex-wrap align-items-center">
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                                    <div class="fw-semibold text-gray-600">{{ $vcardDetails->email }}</div>
                                </div>
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
                                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="support@keenthemes.com">
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
                                            <button id="kt_signin_submit" type="button" class="btn btn-primary  me-2 px-6">Update Email</button>
                                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
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
                                            <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                                </div>
                            </div>
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                                <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                    <div class="mb-3 mb-md-0 fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
                                        <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                                    </div>
                                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form id="kt_account_profile_details_form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <!-- Avatar Section -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/good/assets/media/svg/avatars/blank.svg')">
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $userDetails->profile_photo ? asset('uploads/avatars/'.$userDetails->profile_photo) : '/good/assets/media/avatars/300-1.jpg' }})"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar">
                                                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                                <input type="file" name="profile_photo" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="avatar_remove">
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar">
                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </span>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar">
                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                </div>

                                <!-- Full Name -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="{{ $userDetails->name }}" required>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Phone Number</span>
                                    </label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{ $userDetails->phone }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                </div>

                                <!-- Bio -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Bio</label>
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="bio" class="form-control form-control-lg form-control-solid" placeholder="Write something about yourself">{{ $userDetails->bio }}</textarea>
                                    </div>
                                </div>

                                <!-- Organization -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Organization</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="organization" class="form-control form-control-lg form-control-solid" placeholder="Organization name" value="{{ $vcardDetails->organization ?? '' }}">
                                    </div>
                                </div>

                                <!-- Website -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Website</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="url" name="website" class="form-control form-control-lg form-control-solid" placeholder="Website URL" value="{{ $vcardDetails->website ?? '' }}">
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="address" class="form-control form-control-lg form-control-solid" placeholder="Your address">{{ $vcardDetails->address ?? '' }}</textarea>
                                    </div>
                                </div>

                                <!-- Social Media -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Social Media</label>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="url" name="social_media_facebook" class="form-control form-control-lg form-control-solid" placeholder="Facebook URL" value="{{ $vcardDetails->social_media_facebook ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input type="url" name="social_media_twitter" class="form-control form-control-lg form-control-solid" placeholder="Twitter URL" value="{{ $vcardDetails->social_media_twitter ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">LinkedIn</label>
                                            <input type="url" name="social_media_linkedin" class="form-control form-control-lg form-control-solid" placeholder="LinkedIn URL" value="{{ $vcardDetails->social_media_linkedin ?? '' }}">
                                        </div>
                                        <div>
                                            <label class="form-label">Instagram</label>
                                            <input type="url" name="social_media_instagram" class="form-control form-control-lg form-control-solid" placeholder="Instagram URL" value="{{ $vcardDetails->social_media_instagram ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer with Submit Button -->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
