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
            --border-top: {
                    {
                    $organization->border_color_top ?? '#fbd45c'
                }
            }

            ;

            --border-right: {
                    {
                    $organization->border_color_right ?? '#010409'
                }
            }

            ;

            --border-bottom: {
                    {
                    $organization->border_color_bottom ?? '#010409'
                }
            }

            ;

            --border-left: {
                    {
                    $organization->border_color_left ?? '#fbd45c'
                }
            }

            ;

            --bg-color: {
                    {
                    $organization->background_color ?? '#ffffff'
                }
            }

            ;
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
            padding: 15px 20px;
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
        }

        .left-section {
            flex: 2.5;
            padding-right: 20px;
            display: flex;
            flex-direction: column;
        }

        .profile-info {
            margin-bottom: 10px;
        }

        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding-left: 20px;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .profile-photo {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-top);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .org-logo {
            width: 90px;
            height: auto;
            object-fit: contain;
        }

        .name {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
        }

        .title {
            font-size: 12px;
            color: #666;
            margin: 3px 0 12px;
            font-weight: 500;
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
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
        }

        .qr-code {
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
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card-container">
            <div class="business-card" onclick="this.classList.toggle('flipped')">
                <div class="front">
                    <div class="card-content">
                        <div class="left-section">
                            <div class="profile-info">
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
                        </div>
                        <div class="right-section">
                            <img class="profile-photo"
                                src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('assets/media/avatars/300-1.webp') }}"
                                alt="Profile Photo">
                            <img class="org-logo"
                                src="{{ $organization->logo ? asset($organization->logo) : asset('assets/media/logos/default.png') }}"
                                alt="{{ $organization->name }}">
                        </div>
                    </div>
                </div>

                <div class="back">
                    <img class="qr-code"
                        src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $organization->website ?? $userDetails->website ?? 'https://proffid.com/' }}"
                        alt="QR Code">
                    <p class="scan-text">Scan to connect</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>