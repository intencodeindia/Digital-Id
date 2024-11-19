"use strict";
var KTSigninGeneral = function () {
    var t, e, r; return {
        init: function () {
            t = document.querySelector("#kt_sign_in_form"),
                e = document.querySelector("#kt_sign_in_submit"),
                r = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                regexp: { regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: "The value is not a valid email address" },
                                notEmpty: { message: "Email address is required" }
                            }
                        },
                        password: { validators: { notEmpty: { message: "The password is required" } } }
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger, bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) }
                }),
                e.addEventListener("click", (function (i) {
                    i.preventDefault(), r.validate().then((function (r) {
                        if ("Valid" == r) {
                            e.setAttribute("data-kt-indicator", "on");
                            e.disabled = true;

                            axios.post(t.getAttribute("action"), new FormData(t))
                                .then((response) => {
                                    if (response.data.status === 'success') {
                                        Swal.fire({
                                            text: "You have successfully logged in!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { confirmButton: "btn btn-primary" }
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = response.data.redirect || '/dashboard';
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            text: "Sorry, the email or password is incorrect, please try again.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { confirmButton: "btn btn-primary" }
                                        });
                                    }
                                })
                                .catch((error) => {
                                    let errorMessage = "Sorry, looks like there are some errors detected, please try again.";
                                    if (error.response && error.response.data && error.response.data.message) {
                                        errorMessage = error.response.data.message;
                                    }
                                    Swal.fire({
                                        text: errorMessage,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                })
                                .finally(() => {
                                    e.removeAttribute("data-kt-indicator");
                                    e.disabled = false;
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
                    }));
                }));
        }
    }
}();

KTUtil.onDOMContentLoaded((function () { KTSigninGeneral.init() }));