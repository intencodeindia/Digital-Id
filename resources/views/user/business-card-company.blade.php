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

        .front,
        .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            padding: 10px 10px;
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
            flex-direction: row;
        }

        .left-section {
            flex: 2;
            padding-right: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .profile-info {
            margin-bottom: 10px;
        }

        .right-section {
            flex: 3;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 12px;
            padding-left: 10px;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .org-logo {
            width: 130px;
            height: auto;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .name {
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            text-align: center;
            color: #1a1a1a;
            margin: 0;
        }

        .title {
            font-size: 12px;
            color: #666;
            margin: 3px 0 12px;
            font-weight: 500;
        }

        .company-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--border-top);
            margin: 0 0 5px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #444;
            text-decoration: none;
            font-size: 11px;
            transition: all 0.3s ease;
            line-height: 1.2;
        }

        .contact-item:hover {
            color: var(--border-top);
            transform: translateX(3px);
        }

        .contact-item i {
            width: 14px;
            color: var(--border-top);
            font-size: 12px;
            text-align: center;
            flex-shrink: 0;
        }

        .contact-item span {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-word;
        }

        .qr-code {
            margin-top: 3rem;
            width: 120px;
            height: 120px;
            padding: 8px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .scan-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .company-info {
            font-size: 10px;
            color: #888;
            text-align: center;
            margin-top: 5px;
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
                            <img class="org-logo" 
                                 src="{{ isset($organization) && $organization->logo ? asset($organization->logo) : asset('assets/media/logos/default.png') }}" 
                                 alt="{{ isset($organization) ? $organization->name : 'Organization' }}">
                            <small class="fs-sm-1">{{ isset($organization) ? $organization->name : '' }}</small> <!-- Organization Name -->
                        </div>
                        <div class="right-section">
                        <p class="title">{{ $userDetails->title }}</p> <!-- Title -->

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
                </div>

                @php
                // Extract country code and number
                $phone = $userDetails->phone;

                // The regex pattern to match the country code and the phone number
                $pattern = '/^\+(\d{1,3})\s*(\d+)$/'; // Matches a phone number starting with '+' followed by the country code and phone number

                if (preg_match($pattern, $phone, $matches)) {
                // If the phone number matches the pattern, we extract the country code and the phone number
                $countryCode = $matches[1]; // The country code
                $number = $matches[2]; // The rest of the number without the country code
                $formattedPhone = "+" . $countryCode . " " . $number; // Format the phone as +<countryCode>
                    } else {
                    // If the phone number doesn't match the pattern, we leave it as is
                    $formattedPhone = $phone;
                    }

                    // Generate vCard data
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

                <div class="back pb-3">
                    <!-- Generate the QR code with the formUrl containing the qrCodeUrl as a parameter -->
                    <img class="qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($formUrl) }}" alt="Vcard QR Code">
                    <p class="scan-text">Scan to connect</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
