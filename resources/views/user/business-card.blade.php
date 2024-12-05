<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business Card</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        .biz-card-wrapper {
            width: 3.5in;
            /* Swapped dimensions */
            height: 2in;
            margin: 20px;
            position: relative;
            visibility: hidden;
            position: absolute;
        }

        .biz-card {
            position: relative;
            width: 100%;
            height: 100%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            cursor: pointer;
            transform-style: preserve-3d;
            transition: transform 0.5s ease-in-out;
        }

        .biz-card.flip {
            transform: rotateY(180deg);
        }

        .biz-card-front,
        .biz-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-width: 5px;
            border-style: solid;
            border-top-color: #fbd45c;
            border-right-color: #010409;
            border-bottom-color: #010409;
            border-left-color: #fbd45c;
            border-radius: 8px;
            padding: 15px;
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }

        .biz-card-back {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            /* No flipping transform here */
        }

        .biz-card-content {
            display: flex;
            flex-direction: row;
            /* Changed to row for horizontal layout */
            height: 100%;
            gap: 15px;
            text-wrap: wrap;
        }

        .biz-card-left {
            flex: 3;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-wrap: wrap;
        }

        .biz-card-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
            text-wrap: wrap;
        }

        .biz-card-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .biz-card-name {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
            letter-spacing: 0.5px;
            text-align: left;
        }

        .biz-card-title {
            font-size: 10px;
            color: #666;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: left;
        }

        .biz-card-info {
            font-size: 8px;
            color: #444;
            line-height: 1.4;
        }

        .biz-card-info p {
            margin: 4px 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .biz-card-info i {
            width: 14px;
            color: #3498db;
            font-size: 11px;
        }

        .biz-card-qr {
            width: 80px;
            height: 80px;
            padding: 6px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .biz-card-border {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 6px solid transparent;
            border-image: linear-gradient(90deg, #3498db, #2980b9) 1;
            border-radius: 8px;
        }

        .biz-card-preview {
            width: 100%;
            height: 100%;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s;
            cursor: pointer;
        }

        .biz-card-preview:hover {
            transform: scale(1.05);
        }

        .biz-logo-main {
            width: 80px;
            height: 80px;
        }

        .biz-logo-secondary {
            width: 80px;
            height: auto;
            margin-top: 5px;
            text-align: right;
        }

        .biz-logo-back {
            position: absolute;
            top: 4%;
            right: 38%;
            width: 80px;
            height: auto;
            opacity: 1;
        }

        .biz-scan-text {
            position: absolute;
            bottom: 10px;
            font-size: 10px;
            text-align: center;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</head>

<body>
    <div class="biz-card-wrapper">
        <div class="biz-card">
            <div class="biz-card-front">
                <div class="biz-card-content">

                    <div class="biz-card-right">
                        <img id="front-logo" src="{{ $userDetails->organization_logo ? asset('uploads/organization_logo/' . $userDetails->organization_logo) : asset('assets/media/logos/kenzorganic.png') }}" alt="Company"
                            class="biz-logo-secondary" crossorigin="anonymous" />
                        <img id="front-logo" src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('assets/media/avatars/300-1.webp') }}" alt="Company Logo"
                            class="biz-logo-main rounded-circle" crossorigin="anonymous" />
                    </div>
                    <div class="biz-card-left decoration-none text-dark">

                        <h1 class="biz-card-name">{{$userDetails->name ?? 'Your Name'}}</h1>
                        <p class="biz-card-title">{{$userDetails->title ?? 'Your Title'}}</p>

                        <div class="biz-card-info">
                            <p>
                                <i class="fas fa-envelope"></i>
                                {{$userDetails->email ?? 'Your Email'}}
                            </p>
                            <p><i class="fas fa-phone"></i> {{$userDetails->phone ?? 'Your Phone'}}</p>
                            <p><i class="fas fa-globe"></i> {{$userDetails->website ?? 'Your Website'}}</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{$userDetails->address ?? 'Your Address'}}</p>
                        </div>


                    </div>
                </div>
                <div class="biz-card-border"></div>
            </div>

            <div class="biz-card-back">
                <img id="front-logo" src="{{ $userDetails->organization_logo ? asset('uploads/organization_logo/' . $userDetails->organization_logo) : asset('assets/media/logos/kenzorganic.png') }}" alt="Company"
                    class="biz-logo-back" crossorigin="anonymous" />

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

                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($vcardData) }}"
                        alt="QR Code" class="biz-card-qr" crossorigin="anonymous" />

                    <div class="biz-card-border"></div>
                    <h4 class="biz-scan-text">Connect to Scan</h4>
            </div>
        </div>
    </div>

    <div class="container mt-5 justify-content-center">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <img
                    id="generated-card-front"
                    class="generated-image img-fluid"
                    alt="Generated Business Card Front"
                    onclick="toggleImages()"
                    style="cursor: pointer; width: 100%;" />
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <img
                    id="generated-card-back"
                    class="generated-image img-fluid"
                    alt="Generated Business Card Back"
                    onclick="toggleImages()"
                    style="cursor: pointer; display: none; width: 100%;" />
            </div>
        </div>
    </div>

    <script>
        function toggleImages() {
            const frontImage = document.getElementById("generated-card-front");
            const backImage = document.getElementById("generated-card-back");

            // Toggle display property directly
            if (frontImage.style.display !== "none") {
                frontImage.style.display = "none";
                backImage.style.display = "block";
            } else {
                frontImage.style.display = "block";
                backImage.style.display = "none";
            }
        }
    </script>

    <script>
        window.onload = async function() {
            const bizCardWrapper = document.querySelector(".biz-card-wrapper");
            const bizCard = document.querySelector(".biz-card");
            const bizFrontPreview = document.getElementById("generated-card-front");
            const bizBackPreview = document.getElementById("generated-card-back");

            bizCardWrapper.style.visibility = "visible";
            bizCardWrapper.style.position = "fixed";

            try {
                const bizFrontCanvas = await html2canvas(bizCardWrapper.querySelector(".biz-card-front"), {
                    useCORS: true,
                    allowTaint: true,
                    logging: false,
                    scale: 3,
                });

                bizFrontPreview.src = bizFrontCanvas.toDataURL("image/png");

                bizCard.style.transform = "rotateY(180deg)";
                await new Promise((resolve) => setTimeout(resolve, 100));
                const bizBackCanvas = await html2canvas(bizCardWrapper.querySelector(".biz-card-back"), {
                    useCORS: true,
                    allowTaint: true,
                    logging: false,
                    scale: 3,
                });
                bizBackPreview.src = bizBackCanvas.toDataURL("image/png");

                bizCardWrapper.style.visibility = "";
                bizCardWrapper.style.position = "";

                bizFrontPreview.addEventListener("click", function() {
                    bizCard.classList.add("flip");
                });

                bizBackPreview.addEventListener("click", function() {
                    bizCard.classList.remove("flip");
                });
            } catch (error) {
                console.error("Error generating biz card images:", error);
            }
        };
    </script>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>