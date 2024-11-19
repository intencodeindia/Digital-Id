@extends('layouts.user')
@section('title', 'Documents View')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Documents</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger hover-scale flex-shrink-0" href="{{ route('user.services') }}"> <i class="ki-duotone ki-arrow-left fs-info fs-1 text-light"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Back</a>
                    </div>
                </div>
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <div class="col-sm-12 col-xxl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-xxl-6">
                                        <img src="{{ asset('UserUploads/Services/' . $service->thumbnail) }}" alt="{{ $service->name }}" class="img-fluid" style="max-height: 300px;">

                                    </div>
                                    <div class="col-sm-6 col-xxl-6">
                                        <h3><strong>Service Name:</strong> {{ $service->name }}</h3>
                                        <p><strong>Description:</strong> {{ $service->description }}</p>
                                        <p><strong>Price: </strong> ${{ $service->price }}</p>
                                    </div>
                                </div>
                                <div class="mt-3 text-end">
                                    <button type="button" class="btn btn-sm btn-light flex-shrink-0" data-bs-toggle="modal" data-bs-target="#updateServiceModal">
                                        <i class="ki-duotone ki-pencil fs-info fs-1 text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Update Service
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light flex-shrink-0" onclick="confirmDelete({{ $service->id }})">
                                        <i class="ki-duotone ki-trash fs-info fs-1 text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Delete Service
                                    </button>

                                    <script>
                                    function confirmDelete(serviceId) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `/services/delete/${serviceId}`;
                                            }
                                        })
                                    }
                                    </script>
                                </div>

                                <!-- Update Service Modal -->
                                <div class="modal fade" id="updateServiceModal" tabindex="-1" aria-labelledby="updateServiceModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateServiceModalLabel">Update Service</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $service->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}" min="0" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="thumbnail" class="form-label">Service Image</label>
                                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg">
                                                        <small class="text-muted">Leave empty to keep current image. Accepted types: jpeg, png, jpg, gif, svg.</small>
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
            </div>
        </div>
    </div>
</div>
@endsection