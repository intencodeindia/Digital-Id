"use strict";

var KTAccountSettingsProfileDetails = function () {
    var e, t;

    return {
        init: function () {
            // Get the form element
            if ((e = document.getElementById("kt_account_profile_details_form"))) {
                // Handle form submission
                e.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission
                    
                    // Create FormData object
                    const formData = new FormData(e);

                    // Submit form using fetch API
                    fetch(e.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            Swal.fire({
                                text: "Profile updated successfully!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            // Show error message
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
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            }
        }
    };
}();

// Initialize when DOM is ready
KTUtil.onDOMContentLoaded(function () {
    KTAccountSettingsProfileDetails.init();
});
