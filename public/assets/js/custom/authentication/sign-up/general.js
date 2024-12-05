"use strict";

var KTSignupGeneral = function () {
    var form = document.querySelector('#kt_free_trial_form');
    var submitButton = document.querySelector('#kt_sign_up_submit');
    var validator;

    var handleValidation = function () {
        validator = FormValidation.formValidation(form, {
            fields: {
                'first-name': { validators: { notEmpty: { message: 'First Name is required' } } },
                'last-name': { validators: { notEmpty: { message: 'Last Name is required' } } },
                'email': { validators: { notEmpty: { message: 'Email is required' }, emailAddress: { message: 'Invalid email' } } },
                'password': { validators: { notEmpty: { message: 'Password is required' }, stringLength: { min: 8, message: 'Password must be at least 8 characters' } } },
                'confirm-password': { validators: { notEmpty: { message: 'Password confirmation required' }, identical: { compare: function () { return form.querySelector('[name="password"]').value; }, message: 'Passwords do not match' } } },
                'toc': { validators: { choice: { min: 1, max: 1, message: 'You must accept terms' } } }
            },
            plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: '.fv-row' }) }
        });
    };

    var handleFormSubmit = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            validator.validate().then(function (status) {
                if (status === 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;

                    axios.post(form.getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            Swal.fire({ text: response.data.success ? "Signup successful!" : response.data.error, icon: response.data.success ? "success" : "error", confirmButtonText: "Ok" })
                                .then(function (result) { if (result.isConfirmed) window.location.href = response.data.redirectUrl || '/'; });
                        })
                        .catch(function (error) {
                            Swal.fire({ text: error.response?.data?.errors ? Object.values(error.response.data.errors).join('\n') : 'Error. Please try again.', icon: "error", confirmButtonText: "Ok" });
                        })
                        .finally(function () { submitButton.removeAttribute('data-kt-indicator'); submitButton.disabled = false; });
                } else {
                    Swal.fire({ text: 'Please fill in all required fields correctly.', icon: "error", confirmButtonText: "Ok" });
                }
            });
        });
    };

    return {
        init: function () { if (form) { handleValidation(); handleFormSubmit(); } }
    };
}();

document.addEventListener('DOMContentLoaded', function () { KTSignupGeneral.init(); });
