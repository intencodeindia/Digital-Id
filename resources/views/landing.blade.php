@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-lg-20" id="kt_body">
                <div class="container-xxl position-relative z-index-2">
                    <div class="row gy-5 align-items-center gx-0">
                        <div class="col-sm-6">
                            <div class="pe-5">
                                <h1 class="text-gray-900 fw-bold fs-2tx mb-14 ms-n1" id="home" style="text-shadow: 1.5px 0px 1px #767272;">
                                    Digital Identity
                                    For <span style="color:#ac1af0">Proffesional</span>, <br /> <span style="color:#1330f8">Business</span>
                                    And Your <br><span style="color:#04a2f1">Employees</span>
                                </h1>
                                <div class="d-flex flex-shrink-0 me-5">
                                    <a href="{{ url('/register') }}" class="btn btn-primary flex-shrink-0 fw-bold me-2 me-md-4 my-1" style="background-color: #04a2f1; color: #fff;">Create Organization</a>
                                    <a href="#how-it-works" class="btn btn-white btn-color-gray-700 flex-shrink-0 my-1 fw-bold btn-active-light-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pe-0">
                            <img src="{{ asset('assets/media/product/5.png') }}" class="float-end w-100" alt="Digital ID Platform" />
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 overflow-hidden w-150px h-450px h-lg-auto w-lg-auto">
                    <img src="{{ asset('assets/media/svg/layout/1.svg') }}" alt="Background Pattern" />
                </div>
            </div>
            <div class="mb-9 pt-15 z-index-2">
                <div class="container">
                    <h3 class="fs-lg-2tx fs-2x text-gray-900 text-center mb-16 lh-base" id="how-it-works">
                        Simple 3-Step Process To<br />
                        Digitize Your Organization's Identity
                    </h3>
                    <div class="row gy-10 mb-md-20">
                        <div class="col-sm-4">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="{{ asset('assets/media/svg/illustrations/easy-2/1.svg') }}" class="mb-11 h-125px" alt="Create Organization" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle fw-bold p-5 me-3 fs-3" style="background-color: #d3ddf9;color: #ca10f9;">1</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Create Organization</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-gray-700">
                                    Register your organization<br />
                                    and set up your digital<br />
                                    identity platform
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="{{ asset('assets/media/svg/illustrations/easy-2/2.svg') }}" class="mb-11 h-125px" alt="Add Employees" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle fw-bold p-5 me-3 fs-3" style="background-color: #d3ddf9;color: #ca10f9;">2</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Add Employees</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-gray-700">
                                    Import or add employees<br />
                                    and their details to<br />
                                    the platform
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="{{ asset('assets/media/svg/illustrations/easy-2/3.svg') }}" class="mb-11 h-125px" alt="Access Digital IDs" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle fw-bold p-5 me-3 fs-3" style="background-color: #d3ddf9;color: #ca10f9;">3</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Access Digital IDs</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-gray-700">
                                    Instantly access digital<br />
                                    business cards and employee<br />
                                    information
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-0">
                <div class="container-xxl">
                    <h3 class="fs-lg-2tx fs-2x text-gray-900 text-center mb-7 mb-lg-16 lh-base position-relative z-index-2" id="features">
                        Modern Digital Identity Platform<br />
                        For Modern Organizations
                    </h3>
                    <div class="row mb-10 mb-lg-20 pb-lg-17">
                        <div class="col-md-6">
                            <div class="position-relative z-index-2 d-none d-md-block">
                                <img src="{{ asset('assets/media/product/1.svg') }}" style="margin-left: 117px" class="position-absolute z-index-2" alt="Feature 1" />
                                <img src="{{ asset('assets/media/product/2.svg') }}" class="position-absolute pt-20" alt="Feature 2" />
                            </div>
                            <img src="{{ asset('assets/media/svg/layout/3.svg') }}" class="position-absolute start-0 translate-middle-y overflow-hidden w-300px h-lg-auto w-lg-550px z-index-1" style="margin-top: 250px" alt="Background Pattern" />
                        </div>
                        <div class="col-md-6">
                            <div class="pt-6">
                                <div class="d-flex align-items-top position-relative z-index-2 mb-7 mb-lg-16">
                                    <div class="symbol symbol-50px me-5 me-lg-9 pt-1">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-timer fs-2x text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="text-gray-900 fs-3 fw-bold mb-3">Digital Business Cards</div>
                                        <span class="text-gray-700 fw-semibold fs-4">Modern digital business cards for your employees with instant access and sharing capabilities</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-top position-relative z-index-2 mb-7 mb-lg-16">
                                    <div class="symbol symbol-50px me-5 me-lg-9 pt-1">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-abstract-25 fs-2x text-danger"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="text-gray-900 fs-3 fw-bold mb-3">Employee Directory</div>
                                        <span class="text-gray-700 fw-semibold fs-4">Centralized employee directory with detailed profiles and contact information</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-top position-relative z-index-2">
                                    <div class="symbol symbol-50px me-5 me-lg-9 pt-1">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-abstract-35 fs-2x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="text-gray-900 fs-3 fw-bold mb-3">Organization Management</div>
                                        <span class="text-gray-700 fw-semibold fs-4">Powerful tools to manage your organization's digital identity and employee information</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 overflow-hidden mb-lg-15 z-index-2" style="background-color: #126bc6;">
                        <div class="card-body text-center my-9">
                            <div class="fs-lg-3tx fs-2x fw-bold text-white pt-lg-20 mt-lg-4 mb-lg-20 mb-10 pb-2 position-relative z-index-2">
                                <span class="d-block mb-8">Transform Your Organization's Identity</span>
                                <span class="d-block lh-0">Get Started Today</span>
                            </div>
                            <div class="mb-lg-20 position-relative z-index-2">
                                <a href="{{ url('/organization/register') }}" class="btn btn-lg h-55px pt-5" style="background-color:#d493f3; color: #fff;">Create Organization Now</a>
                            </div>
                            <img src="{{ asset('assets/media/product/3.svg') }}" class="position-absolute bottom-0 end-0" alt="CTA Background" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 mt-lg-n20 z-index-2">
                <div class="pt-lg-20 mb-15">
                    <div class="container px-0">
                        <div class="d-flex flex-column container pt-lg-20">
                            <h1 class="fs-lg-2tx fs-2x fw-bold text-gray-900 mb-7 mb-lg-13 text-center" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">
                                One Stop Pricing For Your Business <br />
                                Because
                                <span class="d-inline-block position-relative ms-2">
                                    <span class="d-inline-block mb-2" style="color: #7a0176;">It's Strong Quality</span>
                                    <span class="d-inline-block position-absolute h-4px bottom-0 end-0 start-0 translate rounded" style="background-color: #2c9df5 !important;"></span>
                                </span>
                            </h1>
                            <div class="text-center" id="kt_pricing">
    <div class="rounded-1 d-inline-flex p-1 mb-10" data-kt-buttons="true" style="border: 1px dashed rgba(64, 61, 56, 0.2);">
        <a href="#" class="btn btn-color-dark btn-sm btn-active btn-active-primary rounded-1 fw-bold py-2 fs-6 px-5 me-2 active" data-kt-plan="month" id="monthlyBtn">
            Monthly
        </a>
        <a href="#" class="btn btn-color-dark btn-sm btn-active btn-active-primary rounded-1 fw-bold fs-5 py-2 px-5" data-kt-plan="annual" id="annualBtn">
            Annual
        </a>
    </div>
    <div class="row g-5 g-lg-10 mx-20" id="pricingPlans"></div>
