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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0069d9;
            font-size: 26px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.8;
            color: #666;
        }

        .footer {
            background: linear-gradient(135deg, #9727ff, #4b6cb7);
            color: #fff;
            padding: 30px 20px;
            text-align: center;
            margin-top: 40px;
            border-radius: 10px;
        }

        .footer p {
            font-size: 12px;
            color: #eee;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .footer a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 22px;
            transition: transform 0.3s ease;
        }

        .footer a:hover {
            transform: scale(1.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo img {
            max-width: 180px;
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        /* Responsive Design for Mobile */
        @media (max-width: 600px) {
            .email-container {
                padding: 20px;
            }

            .logo img {
                max-width: 150px;
            }

            h1 {
                font-size: 22px;
            }
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
        <p>&copy; {{ date('Y') }} Proffid. All rights reserved.</p>
        <div class="social-icons">
            <!-- Facebook -->
            <a href="https://facebook.com/proffid" target="_blank"><i class="bi bi-facebook"></i></a>
            <!-- Twitter -->
            <a href="https://twitter.com/proffid" target="_blank"><i class="bi bi-twitter"></i></a>
            <!-- Instagram -->
            <a href="https://instagram.com/proffid" target="_blank"><i class="bi bi-instagram"></i></a>
            <!-- LinkedIn -->
            <a href="https://linkedin.com/proffid" target="_blank"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</body>

</html>
