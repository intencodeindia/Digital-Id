@extends('layouts.user')
@section('title', 'Employee')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Employee</h2>
                <a href="{{ route('organization.employees') }}" class="btn btn-sm btn-primary hover-scale">
                    <i class="ki-duotone ki-arrow-left fs-3"><span class="path1"></span><span class="path2"></span></i> Back
                </a>
            </div>
        </div>
        <div class="row g-5 g-xxl-10">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex flex-center flex-column py-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if($employee->profile_photo)
                                    <img src="{{ asset('storage/' . $employee->profile_photo) }}" alt="{{ $employee->name }}">
                                    @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($employee->name) }}" alt="Default Avatar">
                                    @endif
                                </div>

                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $employee->name }}
                                </a>
                                <div class="mb-9">
                                    <div class="badge badge-lg badge-light-primary d-inline">{{ ucfirst($employee->role) }}</div>
                                </div>
                                <div class="fw-bold mb-3">
                                </div>
                            </div>
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                                    Details
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-duotone ki-down fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <div class="fw-bold mt-5">Account ID</div>
                                    <div class="text-gray-600">{{ $employee->digital_id }}</div>
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600"><a href="mailto:{{ $user->email }}" class="text-gray-600 text-hover-primary">{{ $user->email }}</a></div>
                                    <div class="fw-bold mt-5">Mobile</div>
                                    <div class="text-gray-600">{{ $user->phone ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Username</div>
                                    <div class="text-gray-600">{{ $user->username ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Bio</div>
                                    <div class="text-gray-600">{{ $user->bio ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Relationship</div>
                                    <div class="text-gray-600">{{ $user->relationship ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Digital ID</div>
                                    <div class="text-gray-600">{{ $user->digital_id }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-lg-row-fluid ms-lg-15">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#employee-details" aria-selected="true" role="tab">Employee Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#employee-leads" aria-selected="false" role="tab" tabindex="-1">Employee Leads</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#employee-permissions" aria-selected="false" role="tab" tabindex="-1">Employee Permissions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#employee-entry-log" aria-selected="false" role="tab" tabindex="-1">Employee Entry Log</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="employee-details" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Employee Details</h2>
                                        <div class="fs-6 fw-semibold text-muted">Employee details.</div>
                                    </div>
                                </div>
                                <div class="card-body p-9 pt-4">
                                    <div class="table-responsive">
                                        <form id="kt_modal_add_employee_form" class="form" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="fv-row mb-7">
                                                <!-- Employee Name -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Name</label>
                                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter employee name" value="{{ $employee->name }}" required />

                                                <!-- Employee Email -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Email</label>
                                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter employee email" value="{{ $user->email }}" required />

                                                <!-- Employee Phone -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Phone</label>
                                                <input type="tel" name="phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter employee phone" value="{{ $employee->phone }}" required />

                                                <!-- Employee Department -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Department</label>
                                                <select name="department" class="form-select form-select-solid mb-3 mb-lg-0" required>
                                                    <option value="">Select Department</option>
                                                    @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                                    @endforeach
                                                </select>

                                                <!-- Employee Designation -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Designation</label>
                                                <select name="designation" class="form-select form-select-solid mb-3 mb-lg-0" required>
                                                    <option value="">Select Designation</option>
                                                    @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}" {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>{{ $designation->name }}</option>
                                                    @endforeach
                                                </select>

                                                <!-- Employee Joining Date -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Joining Date</label>
                                                <input type="date" name="joining_date" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $employee->joining_date }}" required />

                                                <!-- Employee ID (Optional) -->
                                                <label class="fw-semibold fs-6 mb-2">Employee ID (Optional)</label>
                                                <input type="text" name="employee_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter employee ID (Optional)" value="{{ $employee->employee_id }}" />

                                                <!-- Employee Password -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Password</label>
                                                <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter employee password" />

                                                <!-- Employee Confirm Password -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter employee confirm password" />

                                                <!-- Employee Status -->
                                                <label class="required fw-semibold fs-6 mb-5">Employee Status</label>
                                                <select name="status" class="form-select form-select-solid mb-3 mb-lg-0" required>
                                                    <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                <br>

                                                <!-- Employee Work Type (Full Time / Part Time) -->
                                                <label class="required fw-semibold fs-6 mb-2">Employee Work Type</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="work_type" id="work_type_full_time" value="Full Time" {{ $employee->work_type == 'Full Time' ? 'checked' : '' }} required />
                                                    <label class="form-check-label" for="work_type_full_time">Full Time</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="work_type" id="work_type_part_time" value="Part Time" {{ $employee->work_type == 'Part Time' ? 'checked' : '' }} required />
                                                    <label class="form-check-label" for="work_type_part_time">Part Time</label>
                                                </div>
                                            </div>

                                            <div class="text-center pt-10">
                                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="employee-permissions" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title flex-column">
                                        <h2>Employee Permissions</h2>
                                        <div class="fs-6 fw-semibold text-muted">Choose what messages you'd like to receive for each of your accounts.</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form" id="employee-permissions-form">
                                        @if($entry_permission->count() > 0)
                                        @foreach($entry_permission as $department) <!-- Loop through all departments -->
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_{{ $department->id }}" type="checkbox" value="1" id="kt_modal_update_email_notification_{{ $department->id }}"
                                                    @if($entry_permission->where('department_id', $department->id)->where('user_id', Auth::id())->isNotEmpty()) checked @endif>
                                                <label class="form-check-label" for="kt_modal_update_email_notification_{{ $department->id }}">
                                                    <div class="fw-bold">{{ $department->name }}</div>
                                                    <div class="text-gray-600">{{ $department->description }}</div>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <p>No permissions found.</p>
                                        @endif

                                        <div class="d-flex justify-content-end align-items-center mt-12">
                                            <button type="button" class="btn btn-light me-5" id="kt_users_email_notification_cancel">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn btn-primary" id="kt_users_email_notification_submit">
                                                <span class="indicator-label">
                                                    Save
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="employee-leads" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Employee Leads</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    @if(count($leads) > 0)
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-100px">Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th class="min-w-125px">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                @foreach($leads as $lead)
                                                <tr>
                                                    <td>
                                                        {{ $lead->name }}
                                                    <td>
                                                        {{ $lead->email }}
                                                    </td>
                                                    <td>
                                                        {{ $lead->mobile }}
                                                    </td>
                                                    <td>
                                                        {{ $lead->status }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <p class="text-center">No leads found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="employee-entry-log" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Employee Entry Log</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    @if(count($entry_log) > 0)
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-100px">Department</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                @foreach($employee->entry_log as $entry)
                                                <tr>
                                                    <td>
                                                        {{ $entry->department }}
                                                    </td>
                                                    <td>
                                                        {{ $entry->logged_in_at }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <p class="text-center">No entry logs found.</p>
                                    @endif
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