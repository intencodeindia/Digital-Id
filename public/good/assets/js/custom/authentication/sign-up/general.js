"use strict";

var KTSignupGeneral = function () {
    var e, t, r, a,
        s = function () { return a.getScore() > 50 }; // Password strength validation

    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form");
            t = document.querySelector("#kt_sign_up_submit");
            a = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]')); // Password meter instance

            // Check if form action URL is valid
            if (!function (e) {
                try { return new URL(e), true } catch (e) { return false }
            }(t.closest("form").getAttribute("action"))) {

                // Form validation with FormValidation.js
                r = FormValidation.formValidation(e, {
                    fields: {
                        "first-name": { validators: { notEmpty: { message: "First Name is required" } } },
                        "last-name": { validators: { notEmpty: { message: "Last Name is required" } } },
                        "email": { 
                            validators: {
                                regexp: {
                                    regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                    message: "The value is not a valid email address"
                                },
                                notEmpty: { message: "Email address is required" }
                            }
                        },
                        "password": {
                            validators: {
                                notEmpty: { message: "The password is required" },
                                callback: {
                                    message: "Please enter a valid password",
                                    callback: function (e) { return e.value.length > 0 ? s() : true }
                                }
                            }
                        },
                        "confirm-password": {
                            validators: {
                                notEmpty: { message: "The password confirmation is required" },
                                identical: {
                                    compare: function () { return e.querySelector('[name="password"]').value },
                                    message: "The password and its confirmation are not the same"
                                }
                            }
                        },
                        "toc": { validators: { notEmpty: { message: "You must accept the terms and conditions" } } }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger({ event: { password: false } }),
                        bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" })
                    }
                });

                // Submit button event listener
                t.addEventListener("click", function (s) {
                    s.preventDefault();
                    r.revalidateField("password");

                    // Validate the form before submission
                    r.validate().then(function (r) {
                        if ("Valid" == r) {
                            t.setAttribute("data-kt-indicator", "on");
                            t.disabled = true;

                            // Submit form using Axios
                            axios.post(t.closest("form").getAttribute("action"), new FormData(e))
                                .then(function (t) {
                                    if (t) {
                                        e.reset();
                                        const redirectUrl = e.getAttribute("data-kt-redirect-url");
                                        if (redirectUrl) location.href = redirectUrl;
                                    } else {
                                        Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { confirmButton: "btn btn-primary" }
                                        });
                                    }
                                })
                                .catch(function (e) {
                                    Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                })
                                .finally(function () {
                                    t.removeAttribute("data-kt-indicator");
                                    t.disabled = false;
                                });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    });
                });

                // Password input listener to update password status
                e.querySelector('input[name="password"]').addEventListener("input", function () {
                    this.value.length > 0 && r.updateFieldStatus("password", "NotValidated");
                });

            } else {
                // Handle invalid form action URL or other custom logic here if needed
                console.error('Form action URL is invalid or cannot be parsed');
            }
        }
    };
};

KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init(); // Initialize the signup form on DOM content load
});
