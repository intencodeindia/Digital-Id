@extends('layouts.admin')
@section('title', 'Organizations')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Organizations</h2>
                <a href="{{ route('admin.organizations') }}" class="btn btn-sm btn-primary hover-scale">
                    <i class="fa-duotone fa-arrow-left fs-3"></i> Back
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
                                    @if($organization->profile_photo)
                                    <img src="{{ asset('storage/' . $organization->profile_photo) }}" alt="{{ $organization->name }}">
                                    @else
                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="Default Avatar">
                                    @endif
                                </div>
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $organization->name }}
                                </a>
                                <div class="mb-9">
                                    <div class="badge badge-lg badge-light-primary d-inline">{{ ucfirst($organization->role) }}</div>
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
                                    <div class="text-gray-600">{{ $organization->digital_id }}</div>
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600"><a href="mailto:{{ $organization->email }}" class="text-gray-600 text-hover-primary">{{ $organization->email }}</a></div>
                                    <div class="fw-bold mt-5">Mobile</div>
                                    <div class="text-gray-600">{{ $organization->phone ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Username</div>
                                    <div class="text-gray-600">{{ $organization->username ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Bio</div>
                                    <div class="text-gray-600">{{ $organization->bio ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Relationship</div>
                                    <div class="text-gray-600">{{ $organization->relationship ?? 'Not provided' }}</div>
                                    <div class="fw-bold mt-5">Last Login</div>
                                    <div class="text-gray-600">{{ $organization->last_login ? $organization->last_login->format('d M Y, h:i a') : 'Never logged in' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-lg-row-fluid ms-lg-15">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab" aria-selected="true" role="tab">Overview</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">Security</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab" aria-selected="false" role="tab" tabindex="-1">Events &amp; Logs</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="kt_user_view_overview_tab" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">User's Schedule</h2>
                                        <div class="fs-6 fw-semibold text-muted">2 upcoming meetings</div>
                                    </div>
                                </div>
                                <div class="card-body p-9 pt-4">
                                    <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2" role="tablist">
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_0" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                                <span class="fs-6 fw-bolder">21</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary active" data-bs-toggle="tab" href="#kt_schedule_day_1" aria-selected="true" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                                <span class="fs-6 fw-bolder">22</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_2" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                                <span class="fs-6 fw-bolder">23</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_3" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">We</span>
                                                <span class="fs-6 fw-bolder">24</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_4" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                                <span class="fs-6 fw-bolder">25</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_5" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                                <span class="fs-6 fw-bolder">26</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_6" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                                <span class="fs-6 fw-bolder">27</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_7" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                                <span class="fs-6 fw-bolder">28</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_8" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                                <span class="fs-6 fw-bolder">29</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_9" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                                <span class="fs-6 fw-bolder">30</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_10" aria-selected="false" tabindex="-1" role="tab">
                                                <span class="opacity-50 fs-7 fw-semibold">We</span>
                                                <span class="fs-6 fw-bolder">31</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        @for ($i = 0; $i <= 10; $i++)
                                        <div id="kt_schedule_day_{{ $i }}" class="tab-pane fade show {{ $i == 1 ? 'active' : '' }}" role="tabpanel">
                                            @foreach(range(1, 4) as $j)
                                            <div class="d-flex flex-stack position-relative {{ $j > 1 ? 'mt-6' : '' }}">
                                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5">
                                                    <div class="fs-7 mb-1">
                                                        {{ rand(9, 16) }}:00 - {{ rand(9, 16) }}:00
                                                        <span class="fs-7 text-muted text-uppercase">
                                                            {{ rand(9, 16) < 12 ? 'am' : 'pm' }}
                                                        </span>
                                                    </div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">
                                                        {{ ['Project Review', 'Team Meeting', 'Client Consultation', 'Strategy Planning'][rand(0,3)] }}
                                                    </a>
                                                    <div class="fs-7 text-muted">
                                                        Lead by <a href="#">{{ ['John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Wilson'][rand(0,3)] }}</a>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm">View</a>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">User's Tasks</h2>
                                        <div class="fs-6 fw-semibold text-muted">Total 25 tasks in backlog</div>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_task">
                                            <i class="ki-duotone ki-add-files fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Add Task
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center position-relative mb-7">
                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                        <div class="fw-semibold ms-5">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Create FureStibe branding logo</a>
                                            <div class="fs-7 text-muted">
                                                Due in 1 day <a href="#">Karina Clark</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> </button>
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Update Status</div>
                                            </div>
                                            <div class="separator border-gray-200"></div>
                                            <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework" data-kt-menu-id="kt-users-tasks-form">
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <label class="form-label fs-6 fw-semibold">Status:</label>
                                                    <select class="form-select form-select-solid select2-hidden-accessible" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true" data-select2-id="select2-data-10-0s85" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                        <option data-select2-id="select2-data-12-x45x"></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="3">In Process</option>
                                                        <option value="4">Rejected</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-xl3b" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-task_status-dz-container" aria-controls="select2-task_status-dz-container"><span class="select2-selection__rendered" id="select2-task_status-dz-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                                        <span class="indicator-label">
                                                            Apply
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center position-relative mb-7">
                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                        <div class="fw-semibold ms-5">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Schedule a meeting with FireBear CTO John</a>
                                            <div class="fs-7 text-muted">
                                                Due in 3 days <a href="#">Rober Doe</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> </button>
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Update Status</div>
                                            </div>
                                            <div class="separator border-gray-200"></div>
                                            <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework" data-kt-menu-id="kt-users-tasks-form">
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <label class="form-label fs-6 fw-semibold">Status:</label>
                                                    <select class="form-select form-select-solid select2-hidden-accessible" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true" data-select2-id="select2-data-13-nesx" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                        <option data-select2-id="select2-data-15-blmr"></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="3">In Process</option>
                                                        <option value="4">Rejected</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-cy4p" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-task_status-rv-container" aria-controls="select2-task_status-rv-container"><span class="select2-selection__rendered" id="select2-task_status-rv-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                                        <span class="indicator-label">
                                                            Apply
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center position-relative mb-7">
                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                        <div class="fw-semibold ms-5">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">9 Degree Project Estimation</a>
                                            <div class="fs-7 text-muted">
                                                Due in 1 week <a href="#">Neil Owen</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> </button>
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Update Status</div>
                                            </div>
                                            <div class="separator border-gray-200"></div>
                                            <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework" data-kt-menu-id="kt-users-tasks-form">
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <label class="form-label fs-6 fw-semibold">Status:</label>
                                                    <select class="form-select form-select-solid select2-hidden-accessible" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true" data-select2-id="select2-data-16-awde" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                        <option data-select2-id="select2-data-18-x908"></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="3">In Process</option>
                                                        <option value="4">Rejected</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-kx5l" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-task_status-p5-container" aria-controls="select2-task_status-p5-container"><span class="select2-selection__rendered" id="select2-task_status-p5-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                                        <span class="indicator-label">
                                                            Apply
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center position-relative mb-7">
                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                        <div class="fw-semibold ms-5">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Dashboard UI &amp; UX for Leafr CRM</a>
                                            <div class="fs-7 text-muted">
                                                Due in 1 week <a href="#">Olivia Wild</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> </button>
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Update Status</div>
                                            </div>
                                            <div class="separator border-gray-200"></div>
                                            <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework" data-kt-menu-id="kt-users-tasks-form">
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <label class="form-label fs-6 fw-semibold">Status:</label>
                                                    <select class="form-select form-select-solid select2-hidden-accessible" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true" data-select2-id="select2-data-19-6cci" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                        <option data-select2-id="select2-data-21-rplq"></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="3">In Process</option>
                                                        <option value="4">Rejected</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-vwqv" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-task_status-jg-container" aria-controls="select2-task_status-jg-container"><span class="select2-selection__rendered" id="select2-task_status-jg-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                                        <span class="indicator-label">
                                                            Apply
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center position-relative ">
                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                        <div class="fw-semibold ms-5">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Mivy App R&amp;D, Meeting with clients</a>
                                            <div class="fs-7 text-muted">
                                                Due in 2 weeks <a href="#">Sean Bean</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> </button>
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Update Status</div>
                                            </div>
                                            <div class="separator border-gray-200"></div>
                                            <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework" data-kt-menu-id="kt-users-tasks-form">
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <label class="form-label fs-6 fw-semibold">Status:</label>
                                                    <select class="form-select form-select-solid select2-hidden-accessible" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true" data-select2-id="select2-data-22-k56n" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                        <option data-select2-id="select2-data-24-iorl"></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="3">In Process</option>
                                                        <option value="4">Rejected</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-23-jrzi" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-task_status-fq-container" aria-controls="select2-task_status-fq-container"><span class="select2-selection__rendered" id="select2-task_status-fq-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                                        <span class="indicator-label">
                                                            Apply
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Profile</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                <tr>
                                                    <td>Email</td>
                                                    <td>smith@kpmg.com</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
                                                            <i class="ki-duotone ki-pencil fs-3"><span class="path1"></span><span class="path2"></span></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td>******</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                                            <i class="ki-duotone ki-pencil fs-3"><span class="path1"></span><span class="path2"></span></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td>Administrator</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
                                                            <i class="ki-duotone ki-pencil fs-3"><span class="path1"></span><span class="path2"></span></i> </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title flex-column">
                                        <h2>Email Notifications</h2>
                                        <div class="fs-6 fw-semibold text-muted">Choose what messages you'd like to receive for each of your accounts.</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form" id="kt_users_email_notification_form">
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_0" type="checkbox" value="0" id="kt_modal_update_email_notification_0" checked="checked">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_0">
                                                    <div class="fw-bold">Successful Payments</div>
                                                    <div class="text-gray-600">Receive a notification for every successful payment.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_1" type="checkbox" value="1" id="kt_modal_update_email_notification_1">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_1">
                                                    <div class="fw-bold">Payouts</div>
                                                    <div class="text-gray-600">Receive a notification for every initiated payout.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_2" type="checkbox" value="2" id="kt_modal_update_email_notification_2">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_2">
                                                    <div class="fw-bold">Application fees</div>
                                                    <div class="text-gray-600">Receive a notification each time you collect a fee from an account.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_3" type="checkbox" value="3" id="kt_modal_update_email_notification_3" checked="checked">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_3">
                                                    <div class="fw-bold">Disputes</div>
                                                    <div class="text-gray-600">Receive a notification if a payment is disputed by a customer and for dispute resolutions.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_4" type="checkbox" value="4" id="kt_modal_update_email_notification_4" checked="checked">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_4">
                                                    <div class="fw-bold">Payment reviews</div>
                                                    <div class="text-gray-600">Receive a notification if a payment is marked as an elevated risk.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_5" type="checkbox" value="5" id="kt_modal_update_email_notification_5">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_5">
                                                    <div class="fw-bold">Mentions</div>
                                                    <div class="text-gray-600">Receive a notification if a teammate mentions you in a note.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_6" type="checkbox" value="6" id="kt_modal_update_email_notification_6">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_6">
                                                    <div class="fw-bold">Invoice Mispayments</div>
                                                    <div class="text-gray-600">Receive a notification if a customer sends an incorrect amount to pay their invoice.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_7" type="checkbox" value="7" id="kt_modal_update_email_notification_7">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_7">
                                                    <div class="fw-bold">Webhooks</div>
                                                    <div class="text-gray-600">Receive notifications about consistently failing webhook endpoints.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="email_notification_8" type="checkbox" value="8" id="kt_modal_update_email_notification_8">
                                                <label class="form-check-label" for="kt_modal_update_email_notification_8">
                                                    <div class="fw-bold">Trial</div>
                                                    <div class="text-gray-600">Receive helpful tips when you try out our products.</div>
                                                </label>
                                            </div>
                                        </div>
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
                        <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Login Sessions</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
                                            <i class="ki-duotone ki-entrance-right fs-3"><span class="path1"></span><span class="path2"></span></i> Sign out all sessions
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-100px">Location</th>
                                                    <th>Device</th>
                                                    <th>IP Address</th>
                                                    <th class="min-w-125px">Time</th>
                                                    <th class="min-w-70px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                <tr>
                                                    <td>
                                                        Australia </td>
                                                    <td>
                                                        Chome - Windows </td>
                                                    <td>
                                                        207.27.41.144 </td>
                                                    <td>
                                                        23 seconds ago </td>
                                                    <td>
                                                        Current session </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Australia </td>
                                                    <td>
                                                        Safari - iOS </td>
                                                    <td>
                                                        207.36.36.41 </td>
                                                    <td>
                                                        3 days ago </td>
                                                    <td>
                                                        <a href="#" data-kt-users-sign-out="single_user">Sign out</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Australia </td>
                                                    <td>
                                                        Chrome - Windows </td>
                                                    <td>
                                                        207.28.45.71 </td>
                                                    <td>
                                                        last week </td>
                                                    <td>
                                                        Expired </td>
                                                </tr>
                                            </tbody>
                                        </table>
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