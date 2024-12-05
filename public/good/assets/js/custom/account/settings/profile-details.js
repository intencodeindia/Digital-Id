"use strict";

var KTAccountSettingsProfileDetails = function() {
    var e, t;
    
    return {
        init: function() {
            // Check if the form exists
            if (e = document.getElementById("kt_account_profile_details_form")) {
                
                // Initialize the form validation
                t = FormValidation.formValidation(e, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Full name is required"
                                }
                            }
                        },
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: "Phone number is required"
                                },
                                regexp: {
                                    // Ensure valid phone number format
                                    message: "Please enter a valid phone number",
                                    regexp: /^[0-9+\-\s\(\)]*$/
                                }
                            }
                        },

                        // Avatar image upload
                        profile_photo: {
                            validators: {
                                file: {
                                    extension: "png,jpg,jpeg",
                                    type: "image/png,image/jpg,image/jpeg",
                                    message: "Only image files (png, jpg, jpeg) are allowed"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });

                // Handle avatar file input changes (for validation)
                $(e.querySelector('[name="profile_photo"]')).on("change", function() {
                    t.revalidateField("profile_photo");
                });
            }
        }
    };
}();

// Initialize when DOM is ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsProfileDetails.init();
});
