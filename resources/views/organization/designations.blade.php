@extends('layouts.user')
@section('title', 'Designations')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="d-flex justify-content-between align-items-center mb-5 mb-xxl-10">
            <h2>Designations</h2>
            <div class="ms-auto">
                <button class="btn btn-sm btn-primary" id="add_designation_btn">
                    <i class="ki-duotone ki-plus fs-1"><span class="path1"></span><span class="path2"></span></i> Add Designation
                </button>
                <button class="btn btn-sm btn-info" id="import_designation_btn">
                    <i class="ki-duotone ki-plus fs-1"><span class="path1"></span><span class="path2"></span></i> Import Designation
                </button>
            </div>
        </div>

        <!--begin::Drawer-->
        <div
            id="kt_drawer_example_permanent"
            class="bg-white"
            data-kt-drawer="true"
            data-kt-drawer-activate="true"
            data-kt-drawer-toggle="#add_designation_btn"
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
                        Add Designation
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
                    <form id="kt_modal_add_designation_form" class="form" action="{{ route('designations.store') }}" method="POST">
                        @csrf
                        <div class="fv-row mb-7">
                            <!-- Designation Name -->
                            <label class="required fw-semibold fs-6 mb-2">Designation Name</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter designation name" required />

                            <!-- Designation Description -->
                            <label class="required fw-semibold fs-6 mb-2">Description</label>
                            <input type="text" name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter designation description" required />

                            <!-- Designation Status -->
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <select name="status" class="form-select form-select-solid mb-3 mb-lg-0" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" data-kt-organizations-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
                            <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Designation">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="kt_subscriptions_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                        <div id="" class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_subscriptions_table" style="width: 100%;">
                                <colgroup>
                                    <col data-dt-column="0">
                                    <col data-dt-column="1">
                                    <col data-dt-column="2">
                                    <col data-dt-column="3">
                                </colgroup>
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                        <th class="w-10px pe-2 dt-orderable-none" data-dt-column="0" rowspan="1" colspan="1" aria-label=""><span class="dt-column-title">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1">
                                                </div>
                                            </span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Designation: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Designation</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Description: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Description</span><span class="dt-column-order"></span></th>
                                        <th class="text-end min-w-70px dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($designations as $designation)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $designation->name }}</a>
                                        </td>
                                       
                                        <td>
                                            {{ $designation->description }}
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-eye fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                          
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
