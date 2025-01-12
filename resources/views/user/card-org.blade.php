<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital ID Card</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
       :root {
    --border-top: {{ $organization->border_color_top ?? '#fbd45c' }};
    --border-right: {{ $organization->border_color_right ?? '#010409' }};
    --border-bottom: {{ $organization->border_color_bottom ?? '#010409' }};
    --border-left: {{ $organization->border_color_left ?? '#fbd45c' }};
    --bg-color: {{ $organization->background_color ?? '#ffffff' }};
}

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        .card-container {
            width: 2.5in;
            height: 4in;
            margin: 20px auto;
            perspective: 1000px;
        }

        .business-card {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s;
            cursor: pointer;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .business-card.flipped {
            transform: rotateY(180deg);
        }

        .front,
        .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--bg-color);
            border-width: 5px;
            border-style: solid;
            border-color: var(--border-top) var(--border-right) var(--border-bottom) var(--border-left);
        }

        .back {
            transform: rotateY(180deg);
            justify-content: center;
            gap: 20px;
        }

        .profile-section {
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .profile-photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid var(--border-top);
        }

        .name {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 8px 0 3px;
        }

        .title {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .contact-info {
            width: 100%;
            padding: 0 10px;
            margin-top: -10px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 0;
            color: #444;
            text-decoration: none;
            font-size: 12px;
            transition: color 0.3s ease;
            line-height: 1.2;
        }

        .contact-item:hover {
            color: var(--border-top);
        }

        .contact-item i {
            width: 15px;
            color: var(--border-top);
            font-size: 12px;
            text-align: center;
        }

        .org-logo {
            max-width: 150px;
            max-height: 100px;
            margin-top: auto;
            padding: 10px 0;
        }

        .qr-code {
            width: 120px;
            height: 120px;
            padding: 8px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .scan-text {
            font-size: 12px;
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card-container">
            <div class="business-card" onclick="this.classList.toggle('flipped')">
                <div class="front">
                    <div class="profile-section">
                        <img class="profile-photo"
                            src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('assets/media/avatars/300-1.webp') }}"
                            alt="Profile Photo">
                        <h1 class="name">{{ $userDetails->name }}</h1>
                        <p class="title">{{ $userDetails->title }}</p>
                    </div>

                    <div class="contact-info">
                        <a href="mailto:{{ $userDetails->email }}" class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>{{ $userDetails->email }}</span>
                        </a>
                        <a href="tel:{{ $userDetails->phone }}" class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $userDetails->phone }}</span>
                        </a>
                        @if($userDetails->website)
                        <a href="{{ $userDetails->website }}" target="_blank" class="contact-item">
                            <i class="fas fa-globe"></i>
                            <span>{{ $userDetails->website }}</span>
                        </a>
                        @endif
                        @if($userDetails->address)
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $userDetails->address }}</span>
                        </div>
                        @endif
                    </div>

                    <img class="org-logo"
                        src="{{ $organization->logo ? asset($organization->logo) : asset('assets/media/logos/default.png') }}"
                        alt="{{ $organization->name }}">
                </div>

                <div class="back">
                    <img class="org-logo"
                        src="{{ $organization->logo ? asset($organization->logo) : asset('assets/media/logos/default.png') }}"
                        alt="{{ $organization->name }}">
                        
                        @php

                // Generate the form URL with qrCodeUrl as a query parameter
                $formUrl = url('/form/'.$userDetails->username) . '?for=portfolio';
                @endphp
                    <img class="qr-code"
                        src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($formUrl) }}"
                        alt="QR Code">
                    <p class="scan-text">Scan to connect</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>