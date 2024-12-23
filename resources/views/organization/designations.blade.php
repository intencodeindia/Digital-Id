@extends('layouts.user')
@section('title', 'Designations')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2>Designations</h2>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addDesignationModal">
                <i class="ki-duotone ki-plus fs-2"><span class="path1"></span><span class="path2"></span></i>
                Add Designation
            </button>
        </div>

        <!-- Designation List -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th>Designation Name</th>
                                <th>Description</th>
                                <th>Employees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($designations as $designation)
                            <tr>
                                <td>{{ $designation->name }}</td>
                                <td>{{ $designation->description }}</td>
                                <td>
                                    <span class="badge badge-light-primary">
                                        {{ $designation->employees_count }} {{ Str::plural('Employee', $designation->employees_count) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-light-primary me-2" 
                                            onclick="editDesignation('{{ $designation->id }}', '{{ addslashes($designation->name) }}', '{{ addslashes($designation->description) }}')">
                                        <i class="ki-duotone ki-pencil fs-5"></i>
                                        Edit
                                    </button>
                                    <button class="btn btn-sm btn-light-danger" 
                                            onclick="deleteDesignation('{{ $designation->id }}')">
                                        <i class="ki-duotone ki-trash fs-5"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No designations found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Designation Modal -->
<div class="modal fade" id="addDesignationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="addDesignationForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Designation Name</label>
                        <input type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback" id="name_error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="description_error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Designation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Designation Modal -->
<div class="modal fade" id="editDesignationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editDesignationForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_designation_id">
                
                <div class="modal-header">
                    <h5 class="modal-title">Edit Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Designation Name</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                        <div class="invalid-feedback" id="edit_name_error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
                        <div class="invalid-feedback" id="edit_description_error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Designation</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Add Designation Form Submit
    $('#addDesignationForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        
        // Clear previous errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        
        $.ajax({
            url: "{{ route('designations.store') }}",
            type: 'POST',
            data: form.serialize(),
            beforeSend: function() {
                submitBtn.attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#addDesignationModal').modal('hide');
                    form[0].reset();
                    location.reload();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        $(`[name="${key}"]`).addClass('is-invalid');
                        $(`#${key}_error`).text(errors[key][0]);
                    });
                } else {
                    toastr.error('An error occurred while saving the designation');
                }
            },
            complete: function() {
                submitBtn.attr('disabled', false).text('Save Designation');
            }
        });
    });

    // Edit Designation
    function editDesignation(id, name, description) {
        $('#edit_designation_id').val(id);
        $('#edit_name').val(name);
        $('#edit_description').val(description);
        $('#editDesignationModal').modal('show');
    }

    // Update Designation Form Submit
    $('#editDesignationForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const id = $('#edit_designation_id').val();
        const submitBtn = form.find('button[type="submit"]');
        
        // Clear previous errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        
        $.ajax({
            url: `/designations/${id}`,
            type: 'PUT',
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                submitBtn.attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#editDesignationModal').modal('hide');
                    form[0].reset();
                    location.reload();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        $(`#edit_${key}`).addClass('is-invalid');
                        $(`#edit_${key}_error`).text(errors[key][0]);
                    });
                } else {
                    toastr.error('An error occurred while updating the designation');
                }
            },
            complete: function() {
                submitBtn.attr('disabled', false).text('Update Designation');
            }
        });
    });

    // Delete Designation
    function deleteDesignation(id) {
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
                $.ajax({
                    url: `/designations/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            toastr.error(xhr.responseJSON.message);
                        } else {
                            toastr.error('An error occurred while deleting the designation');
                        }
                    }
                });
            }
        });
    }
</script>
@endpush

@endsection
