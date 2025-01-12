@extends('layouts.user')
@section('title', 'My Profile')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card mb-6">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('/assets/media/avatars/300-1.webp') }}" alt="image">
                            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle h-15px w-15px"></div>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-1">
                                        <h1 class="name">{{ $userDetails->name ?? 'Your Name' }}</h1>
                                        <?php
                                        // Get the current URL
                                        $currentUrl = url()->current();

                                        // Check if the current URL is either '/two-factor-authentication' or '/two-factor-authentication-disable'
                                        if ($currentUrl == url('/two-factor-authentication') || $currentUrl == url('/two-factor-authentication-disable')) {
                                            // Redirect to the '/profile' page
                                            return redirect()->to('/profile');
                                        }
                                        ?>


                                    </a>
                                    <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i></a>
                                </div>
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-address-book fs-4 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> {{ $vcardDetails->title ?? 'Your Title' }}
                                    </a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-geolocation fs-4 me-1"><span class="path1"></span><span class="path2"></span></i> {{ $vcardDetails->address ?? 'Your Address' }}
                                    </a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                        <i class="ki-duotone ki-sms fs-4 me-1"><span class="path1"></span><span class="path2"></span></i> {{ $userDetails->email ?? 'Your Email' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                @if(Auth::check())
                                @if(Auth::user()->hasRole('organization'))
                                <div class="d-flex flex-wrap">
                                    <div class="border border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="fs-1 fw-bold counted" data-kt-countup="true" data-kt-countup-value="300" data-kt-initialized="1">300</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Total Employees</div>
                                    </div>
                                    <div class="border border-dashed rounded min-w-125px py-2 px-4 me-6 mb-3">
                                        <div class="fs-1 fw-bold counted" data-kt-countup="true" data-kt-countup-value="10" data-kt-initialized="1">10</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Total Departments</div>
                                    </div>
                                </div>
                                @elseif(Auth::user()->hasRole('user'))
                                <div class="d-flex flex-wrap">
                                    <div class="border border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="fs-1 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $services->count() }}" data-kt-initialized="1">{{ $services->count() }}</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Total Services</div>
                                    </div>
                                    <div class="border border-dashed rounded min-w-125px py-2 px-4 me-6 mb-3">
                                        <div class="fs-1 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $portfolios->count() }}" data-kt-initialized="1">{{ $portfolios->count() }}</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Total Portfolio</div>
                                    </div>
                                    <div class="border border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="fs-1 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $documents->count() }}" data-kt-initialized="1">{{ $documents->count() }}</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Total Documents</div>
                                    </div>
                                </div>
                                @endif
                                @endif
                            </div>
                            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-semibold fs-6 text-gray-500">Profile Status</span>
                                    <span class="fw-bold fs-6">68%</span>
                                </div>
                                <div class="h-5px mx-3 w-100 bg-light   rounded mb-3">
                                    <div class="bg-primary rounded h-5px" role="progressbar" style="width: 68%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-6 mb-xl-9">
                    <div class="card-header border-0 cursor-pointer" role="button">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                    </div>
                    <div class="card-body border-top p-9">
                        <form id="kt_account_profile_details_form"
                            method="POST"
                            action="{{ route('profileupdate') }}"
                            enctype="multipart/form-data"
                            class="form fv-plugins-bootstrap5 fv-plugins-framework"
                            novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <!-- Avatar Section -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('https://ui-avatars.com/api/?name={{ $userDetails->name }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ $userDetails->profile_photo ? asset("uploads/avatars/" . $userDetails->profile_photo) : 'https://ui-avatars.com/api/?name=' . $userDetails->name }}')">
                                        </div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip"
                                            aria-label="Change avatar"
                                            data-bs-original-title="Change avatar">
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
                            <!-- Title -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Title</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="title" class="form-control form-control-lg form-control-solid" placeholder="Title" value="{{ $vcardDetails->title ?? '' }}">
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
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary btn-sm" id="kt_account_profile_details_submit">Save Changes</button>
                    </div>
                    </form>
                </div>
    </div>
</div>
@endsection