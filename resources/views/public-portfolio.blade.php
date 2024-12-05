@extends('layouts.public')
@section('content')
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center flex-lg-row-fluid p-3 p-lg-5">
            <!-- Profile Card -->
            <div class="container">
                <div class="overlay mb-11">
                    <!-- Background Image: Use background-size: cover to make it responsive -->
                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-325px"
                        style="background-image:url('/assets/media/stock/1600x800/img-3.jpg'); background-size: cover; background-position: center center;">
                    </div>
                    <!-- Dark overlay layer for contrast -->
                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25"></div>
                </div>
                <div class="row justify-content-center">
                    <!-- Profile Image in 3 columns (for medium screens and up) -->
                    <div class="col-12 col-md-3 d-flex justify-content-center align-items-center mb-4 mb-md-0">
                        <div class="symbol symbol-150px symbol-lg-200px">
                            <img src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('/assets/media/avatars/300-1.webp') }}"
                                class="rounded-circle img-fluid"
                                alt="{{ $vcardDetails->name }}"
                                loading="lazy" />
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
                    <!-- Other Content in 9 columns (for medium screens and up) -->
                    <div class="col-12 col-md-9">
                        <div class="d-flex flex-column">
                            <h1 style="font-family: 'Poppins', sans-serif; font-size: 40px;">
                                {{ strtoupper($userDetails->name) }}
                                <br>
                                <small class="text-muted fs-3">{{ $vcardDetails->title }}</small>
                            </h1>
                            <section class="w-100">
                                <h4 class="text-dark mb-3">
                                    About me
                                </h4>
                                <div class="bg-light p-3 rounded shadow-sm">
                                    <p class="text-muted mb-0">
                                        {{$userDetails->bio}}
                                    </p>
                                </div>
                            </section>
                            <div class="text-end mt-5 mb-5">
                                @if(Auth::check())
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
                                    Book Appointment
                                </button>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-secondary">
                                    Login to Book Appointment
                                </a>
                                @endif
                            </div>



                            <!-- Book Appointment Modal -->
                            <div class="modal fade" id="bookAppointmentModal" tabindex="-1" aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bookAppointmentModalLabel">Book Appointment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="appointmentForm" class="form" action="{{ route('appointment.store', ['username' => $userDetails->username]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $userDetails->id }}">
                                            <input type="hidden" name="username" value="{{ $userDetails->username }}">

                                            <div class="modal-body">
                                                <div class="card-body p-5">
                                                    <!-- Service Selection -->
                                                    <div class="mb-4 fv-row">
                                                        <label for="service_id" class="form-label required fw-bold">Select Service</label>
                                                        <select class="form-select form-select-solid" id="service_id" name="service_id" required>
                                                            <option value="">Select a service...</option>
                                                            @foreach($services as $service)
                                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Appointment Date & Time -->
                                                    <div class="mb-4 fv-row">
                                                        <label for="appointment_time" class="form-label required fw-bold">Appointment Date & Time</label>
                                                        <input type="datetime-local"
                                                            class="form-control form-control-solid"
                                                            id="appointment_time"
                                                            name="appointment_time"
                                                            required>
                                                    </div>

                                                    <!-- Duration Selection -->
                                                    <div class="mb-4 fv-row">
                                                        <label class="form-label required fw-bold">Duration</label>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 {{ old('duration_minutes') == 30 ? 'active' : '' }}">
                                                                    <input class="btn-check" type="radio" name="duration_minutes" value="30" {{ old('duration_minutes') == 30 ? 'checked' : '' }}>
                                                                    <span class="d-flex">
                                                                        <span class="ms-4">
                                                                            <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">30 Minutes</span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="col-4">
                                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 {{ old('duration_minutes') == 60 ? 'active' : '' }}">
                                                                    <input class="btn-check" type="radio" name="duration_minutes" value="60" {{ old('duration_minutes') == 60 ? 'checked' : '' }}>
                                                                    <span class="d-flex">
                                                                        <span class="ms-4">
                                                                            <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">1 Hour</span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="col-4">
                                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 {{ old('duration_minutes') == 90 ? 'active' : '' }}">
                                                                    <input class="btn-check" type="radio" name="duration_minutes" value="90" {{ old('duration_minutes') == 90 ? 'checked' : '' }}>
                                                                    <span class="d-flex">
                                                                        <span class="ms-4">
                                                                            <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">1.5 Hours</span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            var durationButtons = document.querySelectorAll('input[name="duration_minutes"]');
                                                            durationButtons.forEach(function(button) {
                                                                button.addEventListener('change', function() {
                                                                    durationButtons.forEach(function(btn) {
                                                                        if (btn.checked) {
                                                                            btn.parentElement.classList.add('active');
                                                                        } else {
                                                                            btn.parentElement.classList.remove('active');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        });
                                                    </script>

                                                    <!-- Notes Field -->
                                                    <div class="mb-4 fv-row">
                                                        <label for="notes" class="form-label fw-bold">Notes (Optional)</label>
                                                        <textarea class="form-control form-control-solid"
                                                            id="notes"
                                                            name="notes"
                                                            rows="3"
                                                            placeholder="Add any additional notes here"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" data-url="{{ url('in/' . $userDetails->username) }}" id="submitButton">
                                                    <span class="indicator-label">Book Appointment</span>
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
                    </div>
                </div>
                <!-- Services Section -->
                @if($services->count() > 0)
                <div class="row mb-5 justify-content-center">
                    <div class="col-12 text-center mb-5">
                        <h1 class="text-dark fw-bold" style="font-family: 'Poppins', sans-serif; font-size: 3.5rem;">
                            Services
                        </h1>
                        <hr class="w-25 mx-auto my-3" style="border-top: 2px solid #000; border-radius: 1px;">
                    </div>
                    @foreach ($services as $service)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm" style="border-bottom-left-radius: 70px;border-top-right-radius: 70px;">
                            <img src="{{ asset('UserUploads/Services/' . $service->thumbnail) }}"
                                class="card-img-top"
                                alt="{{ $service->name }}"
                                style="height: 200px;border-top-right-radius: 70px;object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-dark">{{ $service->name }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($service->description, 150) }}</p>
                                <a href="{{ url('service/show', $service->id) }}" class="btn btn-primary text-white mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <!-- Portfolios Section -->
                @if($portfolios->count() > 0)
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-5">
                        <h1 class="text-dark fw-bold" style="font-family: 'Poppins', sans-serif; font-size: 3.5rem;">
                            Portfolio
                        </h1>
                        <hr class="w-25 mx-auto my-3" style="border-top: 2px solid #000; border-radius: 1px;">
                    </div>
                    @foreach ($portfolios as $portfolio)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm" style="border-bottom-left-radius: 70px;border-top-right-radius: 70px;">
                            <img src="{{ asset('UserUploads/Portfolio/' . $portfolio->file_path) }}"
                                class="card-img-top"
                                alt="{{ $portfolio->title }}"
                                style="height: 200px;border-top-right-radius: 70px;object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-dark">{{ $portfolio->title }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($portfolio->description, 150) }}</p>
                                @if($portfolio->price)
                                <p class="text-primary fw-bold mb-3">Price: ${{ number_format($portfolio->price, 2) }}</p>
                                @endif
                                <a href="{{ url('portfolio/show', $portfolio->id) }}" class="btn btn-primary text-white mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <div class="row justify-content-center mt-5">
                    <div class="col-12 text-center mb-5">

                    </div>
                    <div class="card-body pb-lg-20">
                        <form action="{{ url('in/contact') }}" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_contact_form">
                            @csrf
                            <div class="d-flex flex-column mb-9 fv-row">
                                <h1 class="fw-bold text-gray-900 mb-7">Submit a Message</h1>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-semibold mb-2">Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="name">
                                    <input type="hidden" name="user_id" value="{{ $userDetails->id }}">
                                    <input type="hidden" name="username" value="{{ $userDetails->username }}">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-semibold mb-2">Email</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="email">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 fv-row">
                                <label class="fs-5 fw-semibold mb-2">Subject</label>
                                <input class="form-control form-control-solid" placeholder="" name="subject">
                            </div>
                            <div class="d-flex flex-column mb-10 fv-row fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold mb-2">Message</label>
                                <textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                    <span class="indicator-label">
                                        Send Message</span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card border-0 bg-light text-center ">
                        <div class="card-body py-8">

                            @if($vcardDetails->social_media_facebook)
                            <a href="{{ $vcardDetails->social_media_facebook }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                            @if($vcardDetails->social_media_instagram)
                            <a href="{{ $vcardDetails->social_media_instagram }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/instagram-2016.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                            @if($vcardDetails->social_media_github)
                            <a href="{{ $vcardDetails->social_media_github }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/github.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                            @if($vcardDetails->social_media_behance)
                            <a href="{{ $vcardDetails->social_media_behance }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/behance.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                            @if($vcardDetails->social_media_pinterest)
                            <a href="{{ $vcardDetails->social_media_pinterest }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/pinterest-p.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                            @if($vcardDetails->social_media_twitter)
                            <a href="{{ $vcardDetails->social_media_twitter }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                            @if($vcardDetails->social_media_dribbble)
                            <a href="{{ $vcardDetails->social_media_dribbble }}" class="mx-4" target="_blank">
                                <img src="/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-30px my-2" alt="">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection