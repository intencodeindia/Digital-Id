"use strict";

var KTSubscriptionsExport = function() {
    // Private variables
    var modal;
    var form;
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var modalInstance;

    return {
        init: function() {
            // Elements
            modal = document.querySelector('#kt_subscriptions_export_modal');
            modalInstance = new bootstrap.Modal(modal);
            form = document.querySelector('#kt_subscriptions_export_form');
            submitButton = form.querySelector('#kt_subscriptions_export_submit');
            cancelButton = form.querySelector('#kt_subscriptions_export_cancel');
            closeButton = modal.querySelector('#kt_subscriptions_export_close');

            // Form validation
            validator = FormValidation.formValidation(form, {
                fields: {
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'Date range is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            });

            // Submit button handler
            submitButton.addEventListener('click', function(e) {
                e.preventDefault();

                if (validator) {
                    validator.validate().then(function(status) {
                        console.log('validated!');

                        if (status == 'Valid') {
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;

                            setTimeout(function() {
                                submitButton.removeAttribute('data-kt-indicator');
                                
                                Swal.fire({
                                    text: "Customer list has been successfully exported!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function(result) {
                                    if (result.isConfirmed) {
                                        modalInstance.hide();
                                        submitButton.disabled = false;
                                    }
                                });
                            }, 2000);
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
                }
            });

            // Cancel button handler
            cancelButton.addEventListener('click', function(e) {
                e.preventDefault();
                handleCancel();
            });

            // Close button handler
            closeButton.addEventListener('click', function(e) {
                e.preventDefault();
                handleCancel(); 
            });

            // Init date picker
            initDatePicker();
        }
    };

    // Handle cancel modal
    function handleCancel() {
        Swal.fire({
            text: "Are you sure you would like to cancel?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light"
            }
        }).then(function(result) {
            if (result.value) {
                form.reset();
                modalInstance.hide();
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "Your form has not been cancelled!.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    }

    // Init date picker
    function initDatePicker() {
        const element = form.querySelector('[name=date]');
        $(element).flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            mode: "range"
        });
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSubscriptionsExport.init();
});