</div>

<script>
    // Pricing data with feature availability
    const pricingData = [
        {
            name: "Personal",
            monthlyPrice: 49,
            annualPrice: 499,
            features: [
                { name: "Business card", available: true },
                { name: "Digital card", available: true },
                { name: "Document management", available: true },
                { name: "Family management", available: false },
                { name: "Service management", available: true },
                { name: "Appointment", available: false },
                { name: "Portfolio", available: true },
                { name: "Public portfolio", available: true },
                { name: "Employees Management", available: false },
                { name: "Lead Management", available: true },
                { name: "Access Log", available: true }
            ],
        },
        {
            name: "Business",
            monthlyPrice: 99,
            annualPrice: 999,
            features: [
                { name: "Business card", available: true },
                { name: "Digital card", available: true },
                { name: "Document management", available: true },
                { name: "Family management", available: true },
                { name: "Service management", available: true },
                { name: "Appointment", available: true },
                { name: "Portfolio", available: true },
                { name: "Public portfolio", available: true },
                { name: "Employees Management", available: true },
                { name: "Lead Management", available: true },
                { name: "Access Log", available: true },
                { name: "Department Management", available: true },
                { name: "Access Permission Management", available: true },
                { name: "Designation Management", available: true }
            ],
        },
        {
            name: "Enterprise",
            monthlyPrice: 199,
            annualPrice: 1999,
            features: [
                { name: "Business card", available: true },
                { name: "Digital card", available: true },
                { name: "Document management", available: true },
                { name: "Family management", available: true },
                { name: "Service management", available: true },
                { name: "Appointment", available: true },
                { name: "Portfolio", available: true },
                { name: "Public portfolio", available: true },
                { name: "Employees Management", available: true },
                { name: "Lead Management", available: true },
                { name: "Access Log", available: true },
                { name: "Department Management", available: true },
                { name: "Access Permission Management", available: true },
                { name: "Designation Management", available: true }
            ],
        }
    ];

    // Function to generate the pricing plans
    function generatePlans(isAnnual) {
        const pricingPlansContainer = document.getElementById('pricingPlans');
        pricingPlansContainer.innerHTML = '';  // Clear the container

        pricingData.forEach(plan => {
            const planContainer = document.createElement('div');
            planContainer.classList.add('col-xl-4');

            // Check if the plan is 'Personal' or 'Enterprise' to use the same color
            const backgroundColor = (plan.name === 'Personal' || plan.name === 'Enterprise') ? '#e7f1f9' : '#9727ff';
            const textColor = (plan.name === 'Personal' || plan.name === 'Enterprise') ? 'gray' : 'white';

            const planHTML = `
                <div class="d-flex h-100 align-items-center">
                    <div class="w-100 d-flex flex-column flex-center rounded-3 py-15 px-10" style="background-color: ${backgroundColor};">
                        <div class="mb-7 text-center">
                            <h1 class="text-${textColor}-900 mb-5 fw-bolder">${plan.name}</h1>
                            <div class="text-${textColor}-500 fw-semibold mb-5">
                                Best Settings for ${plan.name} Use
                            </div>
                            <div class="text-center">
                                <span class="mb-2 text-${textColor}">₹</span>
                                <span class="fs-3x fw-bold text-${textColor}" id="planPrice${plan.name}">
                                    ${isAnnual ? plan.annualPrice : plan.monthlyPrice}
                                </span>
                                <span class="fs-7 fw-semibold opacity-50" id="planDuration${plan.name}">
                                    / ${isAnnual ? 'Ann' : 'Mon'}
                                </span>
                            </div>
                        </div>
                        <div class="w-100 mb-10">
                            ${plan.features.map(feature => `
                                <div class="d-flex flex-stack mb-5">
                                    <span class="fw-semibold fs-6 text-${textColor}-600 text-start pe-3">${feature.name}</span>
                                    <i class="ki-duotone ki-${feature.available ? 'check-circle' : 'cross-circle'} fs-2 text-${textColor}">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                </div>
                            `).join('')}
                        </div>
                        <a href="#" class="btn btn-primary btn-sm fw-bold rounded-1">Select</a>
                    </div>
                </div>
            `;
            planContainer.innerHTML = planHTML;
            pricingPlansContainer.appendChild(planContainer);
        });
    }

    // Toggle between monthly and annual pricing
    document.getElementById('monthlyBtn').addEventListener('click', (e) => {
        e.preventDefault();
        generatePlans(false);
        document.getElementById('monthlyBtn').classList.add('active');
        document.getElementById('annualBtn').classList.remove('active');
    });

    document.getElementById('annualBtn').addEventListener('click', (e) => {
        e.preventDefault();
        generatePlans(true);
        document.getElementById('annualBtn').classList.add('active');
        document.getElementById('monthlyBtn').classList.remove('active');
    });

    // Initialize with Monthly Pricing
    generatePlans(false);
