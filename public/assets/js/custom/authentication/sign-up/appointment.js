"use strict";

var KTAppointmentForm = function () {
    var form;
    var submitButton;
    var validation;

    // Initialize datetime input
    var initDatetime = function () {
        const datetimeInput = form.querySelector('[name="appointment_time"]');
        if (datetimeInput) {
            // Set minimum date to current date/time
            const now = new Date();
            now.setMinutes(now.getMinutes() + 30); // Add 30 minutes buffer

            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');

            const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            datetimeInput.setAttribute('min', minDateTime);
        }
    };

    var initValidation = function () {
        validation = FormValidation.formValidation(form, {
            fields: {
                service_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a service'
                        }
                    }
                },
                appointment_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select appointment date and time'
                        }
                    }
                },
                duration_minutes: {
                    validators: {
                        notEmpty: {
                            message: 'Please select appointment duration'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: 'is-invalid',
                    eleValidClass: 'is-valid'
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit()
            }
        });
    };

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (submitButton.disabled) return;

            validation.validate().then(function (status) {
                if (status === 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;

                    axios.post(submitButton.getAttribute('data-url'), new FormData(form))
                        .then(function (response) {
                            if (response.data.status === 'success') {
                                Swal.fire({
                                    text: 'Appointment booked successfully!',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function () {
                                    form.reset();
                                    $('#bookAppointmentModal').modal('hide');
                                });
                            }
                        })
                        .catch(function (error) {
                            Swal.fire({
                                text: error.response?.data?.message || "Sorry, something went wrong. Please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        })
                        .finally(function () {
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                        });
                }
            });
        });
    };

    return {
        init: function () {
            form = document.querySelector('#appointmentForm');
            submitButton = form.querySelector('#submitButton');

            initDatetime();
            initValidation();
            handleForm();
        }
    };
}();

// Initialize when document is ready
document.addEventListener('DOMContentLoaded', function () {
    KTAppointmentForm.init();
});