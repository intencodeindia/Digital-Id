@extends('layouts.user')
@section('title', 'Services')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Services</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-danger hover-scale flex-shrink-0" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add Service</button>
                    </div>
                    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.services.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" value="0" min="0" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">Service Image</label>
                                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg">
                                            <small class="text-muted">The thumbnail field must be a file of type: jpeg, png, jpg, gif, svg.</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    @if($services->count() > 0)
                    @foreach ($services as $service)
                    <div class="col-sm-6 col-xxl-3">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body text-center pb-5">
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ asset('UserUploads/Services/' . $service->thumbnail) }}">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px;background-image:url('{{ asset('UserUploads/Services/' . $service->thumbnail) }}')">
                                    </div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    </div>
                                </a>
                                <div class="d-flex align-items-end flex-stack mb-1">
                                    <div class="text-start">
                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ $service->name }}</span>
                                        <span class="text-gray-500 mt-1 fw-bold fs-6">${{ $service->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex flex-stack pt-0">
                                <a class="btn btn-sm btn-light flex-shrink-0" href="{{ route('user.services.show', $service->id) }}">View Service</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body text-center py-15">
                                <i class="ki-duotone ki-document fs-5x text-muted mb-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <h3 class="text-gray-800 mb-3">No Services Found</h3>
                                <p class="text-gray-600 mb-5">Click the "Add Service" button above to upload your first service.</p>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                    Add Service
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection