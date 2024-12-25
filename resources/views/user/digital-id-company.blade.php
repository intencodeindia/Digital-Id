<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company Business Card</title>
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
            padding: 15px;
            background-color: var(--bg-color);
            border-width: 5px;
            border-style: solid;
            border-color: var(--border-top) var(--border-right) var(--border-bottom) var(--border-left);
        }

        .back {
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .card-content {
            display: flex;
            height: 100%;
            flex-direction: column;
            align-items: center;
        }

        .header-section {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding-bottom: 15px;
            width: 100%;
        }

        .org-logo {
            width: 180px;
            height: auto;
            object-fit: contain;
            margin-bottom: 3px;
        }

        .org-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--border-top);
            margin: 10px 0 5px;
        }

        .user-title {
            font-size: 13px;
            color: #666;
            margin: 5px 0;
            font-weight: 500;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
            width: 100%;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #444;
            text-decoration: none;
            font-size: 12px;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: rgba(0, 0, 0, 0.03);
            width: 100%;
        }

        .contact-item:hover {
            background: rgba(0, 0, 0, 0.06);
            transform: translateX(3px);
        }

        .contact-item i {
            width: 16px;
            color: var(--border-top);
            font-size: 14px;
            text-align: center;
        }

        .contact-item span {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .qr-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            gap: 15px;
        }

        .qr-code {
            width: 150px;
            height: 150px;
            padding: 10px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .scan-text {
            font-size: 14px;
            color: #666;
            font-weight: 500;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card-container">
            <div class="business-card" onclick="this.classList.toggle('flipped')">
                <div class="front">
                    <div class="card-content">
                        <div class="header-section">
                            <img class="org-logo"
                                src="{{ isset($organization) && $organization->logo ? asset($organization->logo) : asset('assets/media/logos/default.png') }}"
                                alt="{{ isset($organization) ? $organization->name : 'Organization' }}">
                            <h1 class="org-name">{{ isset($organization) ? $organization->name : '' }}</h1>
                            <p class="user-title">{{ $userDetails->title }}</p>
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
                            @if(isset($organization) && $organization->website)
                            <a href="{{ $organization->website }}" target="_blank" class="contact-item">
                                <i class="fas fa-globe"></i>
                                <span>{{ $organization->website }}</span>
                            </a>
                            @endif
                            @if(isset($organization) && $organization->address)
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $organization->address }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @php
                $qrCodeUrl = url('/company/'.$userDetails->username);
                $formUrl = url('/form') . '?url=' . urlencode($qrCodeUrl) . '&useerid=' . $userDetails->id;
                @endphp

                <div class="back">
                    <div class="qr-section">
                        <img class="qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $qrCodeUrl }}" alt="QR Code">
                        <p class="scan-text">Scan to connect</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>