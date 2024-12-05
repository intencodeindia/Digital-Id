<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('title') – Proffid</title>
    <meta charset="utf-8" />
    <meta name="description" content="Proffid" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title') – Proffid" />
    <meta property="og:url" content="https://proffid.com/home" />
    <meta property="og:site_name" content="Proffid" />
    <link rel="canonical" href="index.html" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://naman-mahi.github.io/CodeShareHub/bd14b0bdaa-own.js"></script>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    @stack('styles')
</head>

<body id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
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

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">

        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">

            <div id="kt_app_header" class="app-header ">

                <div class="app-header-primary ">

                    <div class="app-container  container-xxl d-flex align-items-stretch justify-content-between " id="kt_app_header_primary_container">

                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">

                            <div class="btn btn-icon btn-active-color-primary d-lg-none w-35px h-35px me-2 ms-n2" id="kt_app_header_secondary_toggle" title="Show sidebar menu">
                                <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>

                            <a href="/home">
                                <img alt="Proffid Logo" src="{{ asset('assets/media/logos/logo-color.png') }}" class="h-60px" />
                            </a>
                        </div>

                        <div class="app-navbar align-items-center flex-shrink-0">
                            <div class="app-navbar-item ms-2 ms-lg-4">
                                <a href="#" class="btn btn-icon btn-light fw-bold" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                    <span class="fs-5"> <i class="ki-duotone ki-abstract-12 fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i></span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
                                    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('/good/assets/media/misc/menu-header-bg.jpg')">
                                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                                            Business Card <span class="fs-8 opacity-75 ps-3"></span>
                                        </h3>
                                        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">
                                            <li class="nav-item">
                                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_1">Business card</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_2">Logs</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                                            <div class="scroll-y mh-325px my-5 px-8">
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-primary">
                                                                <i class="ki-duotone ki-abstract-28 fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Alice</a>
                                                            <div class="text-gray-500 fs-7">Phase 1 development</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">1 hr</span>
                                                </div>
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-danger">
                                                                <i class="ki-duotone ki-information fs-2 text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">HR Confidential</a>
                                                            <div class="text-gray-500 fs-7">Confidential staff documents</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">2 hrs</span>
                                                </div>
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-warning">
                                                                <i class="ki-duotone ki-briefcase fs-2 text-warning"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Company HR</a>
                                                            <div class="text-gray-500 fs-7">Corporeate staff profiles</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">5 hrs</span>
                                                </div>
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-success">
                                                                <i class="ki-duotone ki-abstract-12 fs-2 text-success"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Redux</a>
                                                            <div class="text-gray-500 fs-7">New frontend admin theme</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">2 days</span>
                                                </div>
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-primary">
                                                                <i class="ki-duotone ki-colors-square fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Breafing</a>
                                                            <div class="text-gray-500 fs-7">Product launch status update</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">21 Jan</span>
                                                </div>
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-info">
                                                                <i class="ki-duotone ki-picture fs-2 text-info"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Banner Assets</a>
                                                            <div class="text-gray-500 fs-7">Collection of banner images</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">21 Jan</span>
                                                </div>
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-warning">
                                                                <i class="ki-duotone ki-color-swatch fs-2 text-warning"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span><span class="path19"></span><span class="path20"></span><span class="path21"></span></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Icon Assets</a>
                                                            <div class="text-gray-500 fs-7">Collection of SVG icons</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">20 March</span>
                                                </div>
                                            </div>
                                            <div class="py-3 text-center border-top">
                                                <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">
                                                    Download Card
                                                    <i class="ki-duotone ki-cloud-download fs-5"><span class="path1"></span><span class="path2"></span></i> </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="kt_topbar_notifications_2" role="tabpanel">
                                            <div class="d-flex flex-column px-9">
                                                <div class="pt-10 pb-0">
                                                    <h3 class="text-gray-900 text-center fw-bold">
                                                        Get Pro Access
                                                    </h3>
                                                    <div class="text-center text-gray-600 fw-semibold pt-1">
                                                        Outlines keep you honest. They stoping you from amazing poorly about drive
                                                    </div>
                                                    <div class="text-center mt-5 mb-9">
                                                        <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade</a>
                                                    </div>
                                                </div>
                                                <div class="text-center px-4">
                                                    <img class="mw-100 mh-200px" alt="image" src="/good/assets/media/illustrations/sketchy-1/1.png" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-navbar-item ms-2 ms-lg-4">

                                <div class="btn btn-custom btn-icon symbol" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img src="{{ Auth::user()->profile_photo ? asset('uploads/avatars/' . Auth::user()->profile_photo) : asset('assets/media/avatars/300-1.webp') }}" class="mh-100 mw-100" alt="user" />
                                </div>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{ Auth::user()->profile_photo ? asset('uploads/avatars/' . Auth::user()->profile_photo) : asset('assets/media/avatars/300-1.webp') }}" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{ Auth::user()->name }} <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth::user()->role }}</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{ Auth::user()->email }} </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-5">
                                        <a href="/profile" class="menu-link px-5">
                                            My Profile
                                        </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="/documents" class="menu-link px-5">
                                            <span class="menu-text">My Documents</span>
                                            <span class="menu-badge">
                                                <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="/subscription" class="menu-link px-5">
                                            My Subscription
                                        </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="/organizations" class="menu-link px-5">
                                            My Organizations
                                        </a>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-5 my-1">
                                        <a href="/settings" class="menu-link px-5">
                                            Account Settings
                                        </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="{{ route('logout') }}" class="menu-link px-5">
                                            Sign Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-header-secondary"
                    data-kt-sticky="true" data-kt-sticky-name="app-header-secondary-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
                    <div class="app-container container-xxl app-container-fit-mobile d-flex align-items-stretch" id="kt_app_header_secondary_container">
                        <div class="header-menu d-flex align-items-stretch w-lg-100 px-2 px-lg-0"
                            data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu"
                            data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true"
                            data-kt-drawer-width="250px"
                            data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_app_header_secondary_toggle"
                            data-kt-swapper="true"
                            data-kt-swapper-mode="append"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_secondary_container'}">
                            <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-300 fw-semibold my-5 my-lg-0 align-items-stretch"
                                id="#kt_header_menu"
                                data-kt-menu="true">
                                <div class="menu-item"><a class="menu-link" href="/home" title="View analytics and key metrics for your account" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-chart-line-star fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span>
                                        <span class="menu-title">Dashboard</span></a></div>
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-user-tick fs-2">
                                                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Digital ID</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-300px">
                                        <div class="menu-state-bg py-3 px-3 py-lg-6 px-lg-6" data-kt-menu-dismiss="true">
                                            <div class="row pt-1">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="menu-item p-0 m-0">
                                                        <a href="/digital-id" class="menu-link">
                                                            <span class="d-flex flex-center flex-shrink-0 bg-gray-200 rounded w-40px h-40px me-3">
                                                                <i class="ki-duotone ki-user-tick text-primary fs-1">
                                                                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
                                                                </i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Digital ID</span>
                                                                <span class="fs-7 fw-semibold text-muted">View and manage your digital ID</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="menu-item p-0 m-0">
                                                        <a href="/business-id-card" class="menu-link">
                                                            <span class="d-flex flex-center flex-shrink-0 bg-gray-200 rounded w-40px h-40px me-3">
                                                                <i class="ki-duotone ki-abstract-26 text-primary fs-1">
                                                                    <span class="path1"></span><span class="path2"></span>
                                                                </i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Business Card</span>
                                                                <span class="fs-7 fw-semibold text-muted">View your business card</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(Auth::check())
                                @if(Auth::user()->hasRole('admin'))
                                <div class="menu-item"><a class="menu-link" href="/admin/dashboard" title="Admin Dashboard" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-settings fs-2"></i></span>
                                        <span class="menu-title">Admin Dashboard</span></a></div>
                                @elseif(Auth::user()->hasRole('user'))
                                <div class="menu-item"><a class="menu-link" href="/user/dashboard" title="User Dashboard" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-user fs-2"></i></span>
                                        <span class="menu-title">User Dashboard</span></a></div>

                                <div class="menu-item"><a class="menu-link" href="/family" title="Manage your family members and relationships" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-people fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span>
                                        <span class="menu-title">Family</span></a></div>

                                <div class="menu-item"><a class="menu-link" href="/documents" title="Access and manage your important documents" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-document fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span>
                                        <span class="menu-title">Documents</span></a></div>

                                <div class="menu-item"><a class="menu-link" href="/services" title="Browse and access available services" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-briefcase fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span>
                                        <span class="menu-title">Services</span></a></div>

                                <div class="menu-item"><a class="menu-link" href="/portfolio" title="View and manage your portfolio items" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-note fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span>
                                        <span class="menu-title">Portfolio</span></a></div>

                                <div class="menu-item"><a class="menu-link" href="/appointments" title="View and manage your appointments" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span>
                                        <span class="menu-title">Appointments</span></a></div>
                                @elseif(Auth::user()->hasRole('organization'))
                                <div class="menu-item"><a class="menu-link" href="/employees" title="Organization Employees" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-profile-user fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Employees</span></a></div>
                                <div class="menu-item"><a class="menu-link" href="/departments" title="Organization Departments" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-nexo fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Departments</span></a></div>
                                <div class="menu-item"><a class="menu-link" href="/designations" title="Organization Designations" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-briefcase fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Designations</span></a></div>
                                <div class="menu-item"><a class="menu-link" href="/leads" title="Organization Leads" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-user-tick fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Leads</span></a></div>
                                <div class="menu-item"><a class="menu-link" href="/entry-logs" title="Organization Entry Logs" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Entry Logs</span></a></div>
                                @elseif(Auth::user()->hasRole('employee'))


                                <div class="menu-item"><a class="menu-link" href="/employee/leads" title="Organization Leads" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-user-tick fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Leads</span></a></div>
                                <div class="menu-item"><a class="menu-link" href="/employee/entry-logs" title="Organization Entry Logs" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon"><i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                        <span class="menu-title">Entry Logs</span></a></div>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
                <div id="kt_app_footer" class="app-footer ">
                    <div class="app-container  container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2024&copy;</span>
                            <a href="https://proffid.com" target="_blank" class="text-gray-800 text-hover-primary fw-semibold">Digital Id</a>
                        </div>
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item"><a href="https://proffid.com" target="_blank" class="menu-link px-2">About</a></li>
                            <li class="menu-item"><a href="https://devs.proffid.com" target="_blank" class="menu-link px-2">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var hostUrl = "assets/index.html";
        </script>
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('/good/assets/js/custom/account/settings/signin-methods.js') }}"></script>
        <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
        <script src="{{ asset('/good/assets/js/custom/account/settings/deactivate-account.js') }}"></script>
        <script src="{{ asset('/good/assets/js/custom/pages/user-profile/general.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/type.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/team.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/files.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-project/main.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

</body>
@stack('scripts')

</html>