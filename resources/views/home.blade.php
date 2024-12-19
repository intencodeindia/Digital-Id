<!-- resources/views/home.blade.php -->
@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Row-->
        <div class="row g-5 g-xxl-10">
            <!--begin::Col-->
            <div class="col-xl-12 col-xxl-12  mb-5 mb-xxl-10">
                <div
                    class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px h-xl-100 border-0 bg-gray-200i"
                    style="background-position: 100% 100%;background-size: 500px auto;background-image:url('/good/assets/media/misc/city.png')">
                    <div class="card-body d-flex flex-column justify-content-center align-items-start ps-lg-15">
                        <h3 class="text-gray-800 d-flex fs-2x fw-bolder mb-2 mb-lg-4">
                            Hello <br /> {{ ucfirst(Auth::user()->name) }}

                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5 g-xxl-10">
            <!--begin::Col-->
            <div class="col-12 mb-5 mb-xxl-10">
                <div class="alert alert-primary p-3 p-sm-4 p-md-5">
                    <div class="d-flex flex-column flex-sm-row align-items-center">
                        <i class="ki-duotone ki-element-7 fs-2hx text-primary me-0 me-sm-4 mb-3 mb-sm-0"><span class="path1"></span><span class="path2"></span></i>
                        <div class="d-flex flex-column flex-grow-1 text-center text-sm-start mb-3 mb-sm-0">
                            <h4 class="mb-1 text-dark">Share Your Portfolio</h4>
                            <span>Share your amazing portfolio with others</span>
                        </div>
                        <div class="d-flex flex-column flex-sm-row gap-2">
                            @if(Auth::user()->hasRole('organization'))
                            <a href="{{ url('company/'.Auth::user()->username) }}" target="_blank" class="btn btn-sm hover-scale flex-shrink-0 w-100 w-sm-auto">
                                <i class="ki-duotone ki-eye fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <span class="ms-1">View Portfolio</span>
                            </a>
                            <a href="#" onclick="sharePortfolio('{{ url('company/'.Auth::user()->username) }}')" target="_blank" class="btn btn-md hover-scale flex-shrink-0 w-100 w-sm-auto">
                                <i class="ki-duotone ki-send fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <span class="ms-1">Share Portfolio</span>
                            </a>
                            @else
                            <a href="{{ url('in/'.Auth::user()->username) }}" target="_blank" class="btn btn-sm hover-scale flex-shrink-0 w-100 w-sm-auto">
                                <i class="ki-duotone ki-eye fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <span class="ms-1">View Portfolio</span>
                            </a>
                            <a href="#" onclick="sharePortfolio('{{ url('in/'.Auth::user()->username) }}')" target="_blank" class="btn btn-md hover-scale flex-shrink-0 w-100 w-sm-auto">
                                <i class="ki-duotone ki-send fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <span class="ms-1">Share Portfolio</span>
                            </a>
                            @endif
                            <script>
                                function sharePortfolio(url) {
                                    if (navigator.share) {
                                        navigator.share({
                                                title: 'My Portfolio',
                                                text: 'Check out my digital portfolio!',
                                                url: url,
                                            })
                                            .catch(error => console.log('Error sharing:', error));
                                    } else {
                                        // Fallback for browsers that don't support Web Share API
                                        navigator.clipboard.writeText(url)
                                            .then(() => alert('Portfolio link copied to clipboard!'))
                                            .catch(err => alert('Failed to copy link'));
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row g-5 g-xxl-10">
            <!--begin::Col-->
            <div class="col-xl-4 mb-xxl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-file-earmark fs-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $documents->count() }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Documents</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-xxl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-gear fs-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $services->count() }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Services</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-xxl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-body pt-7">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px symbol-2by3 me-4">
                                <div class="symbol-label">
                                    <i class="bi bi-briefcase fs-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-stack w-100">
                                <div class="my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $portfolios->count() }}</a>
                                    <span class="text-gray-500 fw-semibold d-block pt-1">Total Portfolios</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@endsection