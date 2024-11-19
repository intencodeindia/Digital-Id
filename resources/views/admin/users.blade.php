@extends('layouts.admin')
@section('title', 'Users')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <h2 class="mb-5">Users</h2>
        </div>
        <div class="row g-5 g-xxl-10">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i> <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Users">
                        </div>
                    </div>

                </div>
                <div class="card-body pt-0">
                    <div id="kt_subscriptions_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                        <div id="" class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_subscriptions_table" style="width: 100%;">

                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                        <th class="w-10px pe-2 dt-orderable-none" data-dt-column="0">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1">
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Digital ID</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created Date</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="{{ $user->id }}">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.view', $user->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                        </td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            @if($user->status)
                                            <div class="badge badge-light-success">Active</div>
                                            @else
                                            <div class="badge badge-light-danger">Inactive</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="badge badge-light">{{ $user->digital_id }}</div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? 'N/A' }}</td>
                                        <td data-order="{{ $user->created_at }}">
                                            {{ $user->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.users.view', $user->id) }}" class="btn btn-light btn-active-light-primary btn-sm">
                                                View
                                                <i class="ki-duotone ki-down fs-5 m-0"></i>
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