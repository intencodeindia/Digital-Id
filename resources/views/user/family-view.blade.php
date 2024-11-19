@extends('layouts.user')
@section('title', 'Family View')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Family</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger hover-scale flex-shrink-0" href="{{ route('user.family') }}">
                            <i class="ki-duotone ki-arrow-left fs-info fs-1 text-light">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <div class="col-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <!-- Left Side - Profile Image -->
                                    <div class="col-12 col-md-6 text-center text-md-start mb-5 mb-md-0">
                                        <div class="position-relative">
                                            <img src="{{ asset('UserUploads/Family/' . $familymember->profile_photo) }}"
                                                alt="{{ $familymember->name }}"
                                                class="img-fluid shadow-sm"
                                                style="max-height: 400px; min-height: 400px; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>

                                    <!-- Right Side - Details -->
                                    <div class="col-12 col-md-6">
                                        <div class="ps-md-5">
                                            <h3 class="fs-2x fw-bold mb-3">{{ $familymember->name }}</h3>
                                            <div class="d-flex flex-column gap-3">
                                                <div class="d-flex align-items-center">
                                                    <span class="bullet bullet-dot bg-primary me-3"></span>
                                                    <div class="fs-5 fw-semibold text-gray-600">Relationship:</div>
                                                    <div class="fs-5 fw-bold ms-2">{{ ucfirst($familymember->relationship) }}</div>
                                                </div>

                                                @if($familymember->email)
                                                <div class="d-flex align-items-center">
                                                    <span class="bullet bullet-dot bg-primary me-3"></span>
                                                    <div class="fs-5 fw-semibold text-gray-600">Email:</div>
                                                    <div class="fs-5 fw-bold ms-2">{{ $familymember->email }}</div>
                                                </div>
                                                @endif

                                                @if($familymember->phone)
                                                <div class="d-flex align-items-center">
                                                    <span class="bullet bullet-dot bg-primary me-3"></span>
                                                    <div class="fs-5 fw-semibold text-gray-600">Phone:</div>
                                                    <div class="fs-5 fw-bold ms-2">{{ $familymember->phone }}</div>
                                                </div>
                                                @endif

                                                <div class="mt-4">
                                                    @if($familymember->phone)
                                                    <a class="btn btn-sm btn-light-primary " href="tel:{{ $familymember->phone }}" aria-label="Call Now">
                                                        <i class="ki-duotone ki-phone fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        Call Now
                                                    </a>
                                                    @endif
                                                    <a href="/UserUploads/Family/{{ $familymember->profile_photo }}"
                                                        download
                                                        class="btn btn-sm btn-primary "
                                                        aria-label="Download Photo">
                                                        <i class="ki-duotone ki-cloud-download fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                        Download Photo
                                                    </a>
                                                    <a type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-bs-target="#updateFamilyModal">
                                                        <i class="ki-duotone ki-pencil fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                        Update Details
                                                    </a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Update Family Modal -->
                <div class="modal fade" id="updateFamilyModal" tabindex="-1" aria-labelledby="updateFamilyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateFamilyModalLabel">Update Family Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updateFamilyForm" action="{{ route('user.family-update', $familymember->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $familymember->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $familymember->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $familymember->phone }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="relation" class="form-label">Relation</label>
                                        <select class="form-select" id="relation" name="relation" required>
                                            <option value="">Select Relation</option>
                                            <option value="father" {{ $familymember->relationship == 'father' ? 'selected' : '' }}>Father</option>
                                            <option value="mother" {{ $familymember->relationship == 'mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="brother" {{ $familymember->relationship == 'brother' ? 'selected' : '' }}>Brother</option>
                                            <option value="sister" {{ $familymember->relationship == 'sister' ? 'selected' : '' }}>Sister</option>
                                            <option value="daughter" {{ $familymember->relationship == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                            <option value="son" {{ $familymember->relationship == 'son' ? 'selected' : '' }}>Son</option>
                                            <option value="grandfather" {{ $familymember->relationship == 'grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="grandmother" {{ $familymember->relationship == 'grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="uncle" {{ $familymember->relationship == 'uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="aunt" {{ $familymember->relationship == 'aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="other" {{ $familymember->relationship == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">New Photo (Optional)</label>
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                        <small class="text-muted">Only JPG, JPEG, and PNG images are allowed.</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection