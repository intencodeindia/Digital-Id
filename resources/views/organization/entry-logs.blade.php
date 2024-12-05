@extends('layouts.user')

@section('title', 'Departments')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container container-xxl ">
        <div class="d-flex justify-content-between align-items-center mb-5 mb-xxl-10">
            <h2>Entry Logs</h2>
        </div>

        <div class="row g-5 g-xxl-10">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
                            <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Log">
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
                                </colgroup>
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                        <th class="w-10px pe-2 dt-orderable-none" data-dt-column="0" rowspan="1" colspan="1" aria-label="">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1">
                                            </div>
                                        </th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Department Name: Activate to sort" tabindex="0">
                                            <span class="dt-column-title" role="button">Employee Name</span>
                                        </th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Description: Activate to sort" tabindex="0">
                                            <span class="dt-column-title" role="button">Department</span>
                                        </th>
                                        <th class="dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Time">
                                            <span class="dt-column-title">Time</span>
                                        </th>
                                        <th class="text-end min-w-70px dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Actions">
                                            <span class="dt-column-title">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($logs as $log)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ url('employees/show', $log->user->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $log->user->name }}</a>
                                        </td>
                                        <td>
                                            {{ $log->department }}
                                        </td>
                                        <td>
                                            {{ $log->logged_in_at }}
                                        </td>
                                        <td class="text-end d-flex gap-2 justify-content-end text-center">
                                            <a href="{{ url('employees/'. $log->user_id) }}" class="btn btn-light btn-active-light-primary btn-sm">
                                                <i class="ki-duotone ki-eye fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection