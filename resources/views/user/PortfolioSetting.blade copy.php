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

                    <!-- Current Banner Preview -->
                    @if($vcardDetails->banner_photo)
                        <div class="mb-4">
                            <h4 class="fs-6 fw-semibold mb-2">Current Banner</h4>
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-200px mb-3"
                                 style="background-image: url('{{ asset("uploads/banners/" . $vcardDetails->banner_photo) }}');">
                            </div>
                            <button type="button" 
                                    class="btn btn-sm btn-light-primary"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#updateBannerModal">
                                Update Banner
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
                            <button type="button" 
                                    class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#updateBannerModal">
                                Upload Banner
                            </button>
                        </div>
                    @endif

                    <!-- Banner Upload/Update Modal -->
                    <div class="modal fade" id="updateBannerModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        {{ $vcardDetails->banner_photo ? 'Update Banner' : 'Upload Banner' }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('profile.update.banner') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-4">
                                            <div class="image-input image-input-empty image-input-outline"
                                                 data-kt-image-input="true">
                                                <div class="image-input-wrapper w-250px h-250px" 
                                                     style="background-image: url('{{ $vcardDetails->banner_photo ? asset("uploads/banners/" . $vcardDetails->banner_photo) : asset("assets/media/svg/files/blank-image.svg") }}');">
                                                </div>

                                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                       data-kt-image-input-action="change"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-dismiss="click"
                                                       title="Change banner">
                                                    <i class="ki-duotone ki-pencil fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <input type="file" 
                                                           name="banner" 
                                                           accept=".png, .jpg, .jpeg"
                                                           required />
                                                    <input type="hidden" name="banner_remove" value="0" />
                                                </label>

                                                @if($vcardDetails->banner_photo)
                                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                          data-kt-image-input-action="remove"
                                                          data-bs-toggle="tooltip"
                                                          data-bs-dismiss="click"
                                                          title="Remove banner"
                                                          onclick="document.querySelector('[name=banner_remove]').value = 1;">
                                                        <i class="ki-duotone ki-cross fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">
                                            {{ $vcardDetails->banner_photo ? 'Update' : 'Upload' }}
                                        </button>
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

<script>
    // Initialize image input plugin
    var imageInputs = document.querySelectorAll('[data-kt-image-input]');
    imageInputs.forEach(function(imageInput) {
        new KTImageInput(imageInput);
    });
</script>
@endsection
