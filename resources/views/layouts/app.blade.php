<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proffid - Digital Identity Platform for Business & Employee Management</title>

    <!-- Meta Tags for SEO -->
    <meta charset="utf-8" />
    <meta name="description" content="Proffid offers a cutting-edge Digital Identity Platform for secure online business cards, employee management, and digital identities. Simplify identity management for your team and clients." />
    <meta name="keywords" content="Proffid, Digital Identity, Business Cards, Employee Directory, Digital ID, Secure Identity, Employee Management, Digital Business Card Platform, Organizational Identity, Blockchain Identity" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Proffid" />
    <meta name="copyright" content="Proffid" />
    <meta name="language" content="English" />

    <!-- Open Graph Meta Tags (For Social Media Sharing) -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Proffid - Digital Identity Platform for Business & Employee Management" />
    <meta property="og:description" content="Proffid provides businesses with secure digital identities for employees, digital business cards, and centralized directory management. Revolutionize your organizational identity today!" />
    <meta property="og:url" content="https://proffid.com" />
    <meta property="og:site_name" content="Proffid" />
    <meta property="og:image" content="https://proffid.com/assets/images/og-image.jpg" /> <!-- Replace with actual image URL -->
    <meta property="og:image:alt" content="Proffid Digital Identity Platform" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@Proffid" />
    <meta name="twitter:title" content="Proffid - Digital Identity Platform for Business & Employee Management" />
    <meta name="twitter:description" content="Streamline employee management and improve security with Proffid's digital identity solutions. Manage business cards, employee profiles, and organizational identity." />
    <meta name="twitter:image" content="https://proffid.com/assets/images/twitter-card.jpg" /> <!-- Replace with actual image URL -->
    <meta name="twitter:image:alt" content="Proffid Digital Identity Platform" />

    <!-- Meta Tags for Mobile Optimization -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="theme-color" content="#126bc6" /> <!-- Sets the color of the browser toolbar on mobile devices -->

    <!-- Apple-Specific Meta Tags for iOS Devices -->
    <meta name="apple-mobile-web-app-title" content="Proffid" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <link rel="apple-touch-icon" href="https://proffid.com/assets/images/apple-icon.png" /> <!-- Update with actual icon URL -->

    <!-- Additional Meta Tags for Web Applications -->
    <meta name="application-name" content="Proffid" />
    <meta name="msapplication-TileColor" content="#126bc6" />
    <meta name="msapplication-TileImage" content="https://proffid.com/assets/images/ms-icon.png" /> <!-- Update with actual icon URL -->
    <meta name="msapplication-config" content="https://proffid.com/browserconfig.xml" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PVXWVG8B');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <!-- Structured Data (JSON-LD) for SEO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Proffid",
            "url": "https://proffid.com",
            "description": "Proffid is a digital identity platform designed to streamline employee management, provide secure digital identities, and enable modern business cards and directories for organizations.",
            "publisher": {
                "@type": "Organization",
                "name": "Proffid",
                "logo": "https://proffid.com/assets/images/logo.png"
            },
            "sameAs": [
                "https://www.facebook.com/Proffid",
                "https://twitter.com/Proffid",
                "https://www.linkedin.com/company/proffid"
            ]
        }
    </script>


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

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVXWVG8B"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
                        @if(request()->url() !== url('/two-factor-authentication-code'))
                        <div class="d-flex align-items-center me-8">
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none ms-n2" id="kt_landing_menu_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </button>

                            <a href="/">
                                <img alt="Digital ID Logo" src="{{ asset('assets/media/logos/logo-color.png') }}" class="h-60px" />
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
                            <a href="{{ url('/login') }}" class="btn btn-primary fw-bolder btn-sm" style="background: #fff; border: 2px solid #c206fd; color: #c206fd;">Login</a>
                            <a href="{{ url('/register') }}" class="btn btn-primary fw-bolder btn-sm" style="background: #fff; border: 2px solid #c206fd; color: #c206fd;">Sign Up</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            @yield('content')
            <div class="mb-0">
                <div class="landing-dark-bg pt-lg-20 pt-5">
                    @if(request()->url() !== url('/two-factor-authentication-code'))
                    <div class="container">
                        <div class="row py-10 py-lg-20">
                            <div class="col-lg-6 mb-10 mb-lg-0">
                                <div class="rounded landing-border p-9 mb-6">
                                    <h2 class="text-gray-900 fw-semibold mb-3">Would you need a Digital Identity Solution?</h2>
                                    <span class="fw-normal fs-4 text-gray-600">
                                        Email us to
                                        <a href="https://proffid.com/support" class="fw-semibold fs-4 text-gray-800 text-hover-primary">support@proffid.com</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex fw-semibold flex-column me-20">
                                        <h4 class="fw-bold text-gray-900 mb-6">More for Proffid</h4>
                                        <a href="{{ url('/about') }}" target="_blank" class="text-gray-700 text-hover-primary fs-5 mb-6 position-relative">
                                            About
                                        </a>
                                        <a href="{{ url('/support') }}" target="_blank" class="text-gray-700 text-hover-primary fs-5 mb-6 position-relative">
                                            Support
                                        </a>
                                        <a href="{{ url('/terms-and-conditions') }}" target="_blank" class="text-gray-700 text-hover-primary fs-5 mb-6 position-relative">
                                            Terms and Conditions
                                        </a>
                                        <a href="{{ url('/privacy-policy') }}" target="_blank" class="text-gray-700 text-hover-primary fs-5 mb-6 position-relative">
                                            Privacy Policy
                                        </a>
                                        <a href="{{ url('/refund-policy') }}" target="_blank" class="text-gray-700 text-hover-primary fs-5 position-relative">
                                            Refund Policy
                                        </a>
                                    </div>



                                    <div class="d-flex fw-semibold flex-column ms-lg-20">
                                        <h4 class="fw-bold text-gray-900 mb-6">Stay Connected</h4>
                                        <a href="https://www.facebook.com/proffid.com" class="mb-6">
                                            <img src="/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Facebook</span>
                                        </a>
                                        <a href="https://github.com/proffid.com" class="mb-6">
                                            <img src="/assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Github</span>
                                        </a>
                                        <a href="https://twitter.com/proffid.com" class="mb-6">
                                            <img src="/assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Twitter</span>
                                        </a>
                                        <a href="https://dribbble.com/proffid.com" class="mb-6">
                                            <img src="/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Dribbble</span>
                                        </a>
                                        <a href="https://www.instagram.com/proffid.com" class="mb-6">
                                            <img src="/assets/media/svg/brand-logos/instagram-2016.svg" class="h-20px me-2" alt="" />
                                            <span class="text-gray-700 text-hover-primary fs-5 mb-6">Instagram</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="separator separator-solid"></div>
                    <div class="container">
                        <div class="d-flex flex-column flex-md-row flex-stack py-8">
                            <div class="d-flex align-items-center order-2 order-md-1">
                                <a href="/">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-color.png') }}" class="h-30px h-md-40px" />
                                </a>
                                <span class="mx-5 fs-6 fw-semibold text-gray-700 pt-1">
                                    © {{ date('Y') }} Proffid. All rights reserved.
                                </span>
                            </div>
                            <div class="d-flex align-items-center gap-3 order-1 order-md-2">
                                <a href="{{ url('downloadable/proffid-app.apk') }}"
                                    class="btn btn-outline fw-bold px-4"
                                    style="border: 2px solid #c206fd; color: #c206fd;">
                                    <i class="bi bi-google-play me-2"></i>
                                    Download App
                                </a>
                                <button onclick="window.open('https://play.google.com/store/apps/details?id=com.proffid.app','','width=200,height=100')"
                                    class="btn btn-outline fw-bold px-4"
                                    style="border: 2px solid #c206fd; color: #c206fd;">
                                    <i class="bi bi-person-badge me-2"></i>
                                    View Profile
                                </button>
                            </div>
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