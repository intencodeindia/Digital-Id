@extends('layouts.admin')
@section('title', 'Settings')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <h2 class="mb-5">Settings</h2>
        </div>

        <div class="d-flex flex-column flex-lg-row">
    <!--begin::Aside-->
    <div class="flex-column flex-md-row-auto w-100 w-lg-250px w-xxl-275px">
        <!--begin::Nav-->
        <div class="card mb-6 mb-xl-9" data-kt-sticky="true" data-kt-sticky-name="account-settings" data-kt-sticky-offset="{default: false, lg: 300}" data-kt-sticky-width="{lg: '250px', xxl: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-zindex="95">
            <!--begin::Card body-->
            <div class="card-body py-10 px-6">
                <!--begin::Menu-->
                <ul id="kt_account_settings" class="nav nav-flush menu menu-column menu-rounded menu-title-gray-600 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-semibold fs-6 mb-2">
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_overview" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link active">
                            <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                            <span class="menu-title">Overview</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_signin_method" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                            <span class="menu-title">Sign-in Method</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_profile_details" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                            <span class="menu-title">Profile Details</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_connected_accounts" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                            <span class="menu-title">Connected Accounts</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0">
                        <a href="#kt_account_settings_notifications" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                            <span class="menu-title">Notifications</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0">
                        <a href="#kt_account_settings_deactivate" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                            <span class="menu-title">Deactivate Account</span>
                        </a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Aside-->

    <!--begin::Layout-->
    <div class="flex-md-row-fluid ms-lg-12">
        <!--begin::Overview-->
<div class="card  mb-5 mb-xl-10" id="kt_account_settings_overview" data-kt-scroll-offset="{default: 100, md: 125}">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_overview">
        <div class="card-title">
            <h3 class="fw-bold m-0">Overview</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_overview" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <div class="d-flex align-items-start flex-wrap">
                <div class="d-flex flex-wrap">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-125px mb-7 me-7 position-relative">
                        <img src="/good/assets/media/avatars/300-1.jpg" alt="image">
                    </div>
                    <!--end::Avatar-->

                    <!--begin::Profile-->
                    <div class="d-flex flex-column">
                        <div class="fs-2 fw-bold mb-1">Brad Dennis</div>
                        <a href="#" class="text-gray-500 text-hover-primary fs-6 fw-semibold mb-5">support@keenthemes.com</a>
                        <div class="badge badge-light-success text-success fw-bold fs-7 me-auto mb-3 px-4 py-3">Default</div>
                    </div>
                    <!--end::Profile-->
                </div>
                <a href="/good/pages/user-profile/projects.html" class="btn btn-primary ms-auto mb-7">Projects (3)</a>
            </div>

            <!--begin::Row-->
            <div class="row mb-7">
                <div class="col-lg-5 text-gray-600 fs-4 mb-6 mb-lg-0">
                    <div class="fw-semibold mb-1"><span class="fw-bold text-gray-800 me-1">$24.99</span> Per Month</div>
                    <div class="fw-semibold fs-6 mb-2">Autopay on Dec 23, 2020</div>
                    <a href="/good/account/billing.html" class="fw-semibold">View Billing</a>
                </div>

                <!--begin::Status-->
                <div class="col-lg-7">
                    <!--begin::Text-->
                    <div class="d-flex text-muted fw-bold fs-4 pb-3">
                        <span class="flex-grow-1 text-gray-800">Users</span>
                        <span class="text-gray-800">86 of 100 Used</span>
                    </div>
                    <!--end::Text-->

                    <!--begin::Progress-->
                    <div class="progress h-8px bg-light-primary mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end::Progress-->

                    <!--begin::Description-->
                    <div class="fw-semibold fs-6 text-muted">14 Users remaining until your plan requires update</div>
                    <!--end::Description-->
                </div>
                <!--end::Status-->
            </div>
            <!--end::Row-->

            
<!--begin::Notice-->
<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed rounded p-6">
            <!--begin::Icon-->
        <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>        <!--end::Icon-->
    
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1 ">
                    <!--begin::Content-->
            <div class=" fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                
                                    <div class="fs-6 text-gray-700 ">Your payment was declined. To start using tools, please <a href="/good/account/billing.html">Add Payment Method</a></div>
                            </div>
            <!--end::Content-->
        
            </div>
    <!--end::Wrapper-->  
</div>
<!--end::Notice-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>
<!--end::Overview-->
        <!--begin::Sign-in Method-->
<div class="card  mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Sign-in Method</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                    <div class="fw-semibold text-gray-600">support@keenthemes.com</div>
                </div>
                <!--end::Label-->

                <!--begin::Edit-->
                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="support@keenthemes.com">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button id="kt_signin_submit" type="button" class="btn btn-primary  me-2 px-6">Update Email</button>
                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Email Address-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->

            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Password</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>
                <!--end::Label-->

                <!--begin::Edit-->
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_password" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid " name="currentpassword" id="currentpassword">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid " name="newpassword" id="newpassword">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid " name="confirmpassword" id="confirmpassword">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                        </div>
                        
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>

                        <div class="d-flex">
                            <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->

            
<!--begin::Notice-->
<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
            <!--begin::Icon-->
        <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span class="path2"></span></i>        <!--end::Icon-->
    
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
            <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
                
                                    <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                            </div>
            <!--end::Content-->
        
                    <!--begin::Action-->
            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication"> 
                Enable            </a>
            <!--end::Action-->
            </div>
    <!--end::Wrapper-->  
</div>
<!--end::Notice-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>
<!--end::Sign-in Method-->

        <!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>   
                    <!--end::Label-->  
                    
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/good/assets/media/svg/avatars/blank.svg')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(/good/assets/media/avatars/300-1.jpg)"></div>
                            <!--end::Preview existing avatar-->

                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->

                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                            </span>
                            <!--end::Cancel-->

                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->

                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types:  png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="Max">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="Smith">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Contact Phone</span>

                        
