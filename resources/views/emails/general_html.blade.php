<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
        }

        h1 {
            color: #007bff;
            font-size: 24px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }

        .footer {
            background-color: #9727ff;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
            border-radius: 8px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            color: #fff;
        }

        .footer a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer .social-icons {
            margin-top: 10px;
        }

        .footer .social-icons i {
            font-size: 24px;
            margin: 0 10px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 150px;
        }
    </style>
</head>

<body>
    <!-- Main Email Container -->
    <div class="email-container">
        <!-- Logo Section -->
        <div class="logo">
            <img src="https://proffid.com/assets/media/logos/logo-color.png" alt="Proffid Logo" />
        </div>  
        <!-- Render raw HTML content -->
        <div>{!! $content !!}</div> <!-- Display raw HTML content here -->
    </div>
    <!-- Footer Section -->
    <div class="footer">
        <p style="font-size: 12px; color: #fff;">&copy; {{ date('Y') }} Proffid. All rights reserved.</p>
        <div class="social-icons">
            <!-- Facebook -->
            <a href="https://facebook.com/proffid" target="_blank"><i class="bi bi-facebook text-white"></i></a>
            <!-- Twitter -->
            <a href="https://twitter.com/proffid" target="_blank"><i class="bi bi-twitter text-white"></i></a>
            <!-- Instagram -->
            <a href="https://instagram.com/proffid" target="_blank"><i class="bi bi-instagram text-white"></i></a>
            <!-- LinkedIn -->
            <a href="https://linkedin.com/proffid" target="_blank"><i class="bi bi-linkedin text-white"></i></a>
        </div>
    </div>
</body>

</html>