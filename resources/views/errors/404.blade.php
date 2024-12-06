<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom styles for 404 page */
        .error-page {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .error-page h1 {
            font-size: 6rem;
            font-weight: 700;
            color: #dc3545;
        }

        .error-page p {
            font-size: 1.25rem;
            color: #6c757d;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container error-page">
        <!-- <h1>404</h1> -->
        <p> <span class="text-danger">404</span> | Oops! The page you're looking for doesn't exist.</p>
        <script>
            var url = window.location.href;
        </script>
        <span class="text-danger underline" id="url"></span>
        <p>Please check the URL or go back to the homepage.</p>
        <div class="text-center">
            <!-- Button to go back to the previous page using history API -->
            <div class="d-flex justify-content-center">

                <button class="btn btn-custom btn-primary btn-sm me-2" onclick="goBack()"> <i class="fa fa-arrow-left"></i> Go Back</button>
                <!-- Link to home page as a fallback -->
                <a href="{{ url('/') }}" class="btn btn-custom btn-primary btn-sm"> <i class="fa fa-home"></i> Go Back Home</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to go back to the previous page
        function goBack() {
            if (document.referrer) {
                window.history.back();
            } else {
                window.location.href = "{{ url('/') }}"; // Redirect to home if no referrer
            }
        }
        document.getElementById('url').textContent = url;
    </script>
</body>

</html>