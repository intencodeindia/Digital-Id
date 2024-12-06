@extends('layouts.user')
@section('title', 'Transactions')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <h2 class="mb-5">Transactions</h2>
        </div>
        <div class="row g-5 g-xxl-10">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i> <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Transaction">
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
                                    <col data-dt-column="4">
                                    <col data-dt-column="5">
                                    <col data-dt-column="6">
                                </colgroup>
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                        <th class="w-10px pe-2 dt-orderable-none" data-dt-column="0" rowspan="1" colspan="1" aria-label=""><span class="dt-column-title">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1">
                                                </div>
                                            </span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Customer: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Customer</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Billing: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Billing</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Product: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Product</span><span class="dt-column-order"></span></th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="5" rowspan="1" colspan="1" aria-label="Created Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Created Date</span><span class="dt-column-order"></span></th>
                                        <th class="text-end min-w-70px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../customers/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success">Active</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">Manual - Credit Card</div>
                                        </td>
                                        <td>
                                            Basic </td>
                                        <td data-order="2024-11-10T00:00:00+05:30">
                                            Nov 10, 2024 </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../customers/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success">Active</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">Manual - Credit Card</div>
                                        </td>
                                        <td>
                                            Basic </td>
                                        <td data-order="2024-11-10T00:00:00+05:30">
                                            Nov 10, 2024 </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../customers/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success">Active</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">Manual - Credit Card</div>
                                        </td>
                                        <td>
                                            Basic </td>
                                        <td data-order="2024-11-10T00:00:00+05:30">
                                            Nov 10, 2024 </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../customers/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success">Active</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">Manual - Credit Card</div>
                                        </td>
                                        <td>
                                            Basic </td>
                                        <td data-order="2024-11-10T00:00:00+05:30">
                                            Nov 10, 2024 </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../customers/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success">Active</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">Manual - Credit Card</div>
                                        </td>
                                        <td>
                                            Basic </td>
                                        <td data-order="2024-11-10T00:00:00+05:30">
                                            Nov 10, 2024 </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../customers/view.html" class="text-gray-800 text-hover-primary mb-1">Max Smith</a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-danger">Suspended</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">--</div>
                                        </td>
                                        <td>
                                            Basic Bundle </td>
                                        <td data-order="2024-11-10T00:00:00+05:30">
                                            Nov 10, 2024 </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="add.html" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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