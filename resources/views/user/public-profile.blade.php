@extends('layouts.public')
@section('content')
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center flex-lg-row-fluid p-3 p-lg-5">
            <!-- Profile Card -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!-- Developer Name and Position -->
                            <h1 class="text-dark fs-1 mb-3 text-center" style="font-family: 'Poppins', sans-serif; font-size: 100px;">
                                {{ strtoupper($user->name) }}
                            </h1>
                            <!-- Developer Bio -->
                            <section class="w-100">
                                <h4 class="text-dark mb-3">
                                    About me
                                </h4>
                                <div class="bg-light p-3 rounded shadow-sm">
                                    <p class="text-muted mb-0">
                                        Just give me text bio.
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- Profile Image -->
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                        <div class="symbol symbol-150px symbol-lg-200px mb-4">
                            <img src="{{ $user->profile_photo_url ?? asset('UserUploads/UserProfile/namanmahi.jpeg') }}"
                                class="rounded-circle img-fluid"
                                alt="{{ $user->name }}"
                                loading="lazy" />
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
                        <div class="card h-100 shadow-sm rounded-3">
                            <img src="{{ asset('UserUploads/Services/' . $service->thumbnail) }}"
                                class="card-img-top"
                                alt="{{ $service->name }}"
                                style="height: 200px; object-fit: cover;">
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
                        <div class="card h-100 shadow-sm rounded-3">
                            <img src="{{ asset('UserUploads/Portfolio/' . $portfolio->file_path) }}"
                                class="card-img-top"
                                alt="{{ $portfolio->title }}"
                                style="height: 200px; object-fit: cover;">
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
                <!-- Appointment Section -->
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-5">
                        <h1 class="text-dark fw-bold" style="font-family: 'Poppins', sans-serif; font-size: 3.5rem;">
                            Book an Appointment
                        </h1>
                        <hr class="w-25 mx-auto my-3" style="border-top: 2px solid #000; border-radius: 1px;">
                    </div>
                    <div class="col-md-12">
                        <div class="card" style="border: none; background-color: transparent;">
                            <div class="card-body p-5">
                                <form action="{{ route('appointments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="mb-4">
                                        <label for="service_id" class="form-label fw-bold">Select Service</label>
                                        <select class="form-select form-select-solid" id="service_id" name="service_id" required>
                                            @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="appointment_time" class="form-label fw-bold">Appointment Date & Time</label>
                                        <input type="datetime-local" class="form-control form-control-solid" id="appointment_time" name="appointment_time" required min="{{ date('Y-m-d\TH:i') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Duration</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" onclick="setActive(this)">
                                                    <input class="btn-check btn-check-solid" type="radio" checked="checked" name="duration_minutes" value="30">
                                                    <span class="d-flex">
                                                        <i class="ki-duotone ki-timer fs-3hx"></i>
                                                        <span class="ms-4">
                                                            <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">30 Minutes</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" onclick="setActive(this)">
                                                    <input class="btn-check btn-check-solid" type="radio" name="duration_minutes" value="60">
                                                    <span class="d-flex">
                                                        <i class="ki-duotone ki-timer fs-3hx"></i>
                                                        <span class="ms-4">
                                                            <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">1 Hour</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" onclick="setActive(this)">
                                                    <input class="btn-check btn-check-solid" type="radio" name="duration_minutes" value="75">
                                                    <span class="d-flex">
                                                        <i class="ki-duotone ki-timer fs-3hx"></i>
                                                        <span class="ms-4">
                                                            <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">1 Hour 15 Minutes</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function setActive(element) {
                                            // Remove active class from all labels
                                            document.querySelectorAll('.btn-outline-dashed').forEach(label => {
                                                label.classList.remove('active');
                                            });
                                            // Add active class to clicked label
                                            element.classList.add('active');
                                        }
                                        // Set initial active state
                                        window.onload = function() {
                                            const checkedInput = document.querySelector('input[name="duration_minutes"]:checked');
                                            if (checkedInput) {
                                                checkedInput.closest('label').classList.add('active');
                                            }
                                        }
                                    </script>
                                    <div class="mb-4">
                                        <label for="notes" class="form-label fw-bold">Notes</label>
                                        <textarea class="form-control form-control-solid" id="notes" name="notes" rows="5" placeholder="Please describe the purpose of your appointment and any additional information"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary px-5 py-2">
                                            Request Appointment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-12">
                        <div class="text-center border-top pt-lg-20">
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <img src="{{ $user->profile_photo_url ?? asset('UserUploads/UserProfile/namanmahi.jpeg') }}" class="rounded-circle" alt="{{ $user->name }}" style="width: 40px; height: 40px;" loading="lazy" />
                                <h5 class="text-dark mb-0">{{ ucfirst($user->name) }}</h5>
                                <p class="text-muted mb-0"><i class="fas fa-envelope me-1"></i>{{ $user->email }}</p>
                                <p class="text-muted mb-0"><i class="fas fa-id-card me-1"></i>{{ chunk_split($user->digital_id, 4, ' ') }}</p>
                                <p class="text-muted small mb-0">Member since {{ \Carbon\Carbon::parse($user->created_at)->format('M Y') }}</p>
                                @if($user->about)<p class="text-muted small mb-0">{{ Str::limit($user->about, 100) }}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="card-body pb-lg-20">
                        <div class="mb-13">
                            <div class="mb-9">
                                <h3 class="fs-2qx fw-bold text-gray-900">About KeenThemes</h3>
                                <span class="fs-5 fw-semibold text-gray-500">Save thousands to millions of bucks by using tool great skills</span>
                            </div>
                            <div class="overlay mb-11">
                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-325px" style="background-image:url('/good/assets/media/stock/1600x800/img-3.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <a href="/good/pages/contact.html" class="btn btn-primary">Contact Us</a>
                                    <a href="/good/pages/careers/apply.html" class="btn btn-light-primary ms-3">Join Us</a>
                                </div>
                            </div>
                            <div class="fs-5 fw-semibold text-gray-600 mt-4">
                                <p class="mb-8">
                                    First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words per minute and your writing skills are sharp.
                                    From the seed of the idea to finally hitting "Publish," you might spend several days or maybe even a week "writing" a blog post, but it's important to spend those vital hours planning
                                    your post and even thinking about
                                    <a href="/good/pages/blog/post.html" class="link-primary pe-1">Your Post</a>
                                    (yes, thinking counts as working if you're a blogger) before you actually write it.
                                </p>
                                <p class="m-0">
                                    Before you do any of the following steps, be sure to pick a topic that actually interests you. Nothing – and
                                    <a href="/good/pages/blog/home.html" class="link-primary pe-1">I mean NOTHING</a>
                                    – will kill a blog post more effectively than a lack of enthusiasm from the writer.
                                    You can tell when a writer is bored by their subject, and it's so cringe-worthy it's a little embarrassing.
                                </p>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-xl-5">
                                <img src="/good/assets/media/product/1.svg" class="mw-100 me-15" alt="">
                            </div>
                            <div class="col-xl-7">
                                <div class="d-flex align-items-center mb-6">
                                    <div class="symbol symbol-50px me-5 me-lg-9">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-timer fs-2x text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bold mb-1">This is by far the cleanest template</a>
                                        <span class="text-gray-700 fw-semibold fs-6">The most well thought out design theme.</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-6">
                                    <div class="symbol symbol-50px me-5 me-lg-9">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-abstract-25 fs-2x text-danger"><span class="path1"></span><span class="path2"></span></i> </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bold mb-1">Keep All Your Sentences Short</a>
                                        <span class="text-gray-700 fw-semibold fs-6">Before you do any of the following steps.</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center ">
                                    <div class="symbol symbol-50px me-5 me-lg-9">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-abstract-35 fs-2x text-primary"><span class="path1"></span><span class="path2"></span></i> </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bold mb-1">How to Write a Blog Post</a>
                                        <span class="text-gray-700 fw-semibold fs-6">The css styles are amazingly.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-0">
                            <div class="mb-9">
                                <h1 class="fw-bold text-gray-900 mb-3">Our Great Team</h1>
                                <span class="fs-5 fw-semibold text-muted">
                                    Save thousands to millions of bucks by using single tool
                                    for different amazing and great useful admin
                                </span>
                            </div>
                            <div class="d-flex flex-wrap w-100 mw-xxl-800px">
                                <div class="d-flex flex-column text-center mb-11 me-5 me-lg-15">
                                    <div class="symbol symbol-100px symbol-lg-150px mb-4">
                                        <img src="/good/assets/media/avatars/300-11.jpg" class="" alt="">
                                    </div>
                                    <div class="text-center">
                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-4">Paul Miles</a>
                                        <span class="text-muted d-block fw-semibold">Development Lead</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column text-center mb-11 me-5 me-lg-15">
                                    <div class="symbol symbol-100px symbol-lg-150px mb-4">
                                        <img src="/good/assets/media/avatars/300-2.jpg" class="" alt="">
                                    </div>
                                    <div class="text-center">
                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-4">Melisa Marcus</a>
                                        <span class="text-muted d-block fw-semibold">Creative Head</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column text-center mb-11 me-5 me-lg-15">
                                    <div class="symbol symbol-100px symbol-lg-150px mb-4">
                                        <img src="/good/assets/media/avatars/300-5.jpg" class="" alt="">
                                    </div>
                                    <div class="text-center">
                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-4">James Nilson</a>
                                        <span class="text-muted d-block fw-semibold">Python Expert</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column text-center mb-11 me-5 me-lg-15">
                                    <div class="symbol symbol-100px symbol-lg-150px mb-4">
                                        <img src="/good/assets/media/avatars/300-24.jpg" class="" alt="">
                                    </div>
                                    <div class="text-center">
                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-4">Arlene McCoy</a>
                                        <span class="text-muted d-block fw-semibold">Python Expert</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-4 fw-semibold text-gray-600 mb-10">
                            First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words per minute and your writing skills are sharp.
                            From the seed of the idea to finally hitting "Publish," you might spend several days or maybe even a week "writing" a blog post, but it's important to spend those vital hours planning
                            your post and even thinking about
                            <a href="/good/pages/blog/post.html" class="link-primary pe-1">Your Post</a>
                            (yes, thinking counts as working if you're a blogger) before you actually write it.
                        </div>
                        <div class="row align-items-center mb-10 ">
                            <div class="col-lg-7">
                                <div class="mb-5 position-relative z-index-3">
                                    <div class="mb-6">
                                        <h1 class="fw-bold text-gray-900 fw-bold lh-base">
                                            Writing a Great Headline <br> Write an Outline For Your Post
                                        </h1>
                                    </div>
                                    <span class="text-gray-700 d-block fw-semibold fs-4 pb-4 lh-lg">
                                        The most well thought out design theme I have ever used.
                                        The codes are up to tandard. The css styles are amazingly very clean.
                                        In fact the cleanest and the most up to standard I have ever seen.
                                    </span>
                                    <span class="text-gray-700 fw-semibold fs-4 lh-lg">
                                        In fact the cleanest and the most up to standard codes are up to
                                        tandard. The css styles are amazingly very clean.
                                    </span>
                                </div>
                                <div class="d-flex position-relative z-index-3">
                                    <div class="me-lg-19 me-7">
                                        <div class="text-gray-900 fw-semibold fs-1">
                                            <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="100" data-kt-initialized="1">100</span> %
                                        </div>
                                        <span class="text-gray-700 d-block fw-semibold fs-4">Satisfication</span>
                                    </div>
                                    <div class="me-lg-19 me-7">
                                        <div class="text-gray-900 fw-semibold fs-1">
                                            <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="124" data-kt-initialized="1">124</span> K
                                        </div>
                                        <span class="text-gray-700 d-block fw-semibold fs-4">Customers</span>
                                    </div>
                                    <div class="me-lg-19 me-7">
                                        <div class="text-gray-900 fw-semibold fs-1">
                                            <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="24" data-kt-countup-prefix="$" data-kt-initialized="1">$24</span> K
                                        </div>
                                        <span class="text-gray-700 d-block fw-semibold fs-4">Transactions</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <img src="/good/assets/media/svg/illustrations/easy/4.svg" class="w-175px mb-10" alt="">
                                <div class="ps-13">
                                </div>
                            </div>
                        </div>
                        <div class="card" style="border: none; background-color: transparent;">
                            <div class="card-body p-lg-10">
                                <div class="mb-15">
                                    <h3 class="text-gray-900 mb-7">Latest Articles, News &amp; Updates</h3>
                                    <div class="separator separator-dashed mb-9"></div>
                                    <div class="row mb-10 mb-lg-18">
                                        <div class="col-xl-6">
                                            <div class="h-100 d-flex flex-column justify-content-between pe-xl-6 mb-xl-0 mb-10">
                                                <div class="overlay mt-2">
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-325px" style="background-image:url('/good/assets/media/stock/600x400/img-80.jpg')">
                                                    </div>
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <a href="/good/pages/about.html" class="btn btn-primary">About Us</a>
                                                        <a href="/good/pages/careers/apply.html" class="btn btn-light-primary ms-3">Join Us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="ps-xl-6">
                                                <div class="mb-7">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="text-gray-500 fw-bold">Apr 27, 2022</span>
                                                        <span class="badge badge-light-info text-uppercase fw-bold my-2">Blog</span>
                                                    </div>
                                                    <a href="#" class="fw-bold text-gray-900 mb-3 fs-3qx lh-sm text-hover-primary">
                                                        Bootstrap Admin -
                                                        <br>
                                                        How To Get Started
                                                        <br>
                                                        Tutorial.
                                                    </a>
                                                    <div class="fw-semibold fs-5 mt-3 text-gray-600">
                                                        We've been focused on making the from v4 to v5 a
                                                        but we've
                                                        <br>
                                                        also not been afraid to step away been
                                                        focused on from v4 to
                                                        <br>
                                                        v5 speaker approachable
                                                        making focused
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack flex-wrap">
                                                    <div class="d-flex align-items-center pe-2">
                                                        <div class="symbol symbol-40px symbol-rounded me-3">
                                                            <img src="/good/assets/media/avatars/300-20.jpg" alt="">
                                                        </div>
                                                        <div class="fs-5 fw-bold">
                                                            <a href="/good/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                                            <span class="text-gray-500">Creative Dept</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-10">
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch me-md-6">
                                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-78.jpg">
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-78.jpg')">
                                                    </div>
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                </a>
                                                <div class="mt-5">
                                                    <a href="/good/pages/user-profile/overview.html" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">
                                                        Bootstrap Admin - How To Started the Dashboard Tutorial </a>
                                                    <div class="fw-semibold fs-5 text-gray-600 my-3">
                                                        We've been focused on making a the from also not been afraid to and step away
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="fs-6 fw-bold">
                                                            <span class="text-gray-500">Apr 27, 2022</span>
                                                        </div>
                                                        <span class="badge badge-light-primary fw-bold my-2">TUTORIALS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch mx-md-3">
                                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-76.jpg">
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-76.jpg')">
                                                    </div>
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                </a>
                                                <div class="mt-5">
                                                    <a href="/good/pages/user-profile/overview.html" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">
                                                        React Admin - How To Started the Dashboard Tutorial </a>
                                                    <div class="fw-semibold fs-5 text-gray-600 my-3">
                                                        We've been focused on making a the from also not been afraid to and step
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="fs-6 fw-bold">
                                                            <span class="text-gray-500">Feb 02, 2022</span>
                                                        </div>
                                                        <span class="badge badge-light-info fw-bold my-2">BLOG</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch ms-md-6">
                                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-77.jpg">
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-77.jpg')">
                                                    </div>
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                </a>
                                                <div class="mt-5">
                                                    <a href="/good/pages/user-profile/overview.html" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">
                                                        Angular Admin - How To Started the Dashboard Tutorial </a>
                                                    <div class="fw-semibold fs-5 text-gray-600 my-3">
                                                        We've been focused on making a the from great amnd amazing
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="fs-6 fw-bold">
                                                            <span class="text-gray-500">Dec 27, 2021</span>
                                                        </div>
                                                        <span class="badge badge-light-warning fw-bold my-2">NEWS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-17">
                                    <div class="d-flex flex-stack mb-5">
                                        <h3 class="text-gray-900">Video Tutorials</h3>
                                        <a href="#" class="fs-6 fw-semibold link-primary">
                                            View All Videos
                                        </a>
                                    </div>
                                    <div class="separator separator-dashed mb-9"></div>
                                    <div class="row g-5 g-lg-10">
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch me-md-6">
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('/good/assets/media/stock/600x400/img-73.jpg')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                                                    <img src="/good/assets/media/svg/misc/video-play.svg" class="position-absolute top-50 start-50 translate-middle" alt="">
                                                </a>
                                                <div class="m-0">
                                                    <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary lh-base">
                                                        Admin Panel - How To Started the Dashboard Tutorial </a>
                                                    <div class="fw-semibold fs-5 text-gray-600  my-4">
                                                        We've been focused on making a the from also not been
                                                        afraid to and step away been focused create eye
                                                    </div>
                                                    <div class="fs-6 fw-bold">
                                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                                        <span class="text-gray-500">on Mar 21 2021</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch mx-md-3">
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('/good/assets/media/stock/600x400/img-74.jpg')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                                                    <img src="/good/assets/media/svg/misc/video-play.svg" class="position-absolute top-50 start-50 translate-middle" alt="">
                                                </a>
                                                <div class="m-0">
                                                    <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary lh-base">
                                                        Admin Panel - How To Started the Dashboard Tutorial </a>
                                                    <div class="fw-semibold fs-5 text-gray-600  my-4">
                                                        We've been focused on making the from v4 to v5 but we
                                                        have also not been afraid to step away been focused
                                                    </div>
                                                    <div class="fs-6 fw-bold">
                                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Cris Morgan</a>
                                                        <span class="text-gray-500">on Apr 14 2021</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch ms-md-6">
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('/good/assets/media/stock/600x400/img-47.jpg')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                                                    <img src="/good/assets/media/svg/misc/video-play.svg" class="position-absolute top-50 start-50 translate-middle" alt="">
                                                </a>
                                                <div class="m-0">
                                                    <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary lh-base">
                                                        Admin Panel - How To Started the Dashboard Tutorial </a>
                                                    <div class="fw-semibold fs-5 text-gray-600  my-4">
                                                        We've been focused on making the from v4 to v5
                                                        but we've also not been afraid to step away been focused
                                                    </div>
                                                    <div class="fs-6 fw-bold">
                                                        <a href="/good/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Carles Nilson</a>
                                                        <span class="text-gray-500">on May 14 2021</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-17">
                                    <div class="d-flex flex-stack mb-5">
                                        <h3 class="text-gray-900">Hottest Bundles</h3>
                                        <a href="#" class="fs-6 fw-semibold link-primary">
                                            View All Offers
                                        </a>
                                    </div>
                                    <div class="separator separator-dashed mb-9"></div>
                                    <div class="row g-5 g-lg-10">
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch me-md-6">
                                                <a class="d-block overlay" data-fslightbox="latest-posts" href="/good/assets/media/stock/600x400/img-23.jpg">
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-23.jpg')">
                                                    </div>
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                </a>
                                                <div class="mt-5">
                                                    <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary lh-base">
                                                        25 Products Mega Bundle with 50% off discount amazing </a>
                                                    <div class="fw-semibold fs-5 text-gray-600 pt-3">
                                                        We've been focused on making a the from also not been eye </div>
                                                    <div class="d-flex flex-stack flex-wrap pt-4 gap-2">
                                                        <span class="rounded border border-dashed fs-2 fw-bold text-gray-900 py-1 px-2">
                                                            <span class="fs-6 fw-semibold text-gray-500">$</span>
                                                            28 </span>
                                                        <a href="#" class="btn btn-sm btn-primary">Purchase</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-xl-stretch mx-md-3">
                                                <a class="d-block overlay" data-fslightbox="latest-posts" href="/good/assets/media/stock/600x600/img-14.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x600/img-14.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Overlay-->
                                                <!--begin::Body-->
                                                <div class="mt-5">
                                                    <!--begin::Title-->
                                                    <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary lh-base">
                                                        25 Products Mega Bundle with 50% off discount amazing </a>
                                                    <!--end::Title-->
                                                    <!--begin::Text-->
                                                    <div class="fw-semibold fs-5 text-gray-600 pt-3">
                                                        We’ve been focused on making a the from also not been eye </div>
                                                    <!--end::Text-->
                                                    <!--begin::Footer-->
                                                    <div class="d-flex flex-stack flex-wrap pt-4 gap-2">
                                                        <!--begin::Label-->
                                                        <span class="rounded border border-dashed fs-2 fw-bold text-gray-900 py-1 px-2">
                                                            <span class="fs-6 fw-semibold text-gray-500">$</span>
                                                            27 </span>
                                                        <!--end::Label-->
                                                        <!--begin::Action-->
                                                        <a href="#" class="btn btn-sm btn-primary">Purchase</a>
                                                        <!--end::Action-->
                                                    </div>
                                                    <!--end::Footer-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Hot sales post-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4">
                                            <!--begin::Hot sales post-->
                                            <div class="card-xl-stretch ms-md-6">
                                                <!--begin::Overlay-->
                                                <a class="d-block overlay" data-fslightbox="latest-posts" href="/good/assets/media/stock/600x400/img-71.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-71.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Overlay-->
                                                <!--begin::Body-->
                                                <div class="mt-5">
                                                    <!--begin::Title-->
                                                    <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary lh-base">
                                                        25 Products Mega Bundle with 50% off discount amazing </a>
                                                    <!--end::Title-->
                                                    <!--begin::Text-->
                                                    <div class="fw-semibold fs-5 text-gray-600 pt-3">
                                                        We’ve been focused on making a the from also not been eye </div>
                                                    <!--end::Text-->
                                                    <!--begin::Footer-->
                                                    <div class="d-flex flex-stack flex-wrap pt-4 gap-2">
                                                        <!--begin::Label-->
                                                        <span class="rounded border border-dashed fs-2 fw-bold text-gray-900 py-1 px-2">
                                                            <span class="fs-6 fw-semibold text-gray-500">$</span>
                                                            25 </span>
                                                        <!--end::Label-->
                                                        <!--begin::Action-->
                                                        <a href="#" class="btn btn-sm btn-primary">Purchase</a>
                                                        <!--end::Action-->
                                                    </div>
                                                    <!--end::Footer-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Hot sales post-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::latest instagram-->
                                <div class="">
                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Content-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Title-->
                                            <h3 class="text-gray-900">Latest Instagram Posts</h3>
                                            <!--end::Title-->
                                            <!--begin::Link-->
                                            <a href="#" class="fs-6 fw-semibold link-primary">
                                                View Instagram
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed border-gray-300 mb-9 mt-5"></div>
                                        <!--end::Separator-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Row-->
                                    <div class="row g-10 row-cols-2 row-cols-lg-5">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-72.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-72.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-8.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-8.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-50.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-50.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x600/img-13.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x600/img-13.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/good/assets/media/stock/600x400/img-52.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/good/assets/media/stock/600x400/img-52.jpg')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="ki-duotone ki-eye fs-2x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Row-->
                                </div>
                                <!--end::latest instagram-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--begin::Form-->
                        <form action="" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_contact_form">
                            <!--begin::Title-->
                            <div class="d-flex flex-column mb-9 fv-row">
                                <h1 class="fw-bold text-gray-900 mb-7">Submit a Request</h1>
                                <span class="fs-4 fw-semibold text-gray-600 d-block">
                                    First, a disclaimer – the entire process of writing a blog post often takes more <br>
                                    than a couple of hours, even if you can type
                                </span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="name">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Email</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="email">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Subject</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="subject">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-10 fv-row fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold mb-2">Message</label>
                                <textarea class="form-control form-control-solid" rows="6" name="message" placeholder="">        </textarea>
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Submit-->
                            <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Send Feedback</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress--> </button>
                            <!--end::Submit-->
                        </form>
                        <!--end::Form-->
                        <!--begin::Map-->
                        <!--end::Map-->
                    </div>
                    <!--begin::Social links-->
                    <div class="card border-0 bg-light text-center ">
                        <!--begin::Body-->
                        <div class="card-body py-8">
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/instagram-2016.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/github.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/behance.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/pinterest-p.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="/good/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Social links-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection