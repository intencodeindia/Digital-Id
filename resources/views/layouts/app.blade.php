<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital ID</title>
    <meta charset="utf-8" />
    <meta name="description" content="Digital ID - Digital Identity Platform for Business Cards and Employee Management" />
    <meta name="keywords" content="Digital ID, Business Cards, Employee Directory, Digital Identity" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Digital ID - Digital Identity Platform" />
    <meta property="og:url" content="https://digitalid.com" />
    <meta property="og:site_name" content="Digital ID" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

<body id="kt_app_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" data-kt-app-layout="light-sidebar" class="body-bg position-relative app-blank">
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="m-0">
            <div class="landing-header mb-13" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <div class="container-xxl">
                    
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center me-8">
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none ms-n2" id="kt_landing_menu_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </button>

                            <a href="/">
                                <img alt="Digital ID Logo" src="{{ asset('assets/media/logos/logo.jpg') }}" class="h-80px" />
                            </a>
                        </div>

                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div class="d-lg-block p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

                                @if(request()->url() === url('/'))
                                <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-dark menu-state-title-primary nav nav-flush fs-3 fw-semibold" id="kt_landing_menu">
                                    <div class="menu-item">
                                        <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body">Home</a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works">How it Works</a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#features">Features</a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing">Pricing</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex-equal text-end ms-1 position-relative z-index-2">
                            <a href="{{ url('/login') }}" class="btn btn-danger btn-sm">Login</a>
                            <a href="{{ url('/register') }}" class="btn btn-danger btn-sm">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
            <div class="mb-0">
                <div class="landing-dark-bg pt-lg-20 pt-5">
                    <div class="container">
                        <div class="row py-10 py-lg-20">
                            <div class="col-lg-6 mb-10 mb-lg-0">
                                <div class="rounded landing-border p-9 mb-6">
                                    <h2 class="text-gray-900 fw-semibold mb-3">Would you need a Digital Identity Solution?</h2>
                                    <span class="fw-normal fs-4 text-gray-600">
                                        Email us to
                                        <a href="https://digitalid.com/support" class="fw-semibold fs-4 text-gray-800 text-hover-primary">support@digitalid.com</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex fw-semibold flex-column me-20">
                                        <h4 class="fw-bold text-gray-900 mb-6">More for Good</h4>
                                        <a href="https://digitalid.com/faqs" class="text-gray-700 text-hover-primary fs-5 mb-6">FAQ</a>
                                        <a href="/good/documentation/getting-started.html" class="text-gray-700 text-hover-primary fs-5 mb-6">Documentaions</a>
                                        <a href="https://www.youtube.com/c/KeenThemesTuts/videos" class="text-gray-700 text-hover-primary fs-5 mb-6">Video Tuts</a>
                                        <a href="/good/documentation/getting-started/changelog.html" class="text-gray-700 text-hover-primary fs-5 mb-6">Changelog</a>
                                        <a href="https://devs.digitalid.com/" class="text-gray-700 text-hover-primary fs-5 mb-6">Support Forum</a>
                                        <a href="https://digitalid.com/blog" class="text-gray-700 text-hover-primary fs-5">Blog</a>
                                    </div>
                                    <div class="d-flex fw-semibold flex-column ms-lg-20">
                                        <h4 class="fw-bold text-gray-900 mb-6">Stay Connected</h4>
                                        <a href="https://www.facebook.com/digitalid.com" class="mb-6">
                                            <img src="/good/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Facebook</span>
                                        </a>
                                        <a href="https://github.com/digitalid.com" class="mb-6">
                                            <img src="/good/assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Github</span>
                                        </a>
                                        <a href="https://twitter.com/digitalid.com" class="mb-6">
                                            <img src="/good/assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Twitter</span>
                                        </a>
                                        <a href="https://dribbble.com/digitalid.com" class="mb-6">
                                            <img src="/good/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Dribbble</span>
                                        </a>
                                        <a href="https://www.instagram.com/digitalid.com" class="mb-6">
                                            <img src="/good/assets/media/svg/brand-logos/instagram-2016.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Instagram</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-solid"></div>
                    <div class="container">
                        <div class="d-flex flex-column flex-md-row flex-stack py-8">
                            <div class="d-flex align-items-center order-2 order-md-1">
                                <a href="/">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/logo.jpg') }}" class="h-40px h-md-60px" />
                                </a>
                                <span class="mx-5 fs-6 fw-semibold text-gray-700 pt-1" href="https://digitalid.com">
                                    Copyright &copy; Digital ID 2024
                                </span>
                            </div>
                            <ul class="menu menu-gray-700 menu-hover-primary fw-semibold fs-5 fs-md-5 order-1 mb-5 mb-md-0">
                                <li class="menu-item"><a href="https://digitalid.com/" target="_blank" class="menu-link px-2">About</a></li>
                                <li class="menu-item"><a href="https://digitalid.com/" target="_blank" class="menu-link px-2">Support</a></li>
                                <li class="menu-item"><a href="https://digitalid.com/" target="_blank" class="menu-link px-2">Purchase</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
            <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
            <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
            @stack('scripts')
</body>

</html>