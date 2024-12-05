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
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.min.css">

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.min.js"></script>


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


            @yield('content')
            <div class="mb-0">
                <div class="landing-dark-bg pt-lg-20">
                    <div class="separator separator-solid"></div>
                    <div class="container">
                        <div class="d-flex flex-column flex-md-row flex-stack py-8">
                            <div class="d-flex align-items-center order-2 order-md-1">
                                <a href="/">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-color.png') }}" class="h-30px h-md-50px" />
                                </a>
                                <span class="mx-5 fs-6 fw-semibold text-gray-700 pt-1" href="https://digitalid.com">
                                    Copyright &copy; Proffid 2024
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
            <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
            <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
            <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
            <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
            <!-- <script src="{{ asset('assets/js/custom/authentication/sign-up/appointment.js') }}"></script> -->
            @stack('scripts')
</body>

</html>