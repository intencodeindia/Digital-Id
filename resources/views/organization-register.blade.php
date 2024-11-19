<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital ID - Organization Register</title>
    <meta charset="utf-8" />
    <meta name="description" content="Digital ID - Organization Register" />
    <meta name="keywords" content="Digital ID, Organization Register" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Digital ID - Organization Register" />
    <meta property="og:url" content="https://themes.getbootstrap.com/product/good-bootstrap-5-admin-dashboard-template" />
    <meta property="og:site_name" content="Digital ID" />
    <link rel="canonical" href="multi-steps.html" />
    <link rel="shortcut icon" href="../../assets/media/logos/favicon.ico" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="../../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

</head>

<body id="kt_body" class="app-blank">
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
        <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column" id="kt_create_account_stepper">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-400px positon-xl-relative bg-light">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-400px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column align-items-center align-items-lg-start p-10 p-lg-20">
                        <a href="{{ url('/') }}" class="mb-10 mb-lg-20">
                            <img alt="Logo" src="{{ asset('assets/media/logos/logo.jpg') }}" class="h-80px" />
                        </a>

                        <div class="stepper-nav">
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon rounded-3">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">
                                            Account Type
                                        </h3>

                                        <div class="stepper-desc fw-normal">
                                            Select your account type
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px">
                                </div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon rounded-3">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">
                                            Account Settings
                                        </h3>
                                        <div class="stepper-desc fw-normal">
                                            Setup your account settings
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px">
                                </div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">
                                            Business Details
                                        </h3>
                                        <div class="stepper-desc fw-normal">
                                            Setup your business details
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px">
                                </div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title ">
                                            Completed
                                        </h3>
                                        <div class="stepper-desc fw-normal">
                                            Your account is created
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-250px"
                        style="background-image: url(../../assets/media/illustrations/sketchy-1/16.png)">
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-700px p-10 p-lg-15 mx-auto">
                        <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">
                            <div class="current" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold d-flex align-items-center text-gray-900">
                                            Choose Account Type


                                            <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
                                        </h2>

                                        <div class="text-muted fw-semibold fs-6">
                                            If you need more info, please check out
                                            <a href="#" class="link-primary fw-bold">Help Page</a>.
                                        </div>
                                    </div>

                                    <div class="fv-row">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                    <i class="ki-duotone ki-badge fs-3x me-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-gray-900 fw-bold d-block fs-4 mb-2">
                                                            Personal Account
                                                        </span>
                                                        <span class="text-muted fw-semibold fs-6">If you need more info, please check it out</span>
                                                    </span>
                                                </label>
                                            </div>

                                            <div class="col-lg-6">
                                                <input type="radio" class="btn-check" name="account_type" value="corporate" id="kt_create_account_form_account_type_corporate" />
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                                                    <i class="ki-duotone ki-briefcase fs-3x me-5"><span class="path1"></span><span class="path2"></span></i>
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-gray-900 fw-bold d-block fs-4 mb-2">Corporate Account</span>
                                                        <span class="text-muted fw-semibold fs-6">Create corporate account to mane users</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold text-gray-900">Account Info</h2>

                                        <div class="text-muted fw-semibold fs-6">
                                            If you need more info, please check out
                                            <a href="#" class="link-primary fw-bold">Help Page</a>.
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="d-flex align-items-center form-label mb-3">
                                            Specify Team Size


                                            <span class="ms-1" data-bs-toggle="tooltip" title="Provide your team size to help us setup your billing">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span> </label>

                                        <div class="row mb-2" data-kt-buttons="true">
                                            <div class="col">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                    <input type="radio" class="btn-check" name="account_team_size" value="1-1" />
                                                    <span class="fw-bold fs-3">1-1</span>
                                                </label>
                                            </div>

                                            <div class="col">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                                    <input type="radio" class="btn-check" name="account_team_size" checked value="2-10" />
                                                    <span class="fw-bold fs-3">2-10</span>
                                                </label>
                                            </div>

                                            <div class="col">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                    <input type="radio" class="btn-check" name="account_team_size" value="10-50" />
                                                    <span class="fw-bold fs-3">10-50</span>
                                                </label>
                                            </div>

                                            <div class="col">
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                    <input type="radio" class="btn-check" name="account_team_size" value="50+" />
                                                    <span class="fw-bold fs-3">50+</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-text">
                                            Customers will see this shortened version of your statement descriptor
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label mb-3">Team Account Name</label>

                                        <input type="text" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="" value="" />
                                    </div>

                                    <div class="mb-0 fv-row">
                                        <label class="d-flex align-items-center form-label mb-5">
                                            Select Account Plan


                                            <span class="ms-1" data-bs-toggle="tooltip" title="Monthly billing will be based on your account plan">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span> </label>

                                        <div class="mb-0">
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <span class="d-flex align-items-center me-2">
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label">
                                                            <i class="ki-duotone ki-bank fs-1 text-gray-600"><span class="path1"></span><span class="path2"></span></i> </span>
                                                    </span>

                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bold text-gray-800 text-hover-primary fs-5">Company Account</span>
                                                        <span class="fs-6 fw-semibold text-muted">Use images to enhance your post flow</span>
                                                    </span>
                                                </span>

                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="account_plan" value="1" />
                                                </span>
                                            </label>

                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <span class="d-flex align-items-center me-2">
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label">
                                                            <i class="ki-duotone ki-chart fs-1 text-gray-600"><span class="path1"></span><span class="path2"></span></i> </span>
                                                    </span>

                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bold text-gray-800 text-hover-primary fs-5">Developer Account</span>
                                                        <span class="fs-6 fw-semibold text-muted">Use images to your post time</span>
                                                    </span>
                                                </span>

                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" checked name="account_plan" value="2" />
                                                </span>
                                            </label>

                                            <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                <span class="d-flex align-items-center me-2">
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label">
                                                            <i class="ki-duotone ki-chart-pie-4 fs-1 text-gray-600"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                    </span>

                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bold text-gray-800 text-hover-primary fs-5">Testing Account</span>
                                                        <span class="fs-6 fw-semibold text-muted">Use images to enhance time travel rivers</span>
                                                    </span>
                                                </span>

                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="account_plan" value="3" />
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-12">
                                        <h2 class="fw-bold text-gray-900">Business Details</h2>

                                        <div class="text-muted fw-semibold fs-6">
                                            If you need more info, please check out
                                            <a href="#" class="link-primary fw-bold">Help Page</a>.
                                        </div>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="form-label required">Business Name</label>

                                        <input name="business_name" class="form-control form-control-lg form-control-solid" value="Keenthemes Inc." />
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="d-flex align-items-center form-label">
                                            <span class="required">Shortened Descriptor</span>


                                            <span class="lh-1 ms-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="
		&lt;div class=&#039;p-4 rounded bg-light&#039;&gt;
			&lt;div class=&#039;d-flex flex-stack text-muted mb-4&#039;&gt;
				&lt;i class=&quot;ki-duotone ki-bank fs-3 me-3&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;/i&gt;
				&lt;div class=&#039;fw-bold&#039;&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt;
			&lt;/div&gt;

			&lt;div class=&#039;d-flex flex-stack fw-semibold text-gray-600&#039;&gt;
				&lt;div&gt;Amount&lt;/div&gt;
				&lt;div&gt;Transaction&lt;/div&gt;
			&lt;/div&gt;

			&lt;div class=&#039;separator separator-dashed my-2&#039;&gt;&lt;/div&gt;

			&lt;div class=&#039;d-flex flex-stack text-gray-900 fw-bold mb-2&#039;&gt;
				&lt;div&gt;USD345.00&lt;/div&gt;
				&lt;div&gt;KEENTHEMES*&lt;/div&gt;
			&lt;/div&gt;

			&lt;div class=&#039;d-flex flex-stack text-muted mb-2&#039;&gt;
				&lt;div&gt;USD75.00&lt;/div&gt;
				&lt;div&gt;Hosting fee&lt;/div&gt;
			&lt;/div&gt;

			&lt;div class=&#039;d-flex flex-stack text-muted&#039;&gt;
				&lt;div&gt;USD3,950.00&lt;/div&gt;
				&lt;div&gt;Payrol&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span> </label>

                                        <input name="business_descriptor" class="form-control form-control-lg form-control-solid" value="KEENTHEMES" />

                                        <div class="form-text">
                                            Customers will see this shortened version of your statement descriptor
                                        </div>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="form-label required">Corporation Type</label>

                                        <select name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                            <option></option>
                                            <option value="1">S Corporation</option>
                                            <option value="1">C Corporation</option>
                                            <option value="2">Sole Proprietorship</option>
                                            <option value="3">Non-profit</option>
                                            <option value="4">Limited Liability</option>
                                            <option value="5">General Partnership</option>
                                        </select>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="form-label">Business Description</label>

                                        <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                    </div>

                                    <div class="fv-row mb-0">
                                        <label class="fs-6 fw-semibold form-label required">Contact Email</label>

                                        <input name="business_email" class="form-control form-control-lg form-control-solid" value="corp@support.com" />
                                    </div>
                                </div>

                            </div>

                            <div class="" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold text-gray-900">Billing Details</h2>

                                        <div class="text-muted fw-semibold fs-6">
                                            If you need more info, please check out
                                            <a href="#" class="text-primary fw-bold">Help Page</a>.
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Name On Card</span>


                                            <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span> </label>

                                        <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                                    </div>

                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>

                                        <div class="position-relative">
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />

                                            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                <img src="../../assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                                <img src="../../assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                                <img src="../../assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-10">
                                        <div class="col-md-8 fv-row">
                                            <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>

                                            <div class="row fv-row">
                                                <div class="col-6">
                                                    <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                                        <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                                        <option></option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                        <option value="2034">2034</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">CVV</span>


                                                <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span> </label>

                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />

                                                <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                    <i class="ki-duotone ki-credit-cart fs-2hx"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-stack">
                                        <div class="me-5">
                                            <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                            <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                        </div>

                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                            <span class="form-check-label fw-semibold text-muted">
                                                Save Card
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="" data-kt-stepper-element="content">

                                <div class="w-100">
                                    <div class="pb-8 pb-lg-10">
                                        <h2 class="fw-bold text-gray-900">Your Are Done!</h2>

                                        <div class="text-muted fw-semibold fs-6">
                                            If you need more info, please
                                            <a href="#" class="link-primary fw-bold">
                                                Sign In
                                            </a>
                                            .
                                        </div>
                                    </div>

                                    <div class="mb-0">
                                        <div class="fs-6 text-gray-600 mb-5">
                                            Writing headlines for blog posts is as much an art as it is a science
                                            and probably warrants its own post, but for all advise is with what
                                            works for your great & amazing audience.
                                        </div>

                                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  p-6">
                                            <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> <!--end::Icon-->

                                            <div class="d-flex flex-stack flex-grow-1 ">
                                                <div class=" fw-semibold">
                                                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>

                                                    <div class="fs-6 text-gray-700 ">To start using great tools, please, <a href="../../utilities/wizards/vertical.html" class="fw-bold">Create Team Platform</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex flex-stack pt-15">
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <i class="ki-duotone ki-arrow-left fs-4 me-1"><span class="path1"></span><span class="path2"></span></i> Previous
                                    </button>
                                </div>

                                <div>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                        <span class="indicator-label">
                                            Submit
                                            <i class="ki-duotone ki-arrow-right fs-4 ms-2"><span class="path1"></span><span class="path2"></span></i> </span>
                                        <span class="indicator-progress">
                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>

                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">
                                        Continue
                                        <i class="ki-duotone ki-arrow-right fs-4 ms-1"><span class="path1"></span><span class="path2"></span></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <div class="d-flex flex-center fw-semibold fs-6">
                        <a href="https://digitalid.com/" class="text-muted text-hover-primary px-2" target="_blank">About</a>

                        <a href="https://digitalid.com/" class="text-muted text-hover-primary px-2" target="_blank">Support</a>

                    </div>
                </div>
            </div>
        </div>




    </div>

    <script>
        var hostUrl = "{{ url('/') }}";
    </script>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>


    <script src="{{ asset('assets/js/custom/utilities/modals/create-account.js') }}"></script>
</body>

</html>