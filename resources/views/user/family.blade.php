@extends('layouts.user')
@section('title', 'Family')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Family</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-danger hover-scale flex-shrink-0" data-bs-toggle="modal" data-bs-target="#addFamilyModal">Add Family</button>
                    </div>
                    <div class="modal fade" id="addFamilyModal" tabindex="-1" aria-labelledby="addFamilyModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addFamilyModalLabel">Add Family</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="familyForm" action="{{ route('user.family.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="relation" class="form-label">Relation</label>
                                            <select class="form-select" id="relation" name="relation" required>
                                                <option value="">Select Relation</option>
                                                <option value="father">Father</option>
                                                <option value="mother">Mother</option>
                                                <option value="brother">Brother</option>
                                                <option value="sister">Sister</option>
                                                <option value="daughter">Daughter</option>
                                                <option value="son">Son</option>
                                                <option value="grandfather">Grandfather</option>
                                                <option value="grandmother">Grandmother</option>
                                                <option value="uncle">Uncle</option>
                                                <option value="aunt">Aunt</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Photo</label>
                                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                                            <small class="text-muted">Only JPG, JPEG, and PNG images are allowed.</small>
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
                    @if(isset($family) && $family->count() > 0)
                        @foreach ($family as $familyMember)
                        <div class="col-sm-6 col-xxl-3">
                            <div class="card card-flush h-xl-100">
                                <div class="card-body text-center pb-5">
                                    <div class="d-block overlay">
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px; background-image: url('{{ asset('UserUploads/Family/' . $familyMember->profile_photo) }}');">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end flex-stack mb-1">
                                        <div class="text-start">
                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ $familyMember->name }}</span>
                                            <span class="text-gray-500 mt-1 fw-bold fs-6">{{ $familyMember->relationship }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex flex-stack pt-0">
                                    
                                    <a class="btn btn-sm btn-light flex-shrink-0" href="{{ route('user.family-view', $familyMember->id) }}">View Family</a>
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
                                    <h3 class="text-gray-800 mb-3">No Family Members Found</h3>
                                    <p class="text-gray-600 mb-5">Click the "Add Family" button above to add your first family member.</p>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addFamilyModal">
                                        Add Family
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