@extends('layouts.user')
@section('title', 'My Profile')
@section('content')
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error', 
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <div class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($userDetails->name) }}" 
                                     alt="Profile Photo">
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $userDetails->name }}</span>
                                    </div>
                                </div>
                                <div class="d-flex my-4">
                                    <button type="button" class="btn btn-sm btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#updateProfilePhotoModal">
                                        <i class="ki-duotone ki-camera fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Change Photo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Photo Update Modal -->
                    <div class="modal fade" id="updateProfilePhotoModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Profile Photo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="image-input image-input-outline" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px" 
                                                 style="background-image: url('{{ $userDetails->profile_photo ? asset("uploads/avatars/" . $userDetails->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($userDetails->name) }}')">
                                            </div>
                                            
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                   data-kt-image-input-action="change">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="file" name="profile_photo" accept=".png, .jpg, .jpeg" required/>
                                                <input type="hidden" name="avatar_remove" value="0"/>
                                            </label>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
                                <form id="kt_signin_change_password" class="form" action="{{ route('profile.update.password') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" 
                                                       name="current_password" id="currentpassword" required>
                                                @error('current_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" 
                                                       name="password" id="newpassword" required>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" 
                                                       name="password_confirmation" id="confirmpassword" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-text mb-5">Password must be at least 8 characters and contain symbols</div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary btn-sm me-2 px-6">Update Password</button>
                                        <button type="button" id="kt_password_cancel" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
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

    @push('scripts')
    <script>
        // Initialize image input plugin
        var imageInputs = document.querySelectorAll('[data-kt-image-input]');
        imageInputs.forEach(function(imageInput) {
            new KTImageInput(imageInput);
        });

        // Password change form visibility toggle
        document.getElementById('kt_signin_password_button').querySelector('button').addEventListener('click', function() {
            document.getElementById('kt_signin_password').classList.add('d-none');
            document.getElementById('kt_signin_password_edit').classList.remove('d-none');
            document.getElementById('kt_signin_password_button').classList.add('d-none');
        });

        document.getElementById('kt_password_cancel').addEventListener('click', function() {
            document.getElementById('kt_signin_password').classList.remove('d-none');
            document.getElementById('kt_signin_password_edit').classList.add('d-none');
            document.getElementById('kt_signin_password_button').classList.remove('d-none');
        });

        // Email change form visibility toggle
        document.getElementById('kt_signin_email_button').querySelector('button').addEventListener('click', function() {
            document.getElementById('kt_signin_email').classList.add('d-none');
            document.getElementById('kt_signin_email_edit').classList.remove('d-none');
            document.getElementById('kt_signin_email_button').classList.add('d-none');
        });

        document.getElementById('kt_signin_cancel').addEventListener('click', function() {
            document.getElementById('kt_signin_email').classList.remove('d-none');
            document.getElementById('kt_signin_email_edit').classList.add('d-none');
            document.getElementById('kt_signin_email_button').classList.remove('d-none');
        });

        // Handle email update submission
        document.getElementById('kt_signin_submit').addEventListener('click', function(e) {
            e.preventDefault();
            
            const form = document.getElementById('kt_signin_change_email');
            const formData = new FormData(form);

            // Add CSRF token
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');

            fetch('{{ route("profile.update.email") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        text: data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    text: "Sorry, looks like there are some errors detected, please try again.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            });
        });
    </script>
    @endpush
@endsection