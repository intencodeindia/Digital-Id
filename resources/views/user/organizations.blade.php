@extends('layouts.user')
@section('title', 'Organizations')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Organizations</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-danger hover-scale flex-shrink-0" data-bs-toggle="modal" data-bs-target="#addOrganizationModal">Add Organization</button>
                    </div>
                    <!-- Add Organization Modal -->
                    <div class="modal fade" id="addOrganizationModal" tabindex="-1" aria-labelledby="addOrganizationModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addOrganizationModalLabel">Add Organization</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="organizationForm" action="{{ route('user.organization.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Organization Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                            <small class="text-muted">Only JPG, JPEG, and PNG images are allowed.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
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
                    @if(isset($organizations) && $organizations->count() > 0)
                    @foreach ($organizations as $organization)
                    <div class="col-sm-6 col-xxl-3">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body text-center pb-5">
                                <div class="d-block overlay">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px; background-image: url('{{ asset('storage/' . $organization->logo) }}');">
                                    </div>
                                </div>
                                <div class="d-flex align-items-end flex-stack mb-1">
                                    <div class="text-start">
                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ $organization->name }}</span>
                                        <span class="text-gray-500 mt-1 fw-bold fs-6">{{ $organization->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end pt-0">
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-sm btn-light flex-shrink-0 me-2" data-bs-toggle="modal" data-bs-target="#editOrganizationModal{{ $organization->id }}">Update</button>
                                <button type="button" class="btn btn-sm btn-light flex-shrink-0" data-bs-toggle="modal" data-bs-target="#deleteOrganizationModal{{ $organization->id }}">Delete</button>
                                <!-- View Button -->
                            </div>
                        </div>
                    </div>

                    <!-- Delete Organization Modal -->
                    <div class="modal fade" id="deleteOrganizationModal{{ $organization->id }}" tabindex="-1" aria-labelledby="deleteOrganizationModalLabel{{ $organization->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteOrganizationModalLabel{{ $organization->id }}">Delete Organization</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this organization?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Organization Modal -->
                    <div class="modal fade" id="editOrganizationModal{{ $organization->id }}" tabindex="-1" aria-labelledby="editOrganizationModalLabel{{ $organization->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editOrganizationModalLabel{{ $organization->id }}">Edit Organization</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('user/organization/update/'.$organization->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Organization Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $organization->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                            <small class="text-muted">Only JPG, JPEG, and PNG images are allowed.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $organization->address }}" required>
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
                    @endforeach
                    @else
                    <div class="col-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body text-center py-15">
                                <i class="ki-duotone ki-document fs-5x text-muted mb-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <h3 class="text-gray-800 mb-3">No Organizations Found</h3>
                                <p class="text-gray-600 mb-5">Click the "Add Organization" button above to add your first organization.</p>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addOrganizationModal">
                                    Add Organization
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