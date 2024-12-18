@extends('layouts.user')
@section('title', 'Employees')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="d-flex justify-content-between align-items-center mb-5 mb-xxl-10">
            <h2>Employees</h2>
            <div class="ms-auto">
                <button class="btn btn-sm btn-primary" id="add_employee_btn">
                    <i class="ki-duotone  ki-plus fs-1"><span class="path1"></span><span class="path2"></span></i> Add Employee
                </button>
                <button class="btn btn-sm btn-info" id="import_employee_btn">
                    <i class="ki-duotone  ki-plus fs-1"><span class="path1"></span><span class="path2"></span></i> Import Employee
                </button>
            </div>
        </div>


        <!--begin::Drawer-->
        <div
            id="kt_drawer_example_permanent"
            class="bg-white"
            data-kt-drawer="true"
            data-kt-drawer-activate="true"
            data-kt-drawer-toggle="#add_employee_btn"
            data-kt-drawer-close="#kt_drawer_example_permanent_close"
            data-kt-drawer-overlay="true"
            data-kt-drawer-permanent="true"
            data-kt-drawer-width="{default:'300px', 'md': '500px'}">
            <!--begin::Card-->
            <div class="card rounded-0 w-100">
                <!--begin::Card header-->
                <div class="card-header pe-5">
                    <!--begin::Title-->
                    <div class="card-title">
                        Add Employee
                    </div>
                    <!--end::Title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_permanent_close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body hover-scroll-overlay-y">
                    <form id="kt_modal_add_employee_form" class="form" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="fv-row mb-7">
                            <!-- Employee Name -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Employee Name</label>
                                <input type="text" name="name" class="form-control form-control-solid" 
                                       placeholder="Enter employee name" value="{{ old('name') }}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employee Email -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Employee Email</label>
                                <input type="email" name="email" class="form-control form-control-solid" 
                                       placeholder="Enter employee email" value="{{ old('email') }}" required />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employee Phone -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Employee Phone</label>
                                <input type="tel" name="phone" class="form-control form-control-solid" 
                                       placeholder="Enter employee phone" value="{{ old('phone') }}" required />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employee Department -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Department</label>
                                <select name="department_id" class="form-select form-select-solid" required>
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employee Designation -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Designation</label>
                                <select name="designation_id" class="form-select form-select-solid" required>
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}" {{ old('designation_id') == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employee ID (Optional) -->
                            <div class="mb-5">
                                <label class="fw-semibold fs-6 mb-2">Employee ID (Optional)</label>
                                <input type="text" name="employee_id" class="form-control form-control-solid" 
                                       placeholder="Enter employee ID" value="{{ old('employee_id') }}" />
                                @error('employee_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Joining Date -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Joining Date</label>
                                <input type="date" name="joining_date" class="form-control form-control-solid" 
                                       value="{{ old('joining_date') }}" required />
                                @error('joining_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Profile Photo -->
                            <div class="mb-5">
                                <label class="fw-semibold fs-6 mb-2">Profile Photo</label>
                                <input type="file" name="profile_photo" class="form-control form-control-solid" 
                                       accept="image/*" />
                                @error('profile_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid" 
                                       placeholder="Enter password" required />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Status</label>
                                <select name="status" class="form-select form-select-solid" required>
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Work Type -->
                            <div class="mb-5">
                                <label class="required fw-semibold fs-6 mb-2">Work Type</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="work_type" 
                                               value="Full Time" {{ old('work_type') == 'Full Time' ? 'checked' : '' }} required />
                                        <label class="form-check-label">Full Time</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="work_type" 
                                               value="Part Time" {{ old('work_type') == 'Part Time' ? 'checked' : '' }} required />
                                        <label class="form-check-label">Part Time</label>
                                    </div>
                                </div>
                                @error('work_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                Discard
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Drawer-->
        <div class="row g-5 g-xxl-10">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i> <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Employee">
                        </div>
                    </div>

                </div>
                <div class="card-body pt-0">
                    <div id="kt_subscriptions_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_subscriptions_table" style="width: 100%;">
                                <colgroup>
                                    <col data-dt-column="0">
                                    <col data-dt-column="1">
                                    <col data-dt-column="2">
                                    <col data-dt-column="3">
                                    <col data-dt-column="4">
                                    <col data-dt-column="5">
                                    <col data-dt-column="6">
                                    <col data-dt-column="7">
                                </colgroup>
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                        <th class="w-10px pe-2 dt-orderable-none" data-dt-column="0" rowspan="1" colspan="1" aria-label=""><span class="dt-column-title">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1">
                                                </div>
                                            </span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Customer: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Employee</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Department: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Department</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Designation: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Designation</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="5" rowspan="1" colspan="1" aria-label="Joining Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Joining Date</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="6" rowspan="1" colspan="1" aria-label="Job Type: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Job Type</span><span class="dt-column-order"></span></th>
                                        <th class="text-end min-w-70px dt-orderable-none" data-dt-column="7" rowspan="1" colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('employees.view', $employee->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $employee->name }}</a>
                                        </td>
                                        <td>
                                            <div class="badge {{ $employee->status == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                                {{ $employee->status == 1 ? 'Active' : 'Inactive' }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="badge badge-light">{{ $employee->department->name }}</div>
                                        </td>
                                        <td>
                                            {{ $employee->designation->name }}
                                        </td>
                                        <td data-order="{{ date('Y-m-d', strtotime($employee->joining_date)) }}">
                                            {{ date('d-m-Y', strtotime($employee->joining_date)) }}
                                        </td>
                                        <td>
                                            {{ $employee->work_type }}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('employees', $employee->id) }}" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-eye fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                <span class="ms-1">View</span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
$('#kt_modal_add_employee_form').on('submit', function(e) {
    e.preventDefault();
    const form = $(this);
    const submitBtn = form.find('button[type="submit"]');
    
    $.ajax({
        url: "{{ route('employees.store') }}",
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {
            submitBtn.attr('disabled', true)
                .find('.indicator-label').hide()
                .end()
                .find('.indicator-progress').show();
            // Clear previous errors
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').text('');
        },
        success: function(response) {
            if (response.success) {
                // Show success message
                toastr.success(response.message);
                
                // Reset form
                form[0].reset();
                
                // Close drawer
                $('#kt_drawer_example_permanent').hide();
                $('body').removeClass('drawer-on');
                $('.drawer-overlay').remove();
                
                // Reload table
                location.reload();
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                Object.keys(errors).forEach(function(key) {
                    const input = $(`[name="${key}"]`);
                    input.addClass('is-invalid');
                    input.siblings('.invalid-feedback').text(errors[key][0]);
                });
                toastr.error('Please check the form for errors');
            } else {
                toastr.error('Error adding employee. Please try again.');
            }
        },
        complete: function() {
            submitBtn.attr('disabled', false)
                .find('.indicator-label').show()
                .end()
                .find('.indicator-progress').hide();
        }
    });
});
</script>