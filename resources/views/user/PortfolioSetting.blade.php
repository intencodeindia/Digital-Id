@extends('layouts.user')
@section('title', 'Portfolio Settings')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="col-12 mb-5">
            <h2 class="mb-4">Portfolio Settings</h2>

            <!-- Banner Settings Section -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Banner Settings</h3>
                    <p class="text-muted">Recommended size: 1584 x 396 pixels</p>

                    <!-- Current Banner Preview -->
                    @if($vcardDetails->banner_photo)
                    <div class="mb-4">
                        <h4 class="fs-6 fw-semibold mb-2">Current Banner</h4>
                        <div class="banner-preview rounded mb-3">
                            <img src="{{ asset('uploads/banners/' . $vcardDetails->banner_photo) }}"
                                alt="Current Banner"
                                class="img-fluid rounded">
                        </div>
                        <button type="button" class="btn btn-sm btn-light-primary" onclick="document.getElementById('bannerInput').click();">
                            Change Banner
                        </button>
                    </div>
                    @else
                    <div class="text-center py-10 mb-4">
                        <i class="ki-duotone ki-picture fs-3hx text-gray-400 mb-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <p class="text-gray-600 fs-6 fw-semibold mb-5">
                            No banner uploaded yet
                        </p>
                        <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('bannerInput').click();">
                            Upload Banner
                        </button>
                    </div>
                    @endif

                    <!-- Hidden Form -->
                    <form id="bannerForm" action="{{ route('profile.update.banner') }}" method="POST" class="d-none">
                        @csrf
                        @method('PUT')
                        <input type="file" id="bannerInput" accept=".png, .jpg, .jpeg" onchange="handleBannerSelect(this)">
                        <input type="hidden" name="banner" id="croppedImageInput">
                        <input type="hidden" name="banner_remove" value="0">
                    </form>

                    <!-- Crop Modal -->
                    <div class="modal fade" id="cropModal" tabindex="-1" data-bs-backdrop="static">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adjust Banner Image</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="crop-container" style="max-height: 80vh; overflow: hidden;">
                                        <img id="cropImage" src="" style="max-width: 100%; min-width: 100%">
                                    </div>
                                    <div class="mt-3 text-muted small">
                                        Drag to adjust • Fixed size: 1584 x 396 pixels
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- Cancel Button -->
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>

                                    <!-- Save Banner Button -->
                                    <button type="button" class="btn btn-sm btn-primary" onclick="cropAndUpload()">
                                        Save Banner
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
<style>
    .banner-preview img {
        width: 100%;
        max-height: 396px;
        object-fit: cover;
    }

    .crop-container {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        max-width: 100%;
        max-height: 80vh; /* Ensures that cropper is responsive */
        margin: auto;
    }

    /* Hide cropper elements except for the move icon */
    .cropper-line,
    .cropper-point {
        display: none !important;
    }

    .cropper-view-box {
        outline: none !important;
    }

    .cropper-face {
        opacity: 0.1;
    }

    /* Responsive adjustments for mobile */
    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 100%;
            margin: 0;
        }

        .crop-container {
            max-height: 60vh;
            max-width: 100%;
        }

        .modal-body {
            padding: 10px;
        }
    }
    @media (max-width: 576px) {
        .modal-dialog {
            max-width: 100%;
            margin: 0;
        }

        .crop-container {
            max-height: 60vh;
            max-width: 100%;
        }

        .modal-body {
            padding: 5px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
    let cropper;

    function validateFile(input) {
        const file = input.files[0];
        if (!file) return false;

        // Validate file type
        if (!['image/jpeg', 'image/jpg', 'image/png'].includes(file.type)) {
            toastr.error('Please select a valid image file (PNG, JPG, JPEG)');
            input.value = '';
            return false;
        }
        // Validate file size (10MB)
        if (file.size > 10 * 1024 * 1024) {
            toastr.error('Image size should not exceed 10MB');
            input.value = '';
            return false;
        }

        return true;
    }

    function handleBannerSelect(input) {
        if (!validateFile(input)) return;

        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const cropImage = document.getElementById('cropImage');
            cropImage.src = e.target.result;

            // Initialize cropper with fixed aspect ratio
            if (cropper) cropper.destroy();
            cropper = new Cropper(cropImage, {
                aspectRatio: 1584 / 396,
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 1,
                restore: true,
                modal: true,
                guides: false,
                highlight: true,
                cropBoxMovable: false,
                cropBoxResizable: false,
                minContainerWidth: window.innerWidth * 0.9,  // Dynamic width
                minContainerHeight: window.innerHeight * 0.6, // Dynamic height
                toggleDragModeOnDblclick: false,
            });

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('cropModal'));
            modal.show();
        };
        reader.readAsDataURL(file);
    }

    function cropAndUpload() {
        if (!cropper) return;

        // Get cropped canvas
        const canvas = cropper.getCroppedCanvas({
            width: 1584,
            height: 396
        });

        // Convert to blob and upload
        canvas.toBlob((blob) => {
            const formData = new FormData(document.getElementById('bannerForm'));
            formData.set('banner', blob, 'banner.png');

            // Show loading state
            const submitBtn = document.querySelector('#cropModal .btn-primary');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';

            // Upload
            fetch(document.getElementById('bannerForm').action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        toastr.error(data.message || 'Failed to update banner');
                    }
                })
                .catch(error => {
                    toastr.error('An error occurred while uploading');
                })
                .finally(() => {
                    // Hide modal only if upload is successful
                    const modal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
                    modal.hide();
                });
        }, 'image/png');
    }
</script>
@endpush
@endsection
