"use strict";

var KTSignupGeneral = function() {
    var e, t, r, a, s = function() {
        return a.getScore() > 50;
    };

    return {
        init: function() {
            e = document.querySelector("#kt_organization_registration_form");
            t = document.querySelector("#kt_sign_up_submit");
            a = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'));

            r = FormValidation.formValidation(e, {
                fields: {
                    "organization-name": {
                        validators: {
                            notEmpty: {
                                message: "Organization Name is required"
                            }
                        }
                    },
                    "organization-username": {
                        validators: {
                            notEmpty: {
                                message: "Organization Username is required"
                            }
                        }
                    },
                    "organization-email": {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "The value is not a valid email address"
                            },
                            notEmpty: {
                                message: "Email address is required"
                            }
                        }
                    },
                    "organization-phone": {
                        validators: {
                            notEmpty: {
                                message: "Phone number is required"
                            }
                        }
                    },
                    "organization-password": {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            callback: {
                                message: "Please enter a valid password",
                                callback: function(e) {
                                    if (e.value.length > 0) return s();
                                }
                            }
                        }
                    },
                    "organization-confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function() {
                                    return e.querySelector('[name="organization-password"]').value;
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                    "organization-toc": {
                        validators: {
                            notEmpty: {
                                message: "You must accept the terms and conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({ event: { password: false } }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            // On submit button click
            t.addEventListener("click", function(s) {
                s.preventDefault();
                r.revalidateField("organization-password");
                r.validate().then(function(r) {
                    if ("Valid" == r) {
                        t.setAttribute("data-kt-indicator", "on");
                        t.disabled = true;

                        axios.post(e.getAttribute("action"), new FormData(e))
                            .then(function(response) {
                                t.removeAttribute("data-kt-indicator");
                                t.disabled = false;
                                
                                Swal.fire({
                                    text: "Organization registered successfully!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function(result) {
                                    if (result.isConfirmed) {
                                        e.reset();
                                        a.reset();
                                        window.location.href = '/login';
                                    }
                                });
                            })
                            .catch(function(error) {
                                t.removeAttribute("data-kt-indicator");
                                t.disabled = false;
                                
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });

            // On password input event
            e.querySelector('input[name="organization-password"]').addEventListener("input", function() {
                this.value.length > 0 && r.updateFieldStatus("organization-password", "NotValidated");
            });
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTSignupGeneral.init();
});
