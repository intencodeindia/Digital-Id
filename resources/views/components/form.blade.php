<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Your Details</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .card-header {
            background: #9727ff;
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }
        .card-title {
            margin: 0;
            font-weight: 600;
        }
        .card-body {
            padding: 2rem;
        }
        .form-label {
            font-weight: 500;
            color: #4a5568;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #9727ff;
            box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
        }
        .btn-primary {
            background: #9727ff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #2e59d9;
            transform: translateY(-1px);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }
        textarea {
            resize: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fill Your Details</h4>
                </div>
                @php
                $qrCodeUrl = request()->query('url');
                $userId = request()->query('id');
                @endphp
                <div class="card-body">
                    @php
                    $currentUrl = url()->full();
                    $submittedUrls = isset($_COOKIE['submitted_urls']) ? json_decode($_COOKIE['submitted_urls'], true) : [];
                    
                    // Extract just the query parameters for comparison
                    $currentUrlParts = parse_url($currentUrl);
                    parse_str($currentUrlParts['query'] ?? '', $currentParams);
                    
                    $hasVisited = false;
                    foreach ($submittedUrls as $submittedUrl) {
                        $submittedUrlParts = parse_url($submittedUrl);
                        parse_str($submittedUrlParts['query'] ?? '', $submittedParams);
                        
                        // Compare url and id parameters
                        if (isset($submittedParams['url'], $submittedParams['id']) &&
                            isset($currentParams['url'], $currentParams['id']) &&
                            $submittedParams['url'] === $currentParams['url'] &&
                            $submittedParams['id'] === $currentParams['id']) {
                            $hasVisited = true;
                            break;
                        }
                    }
                    @endphp
                    @if($hasVisited)
                    <div id="skipSection" class="text-center">
                        <p>You've already submitted your details before.</p>
                        <button onclick="skipToRedirect()" class="btn btn-secondary">Skip to Website</button>
                        <hr>
                        <p>Or fill the form again:</p>
                    </div>
                    @endif
                    <form action="{{ url('form') }}" method="POST" id="userForm">
                        @csrf
                        <input type="hidden" name="qr_code_url" value="{{ $qrCodeUrl }}">
                        <input type="hidden" name="user_id" value="{{ $userId }}">

                        <div class="mb-4">
                            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" 
                                   placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-4">
                            <label for="mobile_number" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="mobile_number" name="mobile_number" 
                                   placeholder="Enter your mobile number" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   placeholder="Enter your email address" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" rows="3" 
                                      placeholder="Enter your full address" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5.3 JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    // Function to set the cookie with expiration of one month
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + "=" + value + ";expires=" + expires.toUTCString() + ";path=/";
    }

    // Function to get the cookie value by name
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function skipToRedirect() {
        const redirectUrl = "{{ $qrCodeUrl }}";
        window.location.href = redirectUrl || '/';
    }

    // Handle form submission
    document.getElementById('userForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Get current URL
        const currentUrl = window.location.href;

        // Get existing submitted URLs from cookie or initialize empty array
        let submittedUrls = [];
        const existingUrls = getCookie('submitted_urls');
        if (existingUrls) {
            submittedUrls = JSON.parse(existingUrls);
        }

        // Add current URL if not already in array
        if (!submittedUrls.includes(currentUrl)) {
            submittedUrls.push(currentUrl);
        }

        // Save updated URLs array back to cookie
        setCookie('submitted_urls', JSON.stringify(submittedUrls), 30);

        // Store form data in session storage
        const formData = {
            name: document.getElementById('full_name').value,
            mobile: document.getElementById('mobile_number').value,
            email: document.getElementById('email').value,
            address: document.getElementById('address').value
        };
        sessionStorage.setItem('userFormData', JSON.stringify(formData));

        // Proceed with the form submission
        this.submit();
    });
</script>

</body>
</html>
