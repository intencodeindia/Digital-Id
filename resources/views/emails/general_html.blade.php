<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;
            color: #333333;
        }

        .email-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            max-width: 600px;
            margin: 0 auto 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background: linear-gradient(135deg, #9727ff, #4b6cb7);
            color: #ffffff;
            padding: 40px 30px;
            border-radius: 16px;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .social-icon {
            width: 44px;
            height: 44px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: 0.3s;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            background-color: rgba(255, 255, 255, 0.2);
        }

        .social-icon img {
            width: 24px;
            height: 24px;
        }

        .about-section p {
            font-size: 14px;
            line-height: 1.8;
            margin: 0 auto;
        }

        @media screen and (max-width: 640px) {
            .social-icon {
                width: 40px;
                height: 40px;
            }

            .social-icon img {
                width: 20px;
                height: 20px;
            }

            .footer {
                padding: 25px 20px;
            }
        }

    </style>
</head>

<body>
    <div class="email-container">
        <div class="text-center mb-4">
            <img class="logo" src="https://proffid.com/assets/media/logos/logo-color.png" alt="Proffid Logo" style="max-width: 180px;" />
        </div>
        <div class="content mb-4">
            {!! $content !!}
        </div>
    </div>

    <div class="footer">
        <div class="footer-logo mb-3">
            <img src="https://proffid.com/assets/media/logos/logo-color.png" alt="Proffid Logo" style="max-width: 140px;" />
        </div>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="https://facebook.com/proffid" class="social-icon" target="_blank">
                <img src="https://img.icons8.com/fluency/48/facebook-new.png" alt="Facebook" />
            </a>
            <a href="https://twitter.com/proffid" class="social-icon" target="_blank">
                <img src="https://img.icons8.com/fluency/48/twitterx.png" alt="Twitter" />
            </a>
            <a href="https://instagram.com/proffid" class="social-icon" target="_blank">
                <img src="https://img.icons8.com/fluency/48/instagram-new.png" alt="Instagram" />
            </a>
            <a href="https://linkedin.com/proffid" class="social-icon" target="_blank">
                <img src="https://img.icons8.com/fluency/48/linkedin.png" alt="LinkedIn" />
            </a>
        </div>

        <div class="about-section mb-3">
            <p>Proffid is your premier digital identity management platform, empowering professionals and organizations to create, manage, and share digital identity cards securely. We're revolutionizing professional networking for the digital age.</p>
        </div>

        <div class="copyright">
            &copy; 2024 Proffid. All rights reserved.
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