</script>



                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-xl-row">
                <div class="card bg-body mb-9 mb-xl-0 me-lg-9">
                    <div class="card-body">
                        <div class="m-0">
                            <div class="mb-9">
                                <h4 class="fs-2qx text-gray-800 w-bolder mb-6">
                                    Digital ID FAQ
                                </h4>
                                <p class="fs-5 fw-semibold text-gray-500">
                                    Common questions about our Digital ID solution and how it can help secure your digital identity.
                                </p>
                            </div>
                            <div class="m-0">
                                <div class="mb-12">
                                    <h3 class="text-gray-800 fw-bold mb-2">
                                        Getting Started
                                    </h3>
                                    <div class="m-0">
                                        <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_1_1">
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                            <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">
                                                What is Digital ID and how does it work?
                                            </h4>
                                        </div>
                                        <div id="kt_job_1_1" class="collapse show fs-6 ms-1">
                                            <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                Digital ID is a secure digital identity solution that allows you to prove who you are online. It uses advanced encryption and biometric verification to create a unique digital identity that you can use across multiple services and platforms.
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    </div>
                                    <div class="m-0">
                                        <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_1_2">
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                            <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">
                                                How secure is my digital identity?
                                            </h4>
                                        </div>
                                        <div id="kt_job_1_2" class="collapse fs-6 ms-1">
                                            <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                Your digital identity is protected by multiple layers of security including encryption, biometric authentication, and blockchain technology. We follow the highest industry standards for data protection and regularly undergo security audits.
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    </div>
                                    <div class="m-0">
                                        <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_1_3">
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                            <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">
                                                Where can I use my Digital ID?
                                            </h4>
                                        </div>
                                        <div id="kt_job_1_3" class="collapse fs-6 ms-1">
                                            <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                Digital ID is accepted by a growing network of government services, financial institutions, and businesses. You can use it for online banking, government services, age verification, and more. Our partnerships are constantly expanding to provide wider coverage.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-12">
                                    <h3 class="text-gray-800 fw-bold mb-4">
                                        Privacy & Data Protection
                                    </h3>
                                    <div class="m-0">
                                        <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_2_1">
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                            <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">
                                                Who has access to my data?
                                            </h4>
                                        </div>
                                        <div id="kt_job_2_1" class="collapse show fs-6 ms-1">
                                            <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                You have complete control over your data. Only you can decide which information to share and with whom. We never sell your data to third parties and only share the specific information you authorize with verified service providers.
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    </div>
                                    <div class="m-0">
                                        <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_2_2">
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                            <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">
                                                How can I revoke access to my data?
                                            </h4>
                                        </div>
                                        <div id="kt_job_2_2" class="collapse fs-6 ms-1">
                                            <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                You can easily manage and revoke access permissions through your Digital ID dashboard at any time. Once revoked, organizations will no longer have access to your shared information.
                                            </div>
                                        </div>
                                    </div>
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