<span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-bs-original-title="Phone number must be active" data-kt-initialized="1">
	<i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>                    </label>
                    <!--end::Label-->
                    
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="044 3276 454 935">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Site</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="keenthemes.com">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Country</span>

                        
<span class="ms-1" data-bs-toggle="tooltip" aria-label="Country of origination" data-bs-original-title="Country of origination" data-kt-initialized="1">
	<i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-semibold select2-hidden-accessible" data-select2-id="select2-data-10-9pp3" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-12-u166">Select a Country...</option>
                                                            <option data-kt-flag="flags/afghanistan.svg" value="AF">Afghanistan</option>
                                                            <option data-kt-flag="flags/aland-islands.svg" value="AX">Aland Islands</option>
                                                            <option data-kt-flag="flags/albania.svg" value="AL">Albania</option>
                                                            <option data-kt-flag="flags/algeria.svg" value="DZ">Algeria</option>
                                                            <option data-kt-flag="flags/american-samoa.svg" value="AS">American Samoa</option>
                                                            <option data-kt-flag="flags/andorra.svg" value="AD">Andorra</option>
                                                            <option data-kt-flag="flags/angola.svg" value="AO">Angola</option>
                                                            <option data-kt-flag="flags/anguilla.svg" value="AI">Anguilla</option>
                                                            <option data-kt-flag="flags/antigua-and-barbuda.svg" value="AG">Antigua and Barbuda</option>
                                                            <option data-kt-flag="flags/argentina.svg" value="AR">Argentina</option>
                                                            <option data-kt-flag="flags/armenia.svg" value="AM">Armenia</option>
                                                            <option data-kt-flag="flags/aruba.svg" value="AW">Aruba</option>
                                                            <option data-kt-flag="flags/australia.svg" value="AU">Australia</option>
                                                            <option data-kt-flag="flags/austria.svg" value="AT">Austria</option>
                                                            <option data-kt-flag="flags/azerbaijan.svg" value="AZ">Azerbaijan</option>
                                                            <option data-kt-flag="flags/bahamas.svg" value="BS">Bahamas</option>
                                                            <option data-kt-flag="flags/bahrain.svg" value="BH">Bahrain</option>
                                                            <option data-kt-flag="flags/bangladesh.svg" value="BD">Bangladesh</option>
                                                            <option data-kt-flag="flags/barbados.svg" value="BB">Barbados</option>
                                                            <option data-kt-flag="flags/belarus.svg" value="BY">Belarus</option>
                                                            <option data-kt-flag="flags/belgium.svg" value="BE">Belgium</option>
                                                            <option data-kt-flag="flags/belize.svg" value="BZ">Belize</option>
                                                            <option data-kt-flag="flags/benin.svg" value="BJ">Benin</option>
                                                            <option data-kt-flag="flags/bermuda.svg" value="BM">Bermuda</option>
                                                            <option data-kt-flag="flags/bhutan.svg" value="BT">Bhutan</option>
                                                            <option data-kt-flag="flags/bolivia.svg" value="BO">Bolivia, Plurinational State of</option>
                                                            <option data-kt-flag="flags/bonaire.svg" value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                            <option data-kt-flag="flags/bosnia-and-herzegovina.svg" value="BA">Bosnia and Herzegovina</option>
                                                            <option data-kt-flag="flags/botswana.svg" value="BW">Botswana</option>
                                                            <option data-kt-flag="flags/brazil.svg" value="BR">Brazil</option>
                                                            <option data-kt-flag="flags/british-indian-ocean-territory.svg" value="IO">British Indian Ocean Territory</option>
                                                            <option data-kt-flag="flags/brunei.svg" value="BN">Brunei Darussalam</option>
                                                            <option data-kt-flag="flags/bulgaria.svg" value="BG">Bulgaria</option>
                                                            <option data-kt-flag="flags/burkina-faso.svg" value="BF">Burkina Faso</option>
                                                            <option data-kt-flag="flags/burundi.svg" value="BI">Burundi</option>
                                                            <option data-kt-flag="flags/cambodia.svg" value="KH">Cambodia</option>
                                                            <option data-kt-flag="flags/cameroon.svg" value="CM">Cameroon</option>
                                                            <option data-kt-flag="flags/canada.svg" value="CA">Canada</option>
                                                            <option data-kt-flag="flags/cape-verde.svg" value="CV">Cape Verde</option>
                                                            <option data-kt-flag="flags/cayman-islands.svg" value="KY">Cayman Islands</option>
                                                            <option data-kt-flag="flags/central-african-republic.svg" value="CF">Central African Republic</option>
                                                            <option data-kt-flag="flags/chad.svg" value="TD">Chad</option>
                                                            <option data-kt-flag="flags/chile.svg" value="CL">Chile</option>
                                                            <option data-kt-flag="flags/china.svg" value="CN">China</option>
                                                            <option data-kt-flag="flags/christmas-island.svg" value="CX">Christmas Island</option>
                                                            <option data-kt-flag="flags/cocos-island.svg" value="CC">Cocos (Keeling) Islands</option>
                                                            <option data-kt-flag="flags/colombia.svg" value="CO">Colombia</option>
                                                            <option data-kt-flag="flags/comoros.svg" value="KM">Comoros</option>
                                                            <option data-kt-flag="flags/cook-islands.svg" value="CK">Cook Islands</option>
                                                            <option data-kt-flag="flags/costa-rica.svg" value="CR">Costa Rica</option>
                                                            <option data-kt-flag="flags/ivory-coast.svg" value="CI">Côte d'Ivoire</option>
                                                            <option data-kt-flag="flags/croatia.svg" value="HR">Croatia</option>
                                                            <option data-kt-flag="flags/cuba.svg" value="CU">Cuba</option>
                                                            <option data-kt-flag="flags/curacao.svg" value="CW">Curaçao</option>
                                                            <option data-kt-flag="flags/czech-republic.svg" value="CZ">Czech Republic</option>
                                                            <option data-kt-flag="flags/denmark.svg" value="DK">Denmark</option>
                                                            <option data-kt-flag="flags/djibouti.svg" value="DJ">Djibouti</option>
                                                            <option data-kt-flag="flags/dominica.svg" value="DM">Dominica</option>
                                                            <option data-kt-flag="flags/dominican-republic.svg" value="DO">Dominican Republic</option>
                                                            <option data-kt-flag="flags/ecuador.svg" value="EC">Ecuador</option>
                                                            <option data-kt-flag="flags/egypt.svg" value="EG">Egypt</option>
                                                            <option data-kt-flag="flags/el-salvador.svg" value="SV">El Salvador</option>
                                                            <option data-kt-flag="flags/equatorial-guinea.svg" value="GQ">Equatorial Guinea</option>
                                                            <option data-kt-flag="flags/eritrea.svg" value="ER">Eritrea</option>
                                                            <option data-kt-flag="flags/estonia.svg" value="EE">Estonia</option>
                                                            <option data-kt-flag="flags/ethiopia.svg" value="ET">Ethiopia</option>
                                                            <option data-kt-flag="flags/falkland-islands.svg" value="FK">Falkland Islands (Malvinas)</option>
                                                            <option data-kt-flag="flags/fiji.svg" value="FJ">Fiji</option>
                                                            <option data-kt-flag="flags/finland.svg" value="FI">Finland</option>
                                                            <option data-kt-flag="flags/france.svg" value="FR">France</option>
                                                            <option data-kt-flag="flags/french-polynesia.svg" value="PF">French Polynesia</option>
                                                            <option data-kt-flag="flags/gabon.svg" value="GA">Gabon</option>
                                                            <option data-kt-flag="flags/gambia.svg" value="GM">Gambia</option>
                                                            <option data-kt-flag="flags/georgia.svg" value="GE">Georgia</option>
                                                            <option data-kt-flag="flags/germany.svg" value="DE">Germany</option>
                                                            <option data-kt-flag="flags/ghana.svg" value="GH">Ghana</option>
                                                            <option data-kt-flag="flags/gibraltar.svg" value="GI">Gibraltar</option>
                                                            <option data-kt-flag="flags/greece.svg" value="GR">Greece</option>
                                                            <option data-kt-flag="flags/greenland.svg" value="GL">Greenland</option>
                                                            <option data-kt-flag="flags/grenada.svg" value="GD">Grenada</option>
                                                            <option data-kt-flag="flags/guam.svg" value="GU">Guam</option>
                                                            <option data-kt-flag="flags/guatemala.svg" value="GT">Guatemala</option>
                                                            <option data-kt-flag="flags/guernsey.svg" value="GG">Guernsey</option>
                                                            <option data-kt-flag="flags/guinea.svg" value="GN">Guinea</option>
                                                            <option data-kt-flag="flags/guinea-bissau.svg" value="GW">Guinea-Bissau</option>
                                                            <option data-kt-flag="flags/haiti.svg" value="HT">Haiti</option>
                                                            <option data-kt-flag="flags/vatican-city.svg" value="VA">Holy See (Vatican City State)</option>
                                                            <option data-kt-flag="flags/honduras.svg" value="HN">Honduras</option>
                                                            <option data-kt-flag="flags/hong-kong.svg" value="HK">Hong Kong</option>
                                                            <option data-kt-flag="flags/hungary.svg" value="HU">Hungary</option>
                                                            <option data-kt-flag="flags/iceland.svg" value="IS">Iceland</option>
                                                            <option data-kt-flag="flags/india.svg" value="IN">India</option>
                                                            <option data-kt-flag="flags/indonesia.svg" value="ID">Indonesia</option>
                                                            <option data-kt-flag="flags/iran.svg" value="IR">Iran, Islamic Republic of</option>
                                                            <option data-kt-flag="flags/iraq.svg" value="IQ">Iraq</option>
                                                            <option data-kt-flag="flags/ireland.svg" value="IE">Ireland</option>
                                                            <option data-kt-flag="flags/isle-of-man.svg" value="IM">Isle of Man</option>
                                                            <option data-kt-flag="flags/israel.svg" value="IL">Israel</option>
                                                            <option data-kt-flag="flags/italy.svg" value="IT">Italy</option>
                                                            <option data-kt-flag="flags/jamaica.svg" value="JM">Jamaica</option>
                                                            <option data-kt-flag="flags/japan.svg" value="JP">Japan</option>
                                                            <option data-kt-flag="flags/jersey.svg" value="JE">Jersey</option>
                                                            <option data-kt-flag="flags/jordan.svg" value="JO">Jordan</option>
                                                            <option data-kt-flag="flags/kazakhstan.svg" value="KZ">Kazakhstan</option>
                                                            <option data-kt-flag="flags/kenya.svg" value="KE">Kenya</option>
                                                            <option data-kt-flag="flags/kiribati.svg" value="KI">Kiribati</option>
                                                            <option data-kt-flag="flags/north-korea.svg" value="KP">Korea, Democratic People's Republic of</option>
                                                            <option data-kt-flag="flags/kuwait.svg" value="KW">Kuwait</option>
                                                            <option data-kt-flag="flags/kyrgyzstan.svg" value="KG">Kyrgyzstan</option>
                                                            <option data-kt-flag="flags/laos.svg" value="LA">Lao People's Democratic Republic</option>
                                                            <option data-kt-flag="flags/latvia.svg" value="LV">Latvia</option>
                                                            <option data-kt-flag="flags/lebanon.svg" value="LB">Lebanon</option>
                                                            <option data-kt-flag="flags/lesotho.svg" value="LS">Lesotho</option>
                                                            <option data-kt-flag="flags/liberia.svg" value="LR">Liberia</option>
                                                            <option data-kt-flag="flags/libya.svg" value="LY">Libya</option>
                                                            <option data-kt-flag="flags/liechtenstein.svg" value="LI">Liechtenstein</option>
                                                            <option data-kt-flag="flags/lithuania.svg" value="LT">Lithuania</option>
                                                            <option data-kt-flag="flags/luxembourg.svg" value="LU">Luxembourg</option>
                                                            <option data-kt-flag="flags/macao.svg" value="MO">Macao</option>
                                                            <option data-kt-flag="flags/madagascar.svg" value="MG">Madagascar</option>
                                                            <option data-kt-flag="flags/malawi.svg" value="MW">Malawi</option>
                                                            <option data-kt-flag="flags/malaysia.svg" value="MY">Malaysia</option>
                                                            <option data-kt-flag="flags/maldives.svg" value="MV">Maldives</option>
                                                            <option data-kt-flag="flags/mali.svg" value="ML">Mali</option>
                                                            <option data-kt-flag="flags/malta.svg" value="MT">Malta</option>
                                                            <option data-kt-flag="flags/marshall-island.svg" value="MH">Marshall Islands</option>
                                                            <option data-kt-flag="flags/martinique.svg" value="MQ">Martinique</option>
                                                            <option data-kt-flag="flags/mauritania.svg" value="MR">Mauritania</option>
                                                            <option data-kt-flag="flags/mauritius.svg" value="MU">Mauritius</option>
                                                            <option data-kt-flag="flags/mexico.svg" value="MX">Mexico</option>
                                                            <option data-kt-flag="flags/micronesia.svg" value="FM">Micronesia, Federated States of</option>
                                                            <option data-kt-flag="flags/moldova.svg" value="MD">Moldova, Republic of</option>
                                                            <option data-kt-flag="flags/monaco.svg" value="MC">Monaco</option>
                                                            <option data-kt-flag="flags/mongolia.svg" value="MN">Mongolia</option>
                                                            <option data-kt-flag="flags/montenegro.svg" value="ME">Montenegro</option>
                                                            <option data-kt-flag="flags/montserrat.svg" value="MS">Montserrat</option>
                                                            <option data-kt-flag="flags/morocco.svg" value="MA">Morocco</option>
                                                            <option data-kt-flag="flags/mozambique.svg" value="MZ">Mozambique</option>
                                                            <option data-kt-flag="flags/myanmar.svg" value="MM">Myanmar</option>
                                                            <option data-kt-flag="flags/namibia.svg" value="NA">Namibia</option>
                                                            <option data-kt-flag="flags/nauru.svg" value="NR">Nauru</option>
                                                            <option data-kt-flag="flags/nepal.svg" value="NP">Nepal</option>
                                                            <option data-kt-flag="flags/netherlands.svg" value="NL">Netherlands</option>
                                                            <option data-kt-flag="flags/new-zealand.svg" value="NZ">New Zealand</option>
                                                            <option data-kt-flag="flags/nicaragua.svg" value="NI">Nicaragua</option>
                                                            <option data-kt-flag="flags/niger.svg" value="NE">Niger</option>
                                                            <option data-kt-flag="flags/nigeria.svg" value="NG">Nigeria</option>
                                                            <option data-kt-flag="flags/niue.svg" value="NU">Niue</option>
                                                            <option data-kt-flag="flags/norfolk-island.svg" value="NF">Norfolk Island</option>
                                                            <option data-kt-flag="flags/northern-mariana-islands.svg" value="MP">Northern Mariana Islands</option>
                                                            <option data-kt-flag="flags/norway.svg" value="NO">Norway</option>
                                                            <option data-kt-flag="flags/oman.svg" value="OM">Oman</option>
                                                            <option data-kt-flag="flags/pakistan.svg" value="PK">Pakistan</option>
                                                            <option data-kt-flag="flags/palau.svg" value="PW">Palau</option>
                                                            <option data-kt-flag="flags/palestine.svg" value="PS">Palestinian Territory, Occupied</option>
                                                            <option data-kt-flag="flags/panama.svg" value="PA">Panama</option>
                                                            <option data-kt-flag="flags/papua-new-guinea.svg" value="PG">Papua New Guinea</option>
                                                            <option data-kt-flag="flags/paraguay.svg" value="PY">Paraguay</option>
                                                            <option data-kt-flag="flags/peru.svg" value="PE">Peru</option>
                                                            <option data-kt-flag="flags/philippines.svg" value="PH">Philippines</option>
                                                            <option data-kt-flag="flags/poland.svg" value="PL">Poland</option>
                                                            <option data-kt-flag="flags/portugal.svg" value="PT">Portugal</option>
                                                            <option data-kt-flag="flags/puerto-rico.svg" value="PR">Puerto Rico</option>
                                                            <option data-kt-flag="flags/qatar.svg" value="QA">Qatar</option>
                                                            <option data-kt-flag="flags/romania.svg" value="RO">Romania</option>
                                                            <option data-kt-flag="flags/russia.svg" value="RU">Russian Federation</option>
                                                            <option data-kt-flag="flags/rwanda.svg" value="RW">Rwanda</option>
                                                            <option data-kt-flag="flags/st-barts.svg" value="BL">Saint Barthélemy</option>
                                                            <option data-kt-flag="flags/saint-kitts-and-nevis.svg" value="KN">Saint Kitts and Nevis</option>
                                                            <option data-kt-flag="flags/st-lucia.svg" value="LC">Saint Lucia</option>
                                                            <option data-kt-flag="flags/sint-maarten.svg" value="MF">Saint Martin (French part)</option>
                                                            <option data-kt-flag="flags/st-vincent-and-the-grenadines.svg" value="VC">Saint Vincent and the Grenadines</option>
                                                            <option data-kt-flag="flags/samoa.svg" value="WS">Samoa</option>
                                                            <option data-kt-flag="flags/san-marino.svg" value="SM">San Marino</option>
                                                            <option data-kt-flag="flags/sao-tome-and-prince.svg" value="ST">Sao Tome and Principe</option>
                                                            <option data-kt-flag="flags/saudi-arabia.svg" value="SA">Saudi Arabia</option>
                                                            <option data-kt-flag="flags/senegal.svg" value="SN">Senegal</option>
                                                            <option data-kt-flag="flags/serbia.svg" value="RS">Serbia</option>
                                                            <option data-kt-flag="flags/seychelles.svg" value="SC">Seychelles</option>
                                                            <option data-kt-flag="flags/sierra-leone.svg" value="SL">Sierra Leone</option>
                                                            <option data-kt-flag="flags/singapore.svg" value="SG">Singapore</option>
                                                            <option data-kt-flag="flags/sint-maarten.svg" value="SX">Sint Maarten (Dutch part)</option>
                                                            <option data-kt-flag="flags/slovakia.svg" value="SK">Slovakia</option>
                                                            <option data-kt-flag="flags/slovenia.svg" value="SI">Slovenia</option>
                                                            <option data-kt-flag="flags/solomon-islands.svg" value="SB">Solomon Islands</option>
                                                            <option data-kt-flag="flags/somalia.svg" value="SO">Somalia</option>
                                                            <option data-kt-flag="flags/south-africa.svg" value="ZA">South Africa</option>
                                                            <option data-kt-flag="flags/south-korea.svg" value="KR">South Korea</option>
                                                            <option data-kt-flag="flags/south-sudan.svg" value="SS">South Sudan</option>
                                                            <option data-kt-flag="flags/spain.svg" value="ES">Spain</option>
                                                            <option data-kt-flag="flags/sri-lanka.svg" value="LK">Sri Lanka</option>
                                                            <option data-kt-flag="flags/sudan.svg" value="SD">Sudan</option>
                                                            <option data-kt-flag="flags/suriname.svg" value="SR">Suriname</option>
                                                            <option data-kt-flag="flags/swaziland.svg" value="SZ">Swaziland</option>
                                                            <option data-kt-flag="flags/sweden.svg" value="SE">Sweden</option>
                                                            <option data-kt-flag="flags/switzerland.svg" value="CH">Switzerland</option>
                                                            <option data-kt-flag="flags/syria.svg" value="SY">Syrian Arab Republic</option>
                                                            <option data-kt-flag="flags/taiwan.svg" value="TW">Taiwan, Province of China</option>
                                                            <option data-kt-flag="flags/tajikistan.svg" value="TJ">Tajikistan</option>
                                                            <option data-kt-flag="flags/tanzania.svg" value="TZ">Tanzania, United Republic of</option>
                                                            <option data-kt-flag="flags/thailand.svg" value="TH">Thailand</option>
                                                            <option data-kt-flag="flags/togo.svg" value="TG">Togo</option>
                                                            <option data-kt-flag="flags/tokelau.svg" value="TK">Tokelau</option>
                                                            <option data-kt-flag="flags/tonga.svg" value="TO">Tonga</option>
                                                            <option data-kt-flag="flags/trinidad-and-tobago.svg" value="TT">Trinidad and Tobago</option>
                                                            <option data-kt-flag="flags/tunisia.svg" value="TN">Tunisia</option>
                                                            <option data-kt-flag="flags/turkey.svg" value="TR">Turkey</option>
                                                            <option data-kt-flag="flags/turkmenistan.svg" value="TM">Turkmenistan</option>
                                                            <option data-kt-flag="flags/turks-and-caicos.svg" value="TC">Turks and Caicos Islands</option>
                                                            <option data-kt-flag="flags/tuvalu.svg" value="TV">Tuvalu</option>
                                                            <option data-kt-flag="flags/uganda.svg" value="UG">Uganda</option>
                                                            <option data-kt-flag="flags/ukraine.svg" value="UA">Ukraine</option>
                                                            <option data-kt-flag="flags/united-arab-emirates.svg" value="AE">United Arab Emirates</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="GB">United Kingdom</option>
                                                            <option data-kt-flag="flags/united-states.svg" value="US">United States</option>
                                                            <option data-kt-flag="flags/uruguay.svg" value="UY">Uruguay</option>
                                                            <option data-kt-flag="flags/uzbekistan.svg" value="UZ">Uzbekistan</option>
                                                            <option data-kt-flag="flags/vanuatu.svg" value="VU">Vanuatu</option>
                                                            <option data-kt-flag="flags/venezuela.svg" value="VE">Venezuela, Bolivarian Republic of</option>
                                                            <option data-kt-flag="flags/vietnam.svg" value="VN">Vietnam</option>
                                                            <option data-kt-flag="flags/virgin-islands.svg" value="VI">Virgin Islands</option>
                                                            <option data-kt-flag="flags/yemen.svg" value="YE">Yemen</option>
                                                            <option data-kt-flag="flags/zambia.svg" value="ZM">Zambia</option>
                                                            <option data-kt-flag="flags/zimbabwe.svg" value="ZW">Zimbabwe</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-oqwa" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg fw-semibold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-uq-container" aria-controls="select2-country-uq-container"><span class="select2-selection__rendered" id="select2-country-uq-container" role="textbox" aria-readonly="true" title="Select a country..."><span class="select2-selection__placeholder">Select a country...</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Language</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <!--begin::Input-->
                        <select name="language" aria-label="Select a Language" data-control="select2" data-placeholder="Select a language..." class="form-select form-select-solid form-select-lg select2-hidden-accessible" data-select2-id="select2-data-13-u01u" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-15-mt2r">Select a Language...</option>
                                                            <option data-kt-flag="flags/indonesia.svg" value="id">Bahasa Indonesia - Indonesian</option>
                                                            <option data-kt-flag="flags/malaysia.svg" value="msa">Bahasa Melayu - Malay</option>
                                                            <option data-kt-flag="flags/canada.svg" value="ca">Català - Catalan</option>
                                                            <option data-kt-flag="flags/czech-republic.svg" value="cs">Čeština - Czech</option>
                                                            <option data-kt-flag="flags/netherlands.svg" value="da">Dansk - Danish</option>
                                                            <option data-kt-flag="flags/germany.svg" value="de">Deutsch - German</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="en">English</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="en-gb">English UK - British English</option>
                                                            <option data-kt-flag="flags/spain.svg" value="es">Español - Spanish</option>
                                                            <option data-kt-flag="flags/philippines.svg" value="fil">Filipino</option>
                                                            <option data-kt-flag="flags/france.svg" value="fr">Français - French</option>
                                                            <option data-kt-flag="flags/gabon.svg" value="ga">Gaeilge - Irish (beta)</option>
                                                            <option data-kt-flag="flags/greenland.svg" value="gl">Galego - Galician (beta)</option>
                                                            <option data-kt-flag="flags/croatia.svg" value="hr">Hrvatski - Croatian</option>
                                                            <option data-kt-flag="flags/italy.svg" value="it">Italiano - Italian</option>
                                                            <option data-kt-flag="flags/hungary.svg" value="hu">Magyar - Hungarian</option>
                                                            <option data-kt-flag="flags/netherlands.svg" value="nl">Nederlands - Dutch</option>
                                                            <option data-kt-flag="flags/norway.svg" value="no">Norsk - Norwegian</option>
                                                            <option data-kt-flag="flags/poland.svg" value="pl">Polski - Polish</option>
                                                            <option data-kt-flag="flags/portugal.svg" value="pt">Português - Portuguese</option>
                                                            <option data-kt-flag="flags/romania.svg" value="ro">Română - Romanian</option>
                                                            <option data-kt-flag="flags/slovakia.svg" value="sk">Slovenčina - Slovak</option>
                                                            <option data-kt-flag="flags/finland.svg" value="fi">Suomi - Finnish</option>
                                                            <option data-kt-flag="flags/el-salvador.svg" value="sv">Svenska - Swedish</option>
                                                            <option data-kt-flag="flags/virgin-islands.svg" value="vi">Tiếng Việt - Vietnamese</option>
                                                            <option data-kt-flag="flags/turkey.svg" value="tr">Türkçe - Turkish</option>
                                                            <option data-kt-flag="flags/greece.svg" value="el">Ελληνικά - Greek</option>
                                                            <option data-kt-flag="flags/bulgaria.svg" value="bg">Български език - Bulgarian</option>
                                                            <option data-kt-flag="flags/russia.svg" value="ru">Русский - Russian</option>
                                                            <option data-kt-flag="flags/suriname.svg" value="sr">Српски - Serbian</option>
                                                            <option data-kt-flag="flags/ukraine.svg" value="uk">Українська мова - Ukrainian</option>
                                                            <option data-kt-flag="flags/israel.svg" value="he">עִבְרִית - Hebrew</option>
                                                            <option data-kt-flag="flags/pakistan.svg" value="ur">اردو - Urdu (beta)</option>
                                                            <option data-kt-flag="flags/argentina.svg" value="ar">العربية - Arabic</option>
                                                            <option data-kt-flag="flags/argentina.svg" value="fa">فارسی - Persian</option>
                                                            <option data-kt-flag="flags/mauritania.svg" value="mr">मराठी - Marathi</option>
                                                            <option data-kt-flag="flags/india.svg" value="hi">हिन्दी - Hindi</option>
                                                            <option data-kt-flag="flags/bangladesh.svg" value="bn">বাংলা - Bangla</option>
                                                            <option data-kt-flag="flags/guam.svg" value="gu">ગુજરાતી - Gujarati</option>
                                                            <option data-kt-flag="flags/india.svg" value="ta">தமிழ் - Tamil</option>
                                                            <option data-kt-flag="flags/saint-kitts-and-nevis.svg" value="kn">ಕನ್ನಡ - Kannada</option>
                                                            <option data-kt-flag="flags/thailand.svg" value="th">ภาษาไทย - Thai</option>
                                                            <option data-kt-flag="flags/south-korea.svg" value="ko">한국어 - Korean</option>
                                                            <option data-kt-flag="flags/japan.svg" value="ja">日本語 - Japanese</option>
                                                            <option data-kt-flag="flags/china.svg" value="zh-cn">简体中文 - Simplified Chinese</option>
                                                            <option data-kt-flag="flags/taiwan.svg" value="zh-tw">繁體中文 - Traditional Chinese</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-gade" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-language-u9-container" aria-controls="select2-language-u9-container"><span class="select2-selection__rendered" id="select2-language-u9-container" role="textbox" aria-readonly="true" title="Select a language..."><span class="select2-selection__placeholder">Select a language...</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <!--end::Input-->

                        <!--begin::Hint-->
                        <div class="form-text">
                            Please select a preferred language, including date, time, and number formatting.
                        </div>
                        <!--end::Hint-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Time Zone</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a timezone.." class="form-select form-select-solid form-select-lg select2-hidden-accessible" data-select2-id="select2-data-16-ht7y" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-18-9vnz">Select a Timezone..</option>
                                                            <option data-bs-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                            <option data-bs-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
                                                            <option data-bs-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                                            <option data-bs-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                            <option data-bs-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                                            <option data-bs-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                                            <option data-bs-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                            <option data-bs-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                                            <option data-bs-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                                            <option data-bs-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                            <option data-bs-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
                                                            <option data-bs-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
                                                            <option data-bs-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
                                                            <option data-bs-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
                                                            <option data-bs-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
                                                            <option data-bs-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
                                                            <option data-bs-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
                                                            <option data-bs-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
                                                            <option data-bs-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
                                                            <option data-bs-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
                                                            <option data-bs-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
                                                            <option data-bs-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
                                                            <option data-bs-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
                                                            <option data-bs-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
                                                            <option data-bs-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                                            <option data-bs-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
                                                            <option data-bs-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
                                                            <option data-bs-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                                            <option data-bs-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                                            <option data-bs-offset="0" value="Azores">(GMT) Azores</option>
                                                            <option data-bs-offset="0" value="Monrovia">(GMT) Monrovia</option>
                                                            <option data-bs-offset="0" value="UTC">(GMT) UTC</option>
                                                            <option data-bs-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
                                                            <option data-bs-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
                                                            <option data-bs-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
                                                            <option data-bs-offset="3600" value="London">(GMT+01:00) London</option>
                                                            <option data-bs-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
                                                            <option data-bs-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                                            <option data-bs-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
                                                            <option data-bs-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
                                                            <option data-bs-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
                                                            <option data-bs-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
                                                            <option data-bs-offset="7200" value="Prague">(GMT+02:00) Prague</option>
                                                            <option data-bs-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
                                                            <option data-bs-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
                                                            <option data-bs-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
                                                            <option data-bs-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
                                                            <option data-bs-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
                                                            <option data-bs-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
                                                            <option data-bs-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
                                                            <option data-bs-offset="7200" value="Paris">(GMT+02:00) Paris</option>
                                                            <option data-bs-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
                                                            <option data-bs-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
                                                            <option data-bs-offset="7200" value="Bern">(GMT+02:00) Bern</option>
                                                            <option data-bs-offset="7200" value="Rome">(GMT+02:00) Rome</option>
                                                            <option data-bs-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
                                                            <option data-bs-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
                                                            <option data-bs-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
                                                            <option data-bs-offset="7200" value="Harare">(GMT+02:00) Harare</option>
                                                            <option data-bs-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
                                                            <option data-bs-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
                                                            <option data-bs-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
                                                            <option data-bs-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
                                                            <option data-bs-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
                                                            <option data-bs-offset="10800" value="Riga">(GMT+03:00) Riga</option>
                                                            <option data-bs-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
                                                            <option data-bs-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
                                                            <option data-bs-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
                                                            <option data-bs-offset="10800" value="Athens">(GMT+03:00) Athens</option>
                                                            <option data-bs-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
                                                            <option data-bs-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
                                                            <option data-bs-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
                                                            <option data-bs-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
                                                            <option data-bs-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                                            <option data-bs-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
                                                            <option data-bs-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
                                                            <option data-bs-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
                                                            <option data-bs-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
                                                            <option data-bs-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
                                                            <option data-bs-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                                            <option data-bs-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
                                                            <option data-bs-offset="14400" value="Baku">(GMT+04:00) Baku</option>
                                                            <option data-bs-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                                            <option data-bs-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
                                                            <option data-bs-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
                                                            <option data-bs-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
                                                            <option data-bs-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                            <option data-bs-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
                                                            <option data-bs-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
                                                            <option data-bs-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
                                                            <option data-bs-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
                                                            <option data-bs-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
                                                            <option data-bs-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
                                                            <option data-bs-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
                                                            <option data-bs-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                                            <option data-bs-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                                            <option data-bs-offset="21600" value="Astana">(GMT+06:00) Astana</option>
                                                            <option data-bs-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
                                                            <option data-bs-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
                                                            <option data-bs-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
                                                            <option data-bs-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
                                                            <option data-bs-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                                            <option data-bs-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
                                                            <option data-bs-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
                                                            <option data-bs-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
                                                            <option data-bs-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                            <option data-bs-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
                                                            <option data-bs-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
                                                            <option data-bs-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                                            <option data-bs-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                            <option data-bs-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
                                                            <option data-bs-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
                                                            <option data-bs-offset="28800" value="Perth">(GMT+08:00) Perth</option>
                                                            <option data-bs-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                                            <option data-bs-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
                                                            <option data-bs-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
                                                            <option data-bs-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
                                                            <option data-bs-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
                                                            <option data-bs-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
                                                            <option data-bs-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                                            <option data-bs-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
                                                            <option data-bs-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
                                                            <option data-bs-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
                                                            <option data-bs-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
                                                            <option data-bs-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
                                                            <option data-bs-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
                                                            <option data-bs-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
                                                            <option data-bs-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                                            <option data-bs-offset="36000" value="Guam">(GMT+10:00) Guam</option>
                                                            <option data-bs-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                                            <option data-bs-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
                                                            <option data-bs-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
                                                            <option data-bs-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                                            <option data-bs-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
                                                            <option data-bs-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                                            <option data-bs-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                                            <option data-bs-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
                                                            <option data-bs-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
                                                            <option data-bs-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-sgix" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timezone-7f-container" aria-controls="select2-timezone-7f-container"><span class="select2-selection__rendered" id="select2-timezone-7f-container" role="textbox" aria-readonly="true" title="Select a timezone.."><span class="select2-selection__placeholder">Select a timezone..</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-semibold fs-6">Currency</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select name="currnecy" aria-label="Select a Currency" data-control="select2" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg select2-hidden-accessible" data-select2-id="select2-data-19-a89s" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-21-xwnf">Select a currency..</option>
                                                            <option data-kt-flag="flags/united-states.svg" value="USD"><b>USD</b>&nbsp;-&nbsp;USA dollar</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="GBP"><b>GBP</b>&nbsp;-&nbsp;British pound</option>
                                                            <option data-kt-flag="flags/australia.svg" value="AUD"><b>AUD</b>&nbsp;-&nbsp;Australian dollar</option>
                                                            <option data-kt-flag="flags/japan.svg" value="JPY"><b>JPY</b>&nbsp;-&nbsp;Japanese yen</option>
                                                            <option data-kt-flag="flags/sweden.svg" value="SEK"><b>SEK</b>&nbsp;-&nbsp;Swedish krona</option>
                                                            <option data-kt-flag="flags/canada.svg" value="CAD"><b>CAD</b>&nbsp;-&nbsp;Canadian dollar</option>
                                                            <option data-kt-flag="flags/switzerland.svg" value="CHF"><b>CHF</b>&nbsp;-&nbsp;Swiss franc</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-rarl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-currnecy-te-container" aria-controls="select2-currnecy-te-container"><span class="select2-selection__rendered" id="select2-currnecy-te-container" role="textbox" aria-readonly="true" title="Select a currency.."><span class="select2-selection__placeholder">Select a currency..</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <!--begin::Options-->
                        <div class="d-flex align-items-center mt-3">
                            <!--begin::Option-->
                            <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                <input class="form-check-input" name="communication[]" type="checkbox" value="1">
                                <span class="fw-semibold ps-2 fs-6">
                                    Email
                                </span>
                            </label>
                            <!--end::Option-->

                            <!--begin::Option-->
                            <label class="form-check form-check-custom form-check-inline form-check-solid">
                                <input class="form-check-input" name="communication[]" type="checkbox" value="2">
                                <span class="fw-semibold ps-2 fs-6">
                                    Phone
                                </span>
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Options-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-0">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                    <!--begin::Label-->

                    <!--begin::Label-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="">
                            <label class="form-check-label" for="allowmarketing"></label>
                        </div>
                    </div>
                    <!--begin::Label-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
            </div>
            <!--end::Actions-->
        <input type="hidden"></form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->
        <!--begin::Connected Accounts-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Connected Accounts</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_connected_accounts" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            
