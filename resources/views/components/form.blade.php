<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proffid | Fill Your Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://proffid.com/assets/media/logos/favicon.ico" />
    <style>
        body {
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #9727ff;
            color: white;
            padding: 1.5rem;
            border-radius: 12px 12px 0 0;
            text-align: center;
        }
        .form-control:focus {
            border-color: #9727ff;
            box-shadow: 0 0 0 0.2rem rgba(151, 39, 255, 0.25);
        }
        .btn-primary {
            background-color: #9727ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #7b1fd9;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Fill Your Details</h4>
                    </div>
                    <div class="card-body p-4">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form id="contactForm" method="POST" action="{{ route('form.submit') }}">
                            @csrf
                            <input type="hidden" name="for" value="{{ $formType }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            
                            <div class="mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" 
                                       name="full_name" required value="{{ old('full_name') }}">
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('mobile_number') is-invalid @enderror" 
                                       name="mobile_number" required value="{{ old('mobile_number') }}">
                                @error('mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" 
                                          name="address" rows="3" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Processing...');
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json'
                })
                .done(function(response) {
                    if (response.vcardData) {
                        // Get current date and time for filename
                        const now = new Date();
                        const dateTime = now.getFullYear() + 
                                       ('0' + (now.getMonth() + 1)).slice(-2) +
                                       ('0' + now.getDate()).slice(-2) + '_' +
                                       ('0' + now.getHours()).slice(-2) +
                                       ('0' + now.getMinutes()).slice(-2) +
                                       ('0' + now.getSeconds()).slice(-2);

                        // Create vCard blob and trigger download
                        const blob = new Blob([response.vcardData], { type: 'text/vcard' });
                        const url = window.URL.createObjectURL(blob);
                        
                        const a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = dateTime + '_vcard.vcf';
                        document.body.appendChild(a);
                        a.click();
                        
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Contact has been downloaded to your device!',
                            showConfirmButton: false,
                            timer: 1500,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then(() => {
                            submitBtn.prop('disabled', false).html('Submit Details');
                        });
                    } else if (response.redirectUrl) {
                        window.location.href = response.redirectUrl;
                    }
                })
                .fail(function(xhr) {
                    console.error('Error:', xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON?.message || 'An error occurred while processing your request.'
                    });
                    submitBtn.prop('disabled', false).html('Submit Details');
                });
            });
        });
    </script>
</body>
</html>
