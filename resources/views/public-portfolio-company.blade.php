@extends('layouts.public')
@section('content')
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center flex-lg-row-fluid p-3 p-lg-5">
            <div class="container">
                <!-- Background Banner -->
                <div class="card mb-5">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <!-- Cover Photo -->
                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover min-h-250px w-100"
                                style="background-image:url('/assets/media/stock/1600x800/img-3.jpg');">
                            </div>

                            <!-- Profile Photo Overlapping Banner -->
                            <div class="position-absolute" style="bottom: -50px; left: 24px; z-index: 1000;">
                                <div class="symbol symbol-100px symbol-lg-160px bg-white rounded-3 shadow-sm p-1">
                                    <img src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('/assets/media/avatars/300-1.webp') }}"
                                        alt="{{ $vcardDetails->name }}"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="row">
                    <!-- Left Column - Main Info -->
                    <div class="col-lg-8">
                        <!-- Profile Info Card -->
                        <div class="card mb-5 mt-5">
                            <div class="card-body pt-9 pb-0">
                                <div class="mb-5">
                                    <h3 class="fs-2x mb-0">{{ $organization->name }}</h3>
                                    <p class="text-muted fs-4">{{ $vcardDetails->title }}</p>
                                </div>

                                <!-- About Section -->
                                <div class="mb-5">
                                    <h2 class="fs-5 text-gray-800 mb-3">About</h2>
                                    <p class="text-gray-600">{{$userDetails->bio}}</p>
                                </div>

                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Services">Our Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Portfolio">Our Portfolio</a>
                                    </li>

                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Services" role="tabpanel">
                                        <!-- Services Section -->
                                        @if($services->count() > 0)
                                        <div class="mb-5">
                                            @foreach ($services as $service)
                                            <div class="alert alert-light mb-3">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('UserUploads/Services/' . $service->thumbnail) }}"
                                                        class="rounded me-4"
                                                        alt="{{ $service->name }}"
                                                        style="width: 120px; height: 120px; object-fit: cover;">
                                                    <div>
                                                        <h3 class="fs-4 mb-2">{{ $service->name }}</h3>
                                                        <p class="text-gray-600 mb-0">{{ $service->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="Portfolio" role="tabpanel">
                                        <!-- Portfolio Section -->
                                        @if($portfolios->count() > 0)
                                        <div class="mb-5">
                                            @foreach ($portfolios as $portfolio)
                                            <div class="alert alert-light mb-3">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('UserUploads/Portfolio/' . $portfolio->file_path) }}"
                                                        class="rounded me-4"
                                                        alt="{{ $portfolio->title }}"
                                                        style="width: 120px; height: 120px; object-fit: cover;">
                                                    <div>
                                                        <h3 class="fs-4 mb-2">{{ $portfolio->title }}</h3>
                                                        <p class="text-gray-600 mb-0">{{ $portfolio->description }}</p>
                                                        @if($portfolio->price)
                                                        <p class="text-primary fw-bold">Starting at ${{ number_format($portfolio->price, 2) }}</p>
                                                        @endif
                                                        <a href="{{ url('portfolio/show', $portfolio->id) }}" class="btn btn-sm btn-primary">View Project</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <!-- Right Column - Contact & Social -->
                        <div class="col-lg-4">
                            <!-- Contact Card -->
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h4 class="fs-5 text-gray-800 mb-4">Contact Information</h4>

                                    <!-- Book Appointment Button -->
                                    @if(Auth::check())
                                    <button type="button" class="btn btn-primary w-100 mb-3" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
                                        <i class="ki-duotone ki-calendar-add me-2"></i>Book Appointment
                                    </button>
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-secondary w-100 mb-3">
                                        <i class="ki-duotone ki-lock-2 me-2"></i>Login to Book Appointment
                                    </a>
                                    @endif

                                    <!-- Social Links -->
                                    <div class="d-flex flex-wrap gap-2 mb-5 justify-content-center">
                                        @if($vcardDetails->social_media_linkedin)
                                        <a href="{{ $vcardDetails->social_media_linkedin }}" class="btn btn-icon btn-light-primary btn-sm" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        @endif
                                        @if($vcardDetails->social_media_twitter)
                                        <a href="{{ $vcardDetails->social_media_twitter }}" class="btn btn-icon btn-light-info btn-sm" target="_blank">
                                            <i class="fab fa-x"></i>
                                        </a>
                                        @endif
                                        @if($vcardDetails->social_media_github)
                                        <a href="{{ $vcardDetails->social_media_github }}" class="btn btn-icon btn-light-dark btn-sm" target="_blank">
                                            <i class="fab fa-github"></i>
                                        </a>
                                        @endif
                                        @if($vcardDetails->social_media_instagram)
                                        <a href="{{ $vcardDetails->social_media_instagram }}" class="btn btn-icon btn-light-danger btn-sm" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        @endif
                                        @if($vcardDetails->social_media_facebook)
                                        <a href="{{ $vcardDetails->social_media_facebook }}" class="btn btn-icon btn-light-primary btn-sm" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        @endif
                                        <!-- Add other social media links similarly -->
                                    </div>

                                    <!-- Contact Form -->
                                    <form action="{{ url('in/contact') }}" method="post" class="form" id="kt_contact_form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $userDetails->id }}">
                                        <input type="hidden" name="username" value="{{ $userDetails->username }}">

                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-solid" name="name" placeholder="Your Name">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-solid" name="email" placeholder="Your Email">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-solid" name="subject" placeholder="Subject">
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control form-control-solid" name="message" rows="4" placeholder="Your Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100" id="kt_contact_submit_button">
                                            <span class="indicator-label">Send Message</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Appointment Modal -->
    <div class="modal fade" id="bookAppointmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="appointmentForm" action="{{ route('appointment.store', ['username' => $userDetails->username]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $userDetails->id }}">
                    <input type="hidden" name="username" value="{{ $userDetails->username }}">

                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="form-label required">Select Service</label>
                            <select class="form-select" name="service_id" required>
                                <option value="">Choose a service...</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label required">Date & Time</label>
                            <input type="datetime-local" class="form-control" name="appointment_time" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label required">Duration</label>
                            <div class="d-flex gap-3">
                                <label class="btn btn-outline btn-outline-dashed flex-grow-1 p-4">
                                    <input type="radio" class="btn-check" name="duration_minutes" value="30">
                                    <span class="fw-bold">30 Minutes</span>
                                </label>
                                <label class="btn btn-outline btn-outline-dashed flex-grow-1 p-4">
                                    <input type="radio" class="btn-check" name="duration_minutes" value="60">
                                    <span class="fw-bold">1 Hour</span>
                                </label>
                                <label class="btn btn-outline btn-outline-dashed flex-grow-1 p-4">
                                    <input type="radio" class="btn-check" name="duration_minutes" value="90">
                                    <span class="fw-bold">1.5 Hours</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Notes (Optional)</label>
                            <textarea class="form-control" name="notes" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Schedule Appointment</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('message'))
    <script>
        Swal.fire({
            text: "{{ session('message') }}",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    </script>
    @endif

    @if(session('contact_message'))
    <script>
        Swal.fire({
            text: "{{ session('contact_message') }}",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    </script>
    @endif

    @endsection