<!--begin::Notice-->
<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
            <!--begin::Icon-->
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>        <!--end::Icon-->
    
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1 ">
                    <!--begin::Content-->
            <div class=" fw-semibold">
                
                                    <div class="fs-6 text-gray-700 ">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code. <a href="#" class="fw-bold">Learn More</a></div>
                            </div>
            <!--end::Content-->
        
            </div>
    <!--end::Wrapper-->  
</div>
<!--end::Notice-->

            <!--begin::Items-->
            <div class="py-2">
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <div class="d-flex">
                        <img src="/good/assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="">

                        <div class="d-flex flex-column">
                            <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">Google</a>
                            <div class="fs-6 fw-semibold text-gray-500">Plan properly your workflow</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-solid form-check-custom form-switch">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" checked="">
                            <label class="form-check-label" for="googleswitch"></label>
                        </div>
                    </div>
                </div>
                <!--end::Item-->

                <div class="separator separator-dashed my-5"></div>

                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <div class="d-flex">
                        <img src="/good/assets/media/svg/brand-logos/github.svg" class="w-30px me-6" alt="">

                        <div class="d-flex flex-column">
                            <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">Github</a>
                            <div class="fs-6 fw-semibold text-gray-500">Keep eye on on your Repositories</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-solid form-check-custom form-switch">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="githubswitch" checked="">
                            <label class="form-check-label" for="githubswitch"></label>
                        </div>
                    </div>
                </div>
                <!--end::Item-->

                <div class="separator separator-dashed my-5"></div>

                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <div class="d-flex">
                        <img src="/good/assets/media/svg/brand-logos/slack-icon.svg" class="w-30px me-6" alt="">

                        <div class="d-flex flex-column">
                            <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">Slack</a>
                            <div class="fs-6 fw-semibold text-gray-500">Integrate Projects Discussions</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-solid form-check-custom form-switch">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="slackswitch">
                            <label class="form-check-label" for="slackswitch"></label>
                        </div>                      
                    </div>
                </div>
                <!--end::Item-->
            </div>
            <!--end::Items-->
        </div>
        <!--end::Card body-->

        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button class="btn btn-primary">Save Changes</button>
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Content-->
</div>
<!--end::Connected Accounts-->
        <!--begin::Notifications-->
