@extends('layouts.user')

@section('title', 'Departments')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2>Departments</h2>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                <i class="ki-duotone ki-plus fs-2"><span class="path1"></span><span class="path2"></span></i>
                Add Department
            </button>
        </div>

        <!-- Department List -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th>Department Name</th>
                                <th>Description</th>
                                <th>Employees</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                                <td>
                                    <span class="badge badge-light-primary">
                                        {{ $department->employees_count }} {{ Str::plural('Employee', $department->employees_count) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               onchange="toggleStatus('{{ $department->id }}')"
                                               {{ $department->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-light-primary me-2" 
                                            onclick="editDepartment(
                                                {{ $department->id }},
                                                `{{ $department->name }}`,
                                                `{{ $department->description }}`,
                                                {{ $department->status ? 1 : 0 }}
                                            )">
                                        <i class="ki-duotone ki-pencil fs-5"></i>
                                        Edit
                                    </button>
                                    <button class="btn btn-sm btn-light-danger" 
                                            onclick="deleteDepartment('{{ $department->id }}')">
                                        <i class="ki-duotone ki-trash fs-5"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No departments found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="addDepartmentForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Department Name</label>
                        <input type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback" id="name_error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="description_error"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                        <div class="invalid-feedback" id="status_error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Department Modal -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editDepartmentForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_department_id">
                
                <div class="modal-header">
                    <h5 class="modal-title">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Department Name</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                        <div class="invalid-feedback" id="edit_name_error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
                        <div class="invalid-feedback" id="edit_description_error"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="edit_status" value="1">
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Add Department Form Submit
    $('#addDepartmentForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        
        $.ajax({
            url: "{{ route('departments.store') }}",
            type: 'POST',
            data: form.serialize(),
            beforeSend: function() {
                submitBtn.attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#addDepartmentModal').modal('hide');
                    location.reload();
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                Object.keys(errors).forEach(function(key) {
                    $(`#${key}`).addClass('is-invalid');
                    $(`#${key}_error`).text(errors[key][0]);
                });
            },
            complete: function() {
                submitBtn.attr('disabled', false).text('Save Department');
            }
        });
    });

    // Edit Department
    function editDepartment(id, name, description, status) {
        // Set values in the form
        $('#edit_department_id').val(id);
        $('#edit_name').val(name);
        $('#edit_description').val(description);
        $('#edit_status').prop('checked', status === true);
        
        // Show the modal
        $('#editDepartmentModal').modal('show');
    }

    // Update Department Form Submit
    $('#editDepartmentForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const id = $('#edit_department_id').val();
        const submitBtn = form.find('button[type="submit"]');
        
        $.ajax({
            url: `/departments/${id}`,
            type: 'PUT',
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                submitBtn.attr('disabled', true)
                    .html('<span class="spinner-border spinner-border-sm"></span> Updating...');
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#editDepartmentModal').modal('hide');
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
                    toastr.error('An error occurred while updating the department');
                }
            },
            complete: function() {
                submitBtn.attr('disabled', false).text('Update Department');
            }
        });
    });

    // Toggle Status
    function toggleStatus(id) {
        $.ajax({
            url: `/departments/${id}/toggle-status`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('Error updating status');
            }
        });
    }

    // Add this to your existing JavaScript section
    function deleteDepartment(id) {
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
                    url: `/departments/${id}`,
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
                            toastr.error('Error deleting department');
                        }
                    }
                });
            }
        });
    }
</script>
@endpush

@endsection