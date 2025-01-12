<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business Card</title>
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
            --accent-color: {{ $organization->border_color_top ?? '#fbd45c' }};
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        .card-container {
            width: 3.5in;
            height: 2in;
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

        .front, .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            padding: 10px;
            background-color: var(--bg-color);
            border-width: 5px;
            border-style: solid;
            border-color: var(--border-top) var(--border-right) var(--border-bottom) var(--border-left);
        }

        .back {
            transform: rotateY(180deg);
        }

        .card-content {
            display: grid;
            grid-template-columns: 0.8fr 1fr;
            gap: 15px;
            height: 100%;
            position: relative;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .org-logo {
            width: 100px;
            height: auto;
            object-fit: contain;
            margin-bottom: 8px;
        }

        .name {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 8px 0 3px;
            text-align: center;
        }

        .title {
            font-size: 12px;
            color: #666;
            margin: 0 0 5px;
            font-weight: 500;
            text-align: center;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #444;
            text-decoration: none;
            font-size: 11px;
            padding: 6px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: rgba(0, 0, 0, 0.03);
        }

        .contact-item:hover {
            background: rgba(0, 0, 0, 0.06);
            transform: translateX(3px);
        }

        .contact-item i {
            width: 14px;
            color: var(--border-top);
            font-size: 12px;
            text-align: center;
        }

        .contact-item span {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .back {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .qr-code {
            width: 140px;
            height: 140px;
            padding: 8px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .scan-text {
            font-size: 12px;
            color: #666;
            margin-top: 8px;
            font-weight: 500;
        }

        .accent-line {
            width: 60px;
            height: 3px;
            background: var(--border-top);
            margin: 8px auto;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card-container">
            <div class="business-card" onclick="this.classList.toggle('flipped')">
                <div class="front">
                    <div class="card-content">
                        <div class="left-section">
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
                        <div class="right-section">
                            <img class="org-logo" 
                                src="{{ isset($organization) && $organization->logo ? asset($organization->logo) : asset('assets/media/logos/default.png') }}" 
                                alt="{{ isset($organization) ? $organization->name : 'Organization' }}">
                            <div class="name">{{ $userDetails->name }}</div>
                            <div class="title">{{ $userDetails->title }}</div>
                            <div class="accent-line"></div>
                        </div>
                    </div>
                </div>

                @php
                $phone = $userDetails->phone;
                $pattern = '/^\+(\d{1,3})\s*(\d+)$/';
                if (preg_match($pattern, $phone, $matches)) {
                    $countryCode = $matches[1];
                    $number = $matches[2];
                    $formattedPhone = "+" . $countryCode . " " . $number;
                } else {
                    $formattedPhone = $phone;
                }

                $vcardData = "BEGIN:VCARD\n"
                    . "VERSION:3.0\n"
                    . "FN:" . $userDetails->name . "\n"
                    . "TITLE:" . $userDetails->title . "\n"
                    . "ORG:" . $userDetails->organization . "\n"
                    . "TEL;TYPE=CELL:" . $formattedPhone . "\n"
                    . "EMAIL:" . $userDetails->email . "\n"
                    . "URL:" . $userDetails->website . "\n"
                    . "ADR:" . $userDetails->address . "\n"
                    . "NOTE:" . $userDetails->note . "\n"
                    . "END:VCARD";
                @endphp

                @php
                // Generate the form URL with qrCodeUrl as a query parameter
                $formUrl = url('/form/'.$userDetails->username) . '?for=vcard';
                @endphp

                <div class="back">
                  
                    <img class="qr-code" 
                        src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($formUrl) }}" 
                        alt="QR Code">
                    <p class="scan-text">Scan to Connect</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
