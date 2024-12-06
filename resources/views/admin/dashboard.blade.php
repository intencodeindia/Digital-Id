@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <h2 class="mb-5">Dashboard</h2>
        </div>

        <div class="row g-5 g-xxl-10">
            <!-- Card 1 - Total Documents -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-file-earmark fs-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $documents }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Documents</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Total Services -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-people fs-1 text-success"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $services }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Services</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Total Portfolios -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-building fs-1 text-warning"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $portfolios }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Portfolios</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 - Total Revenue (Placeholder) -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-person fs-1 text-danger"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Total Revenue</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">1000</span> <!-- Placeholder for revenue -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 - Total Users -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-people fs-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $total_users }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 - Total Organizations -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-building fs-1 text-success"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $total_organizations }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Organizations</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 7 - Total Employees -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-person-badge fs-1 text-warning"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $total_employees }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Employees</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 8 - Total Family Members -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-people fs-1 text-info"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $total_familymembers }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Family Members</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 9 - Total Admins -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-person-gear fs-1 text-danger"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $total_admins }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Admins</span>
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