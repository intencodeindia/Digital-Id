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
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addOrganizationModalLabel">Add Organization</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding a new organization -->
                                <form id="organizationForm" action="{{ route('user.organization.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Logo Field: Display placeholder image -->
                                    <div class="image-input image-input-outline mb-4" data-kt-image-input="true" style="background-image: url('https://ui-avatars.com/api/?name=New+Organization')">
                                        <div class="image-input-wrapper w-100 w-sm-125px h-100 h-sm-125px" style="background-image: url('https://ui-avatars.com/api/?name=New+Organization')"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change Logo">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                            <input type="file" name="logo" id="image-upload" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="logo_remove">
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel Logo">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove Logo">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>

                                    <!-- Organization Name Field -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Organization Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <!-- Address Field -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                        <input type="hidden" class="form-control" id="created_by" name="created_by" value="{{ $user->id }}">
                                    </div>

                                    <!-- Image Colors Selection -->
                                    <div class="mb-3">
                                        <label for="colors" class="form-label">Card borderColors:</label>
                                        <small>top, right, bottom, left</small>
                                        <div id="colors-container" class="d-flex flex-wrap mb-3">
                                            <!-- Color swatches will be added here -->
                                        </div>
                                        <div id="selected-colors" class="d-flex mb-3">
                                            <!-- Selected colors will appear here -->
                                        </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="submit-btn">Save</button>
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
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px; background-image: url('{{ asset($organization->logo) }}');">
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
                                    <form action="{{ url('organization/update/'.$organization->id) }}" method="POST" enctype="multipart/form-data">
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

<!-- Color Thief CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>

<script>
    const fileInput = document.getElementById('image-upload');
    const form = document.getElementById('organizationForm');
    const colorsContainer = document.getElementById('colors-container');
    const selectedColorsContainer = document.getElementById('selected-colors');

    // Event listener for file input change (when user selects an image)
    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    const colorThief = new ColorThief();
                    const colors = colorThief.getPalette(img, 10); // Get 10 dominant colors

                    // Empty the colors container before adding new colors
                    colorsContainer.innerHTML = '';
                    selectedColorsContainer.innerHTML = '';

                    // Create color swatches and display them
                    colors.forEach((color, index) => {
                        const colorDiv = document.createElement('div');
                        colorDiv.style.backgroundColor = `rgb(${color[0]}, ${color[1]}, ${color[2]})`;
                        colorDiv.style.width = '50px';
                        colorDiv.style.height = '50px';
                        colorDiv.style.marginRight = '10px';
                        colorDiv.style.cursor = 'pointer';
                        colorDiv.title = `rgb(${color[0]}, ${color[1]}, ${color[2]})`;

                        // Add click event to select colors
                        colorDiv.addEventListener('click', function () {
                            if (selectedColorsContainer.children.length < 4) {
                                const selectedColorDiv = document.createElement('div');
                                selectedColorDiv.style.backgroundColor = `rgb(${color[0]}, ${color[1]}, ${color[2]})`;
                                selectedColorDiv.style.width = '30px';
                                selectedColorDiv.style.height = '30px';
                                selectedColorDiv.style.marginRight = '5px';
                                selectedColorsContainer.appendChild(selectedColorDiv);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'You can only select 4 colors!',
                                });
                            }
                        });

                        colorsContainer.appendChild(colorDiv);
                    });

                    // Reset selected colors button
                    const resetButton = document.createElement('button');
                    resetButton.textContent = 'Reset Selected Colors';
                    resetButton.style.marginTop = '10px';
                    resetButton.style.backgroundColor = '#007bff';
                    resetButton.style.color = 'white';
                    resetButton.style.padding = '5px 10px';
                    resetButton.style.borderRadius = '20px';
                    resetButton.style.cursor = 'pointer';

                    // Reset button event handler to only reset selected colors
                    resetButton.addEventListener('click', function (event) {
                        event.preventDefault();  // Prevent the form from being submitted
                        selectedColorsContainer.innerHTML = '';  // Reset the selected colors
                        Swal.fire({
                            icon: 'success',
                            title: 'Colors Reset',
                            text: 'Selected colors have been reset!',
                        });
                    });

                    colorsContainer.appendChild(resetButton);
                };
            };

            reader.readAsDataURL(file);
        }
    });

    // Prevent form submission if no colors are selected
    form.addEventListener('submit', function(event) {
        if (selectedColorsContainer.children.length === 0) {
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'No Colors Selected',
                text: 'Please select at least one color before submitting the form.',
            });
        } else {
            // Set the selected colors as hidden fields in the form
            const colorsArray = Array.from(selectedColorsContainer.children).map(function (div) {
                return div.style.backgroundColor;
            });

            // Add selected colors as hidden input fields
            const colorFields = colorsArray.map(function (color, index) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `border_color_${index}`;
                input.value = color;
                return input;
            });

            colorFields.forEach(function (input) {
                form.appendChild(input);
            });
        }
    });
</script>
@endsection