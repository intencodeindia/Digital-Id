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
                            @php
                            $mytime = Carbon\Carbon::now();
                            $hour = $mytime->hour;
                            $greeting = '';
                            if ($hour >= 5 && $hour < 12) {
                                $greeting='Good Morning' ;
                                } elseif ($hour>= 12 && $hour
                                < 18) {
                                    $greeting='Good Afternoon' ;
                                    } else {
                                    $greeting='Good Evening' ;
                                    }
                                    @endphp
                                    {{ $greeting }} <br /> {{ ucfirst(Auth::user()->name) }}
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
                            <a href="{{ url('in/'.Auth::user()->username) }}" target="_blank" class="btn btn-sm hover-scale flex-shrink-0 w-100 w-sm-auto">
                                <i class="ki-duotone ki-eye fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <span class="ms-1">View Portfolio</span>
                            </a>
                            <a href="#" onclick="sharePortfolio('{{ url('in/'.Auth::user()->username) }}')" target="_blank" class="btn btn-md hover-scale flex-shrink-0 w-100 w-sm-auto">
                                <i class="ki-duotone ki-send fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <span class="ms-1">Share Portfolio</span>
                            </a>
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
        <!--begin::Row-->
        <div class="row g-5 g-xxl-10">
            <!--begin::Col-->
            <div class="px-5">
                <div id="kt_carousel_2_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
                    <!--begin::Heading-->
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <!--begin::Label-->
                        <span class="fs-4 fw-bold pe-2">Our Team</span>
                        <!--end::Label-->

                        <!--begin::Carousel Indicators-->
                        <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet">
                            <li data-bs-target="#kt_carousel_2_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
                            <li data-bs-target="#kt_carousel_2_carousel" data-bs-slide-to="1" class="ms-1"></li>
                            <li data-bs-target="#kt_carousel_2_carousel" data-bs-slide-to="2" class="ms-1"></li>
                        </ol>
                        <!--end::Carousel Indicators-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Carousel-->
                    <div class="carousel-inner pt-8">
                        <!--begin::Item 1-->
                        <div class="carousel-item active">
                            <div class="col-xl-6 col-xxl-6 mb-5 mb-xxl-10">
                                <div class="card bg-white border shadow-lg rounded-4 overflow-hidden">
                                    <div class="card-body p-4 d-flex flex-column flex-md-row align-items-center" id="business-card">
                                        <!-- User Image -->
                                        <div class="symbol symbol-120px me-md-5 mb-3 mb-md-0">
                                            <img src="{{ Auth::user()->profile_photo_url ?? asset('UserUploads/UserProfile/namanmahi.jpeg') }}" class="rounded-circle border border-4 border-primary" alt="User Photo" />
                                        </div>

                                        <!-- User Details -->
                                        <div class="flex-grow-1 me-md-5 text-center text-md-start mb-3 mb-md-0">
                                            <h3 class="fs-4 text-gray-800 fw-bold mb-2">{{ ucfirst($userDetails->name) }}</h3>
                                            <div class="text-muted fs-6 mb-2"><strong>Role:</strong> Web Developer</div>
                                            <div class="text-muted fs-6 mb-2"><i class="bi bi-envelope"></i> {{ $userDetails->email }}</div>
                                            <div class="text-muted fs-6"><i class="bi bi-phone"></i> {{ $userDetails->phone }}</div>
                                        </div>

                                        <!-- QR Code -->
                                        <div class="symbol symbol-125px">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode('BEGIN:VCARD
                                        VERSION:3.0
                                        N:' . $userDetails->name . '
                                        FN:' . $userDetails->name . '
                                        EMAIL:' . $userDetails->email . '
                                        REV:' . $userDetails->created_at->format('Y-m-d') . '
                                        END:VCARD') }}" alt="QR Code" />
                                        </div>
                                    </div>

                                    <!-- Download Button -->
                                    <div class="text-center text-md-end p-3">
                                        <button onclick="downloadBusinessCard()" class="btn btn-outline-primary btn-sm">Download Business Card</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Item 1-->

                        <!--begin::Item 2-->
                        <div class="carousel-item">
                            <div class="col-xl-6 col-xxl-6 mb-5 mb-xxl-10">
                                <div class="card bg-white border shadow-lg rounded-4 overflow-hidden">
                                    <div class="card-body p-4 d-flex flex-column flex-md-row align-items-center" id="business-card">
                                        <!-- User Image -->
                                        <div class="symbol symbol-120px me-md-5 mb-3 mb-md-0">
                                            <img src="{{ Auth::user()->profile_photo_url ?? asset('UserUploads/UserProfile/namanmahi.jpeg') }}" class="rounded-circle border border-4 border-primary" alt="User Photo" />
                                        </div>

                                        <!-- User Details -->
                                        <div class="flex-grow-1 me-md-5 text-center text-md-start mb-3 mb-md-0">
                                            <h3 class="fs-4 text-gray-800 fw-bold mb-2">{{ ucfirst($userDetails->name) }}</h3>
                                            <div class="text-muted fs-6 mb-2"><strong>Role:</strong> Graphic Designer</div>
                                            <div class="text-muted fs-6 mb-2"><i class="bi bi-envelope"></i> {{ $userDetails->email }}</div>
                                            <div class="text-muted fs-6"><i class="bi bi-phone"></i> {{ $userDetails->phone }}</div>
                                        </div>

                                        <!-- QR Code -->
                                        <div class="symbol symbol-125px">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode('BEGIN:VCARD
                                        VERSION:3.0
                                        N:' . $userDetails->name . '
                                        FN:' . $userDetails->name . '
                                        EMAIL:' . $userDetails->email . '
                                        REV:' . $userDetails->created_at->format('Y-m-d') . '
                                        END:VCARD') }}" alt="QR Code" />
                                        </div>
                                    </div>

                                    <!-- Download Button -->
                                    <div class="text-center text-md-end p-3">
                                        <button onclick="downloadBusinessCard()" class="btn btn-outline-primary btn-sm">Download Business Card</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Item 2-->

                        <!--begin::Item 3-->
                        <div class="carousel-item">
                            <div class="col-xl-6 col-xxl-6 mb-5 mb-xxl-10">
                                <div class="card bg-white border shadow-lg rounded-4 overflow-hidden">
                                    <div class="card-body p-4 d-flex flex-column flex-md-row align-items-center" id="business-card">
                                        <!-- User Image -->
                                        <div class="symbol symbol-120px me-md-5 mb-3 mb-md-0">
                                            <img src="{{ Auth::user()->profile_photo_url ?? asset('UserUploads/UserProfile/namanmahi.jpeg') }}" class="rounded-circle border border-4 border-primary" alt="User Photo" />
                                        </div>

                                        <!-- User Details -->
                                        <div class="flex-grow-1 me-md-5 text-center text-md-start mb-3 mb-md-0">
                                            <h3 class="fs-4 text-gray-800 fw-bold mb-2">{{ ucfirst($userDetails->name) }}</h3>
                                            <div class="text-muted fs-6 mb-2"><strong>Role:</strong> Project Manager</div>
                                            <div class="text-muted fs-6 mb-2"><i class="bi bi-envelope"></i> {{ $userDetails->email }}</div>
                                            <div class="text-muted fs-6"><i class="bi bi-phone"></i> {{ $userDetails->phone }}</div>
                                        </div>

                                        <!-- QR Code -->
                                        <div class="symbol symbol-125px">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode('BEGIN:VCARD
                                        VERSION:3.0
                                        N:' . $userDetails->name . '
                                        FN:' . $userDetails->name . '
                                        EMAIL:' . $userDetails->email . '
                                        REV:' . $userDetails->created_at->format('Y-m-d') . '
                                        END:VCARD') }}" alt="QR Code" />
                                        </div>
                                    </div>

                                    <!-- Download Button -->
                                    <div class="text-center text-md-end p-3">
                                        <button onclick="downloadBusinessCard()" class="btn btn-outline-primary btn-sm">Download Business Card</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Item 3-->
                    </div>
                    <!--end::Carousel-->
                </div>
            </div>
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@endsection