<div class="card  mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Notifications</h3>
        </div>
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_notifications" class="collapse show">
        <!--begin::Form-->
        <form class="form">
            <!--begin::Card body-->
            <div class="card-body border-top px-9 pt-3 pb-4">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                        <tbody class="fs-6 fw-semibold">
                            <!--begin::Table row-->
                            <tr>
                                <td class="min-w-250px fs-4 fw-bold">Notifications</td>
                                <td class="w-125px">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]">
                                        <label class="form-check-label ps-2" for="kt_settings_notification_email">
                                            Email
                                        </label>
                                    </div>
                                </td>
                                <td class="w-125px">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]">
                                        <label class="form-check-label ps-2" for="kt_settings_notification_phone">
                                            Phone
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->

                            <!--begin::Table row-->
                            <tr>
                                <td>Billing Updates</td>
                                <td>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="" data-kt-settings-notification="email">
                                        <label class="form-check-label ps-2" for="billing1"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="billing2" checked="" data-kt-settings-notification="phone">
                                        <label class="form-check-label ps-2" for="billing2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->

                            <!--begin::Table row-->
                            <tr>
                                <td>New Team Members</td>
                                <td>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="team1" checked="" data-kt-settings-notification="email">
                                        <label class="form-check-label ps-2" for="team1"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone">
                                        <label class="form-check-label ps-2" for="team2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->

                            <!--begin::Table row-->
                            <tr>
                                <td>Completed Projects</td>
                                <td>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email">
                                        <label class="form-check-label ps-2" for="project1"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="project2" checked="" data-kt-settings-notification="phone">
                                        <label class="form-check-label ps-2" for="project2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->

                            <!--begin::Table row-->
                            <tr>
                                <td class="border-bottom-0">Newsletters</td>
                                <td class="border-bottom-0">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="newsletter1" data-kt-settings-notification="email">
                                        <label class="form-check-label ps-2" for="newsletter1"></label>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone">
                                        <label class="form-check-label ps-2" for="newsletter2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->

            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button class="btn btn-primary  px-6">Save Changes</button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Notifications-->
        <!--begin::Deactivate Account-->
<div class="card  ">

    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Deactivate Account</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_deactivate" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_deactivate_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">

            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                
<!--begin::Notice-->
<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
            <!--begin::Icon-->
        <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>        <!--end::Icon-->
    
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1 ">
                    <!--begin::Content-->
            <div class=" fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
                
                                    <div class="fs-6 text-gray-700 ">For extra security, this requires you to confirm your email or phone number when you reset yousignr password. <br><a class="fw-bold" href="#">Learn more</a></div>
                            </div>
            <!--end::Content-->
        
            </div>
    <!--end::Wrapper-->  
</div>
<!--end::Notice-->

                <!--begin::Form input row-->
                <div class="form-check form-check-solid fv-row fv-plugins-icon-container">
                    <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate">
                    <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                <!--end::Form input row-->
            </div>
            <!--end::Card body-->

            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>
            </div>
            <!--end::Card footer-->

        <input type="hidden"></form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Deactivate Account-->    </div>
    <!--end::Layout-->
</div>
    </div>
</div>
@endsection
