<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business Card</title>

    <!-- bootstrap 5 -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        .card-container {
            width: 2in;
            height: 3.5in;
            margin: 20px;
            position: relative;
            visibility: hidden;
            position: absolute;
        }

        .business-card {
            position: relative;
            width: 100%;
            height: 100%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            cursor: pointer;
            transform-style: preserve-3d;
            transition: transform 0.5s ease-in-out;
        }

        .business-card.flip {
            transform: rotateY(180deg);
        }

        .front,
        .back {
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
            /* overflow: hidden; */
            box-sizing: border-box;
        }

        .back {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        .card-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            gap: 15px;
            text-wrap: wrap;
        }

        .left-content {
            flex: 3;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-wrap: wrap;

        }

        .right-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-wrap: wrap;

        }

        .logo {
            width: 100px;
            height: 80px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .name {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
            letter-spacing: 0.5px;
            text-align: center;
        }

        .title {
            font-size: 10px;
            color: #666;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        .contact-info {
            font-size: 8px;
            color: #444;
            line-height: 1.4;
        }

        .contact-info p {
            margin: 4px 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .contact-info i {
            width: 14px;
            color: #3498db;
            font-size: 11px;
        }

        .qr-code {
            width: 120px;
            height: 120px;
            padding: 6px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 6px solid transparent;
            border-image: linear-gradient(90deg, #fbd45c, #010409) 1;
            border-radius: 8px;
            /* pointer-events: none; */
        }

        .generated-image {
            width: 100%;
            height: 100%;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s;
            cursor: pointer;
        }

        .generated-image:hover {
            transform: scale(1.05);
        }

        .logo {
            width: 100%;
        }


        .logo1 {
            width: min(130px, 100%);
            /* Adjust size as needed */
            height: auto;
            margin-top: 5px;
            /* Optional: Adds space above the image */
            text-align: center;
            padding-left: 30px;
        }

        .logo2 {
            position: absolute;
            top: 0;
            right: -20;
            bottom: 0;
            width: 80%;
            /* Adjust size as needed */
            height: auto;
            margin-top: 15px;
            /* Optional: Adds space above the image */
            text-align: center;
        }

        .scan1 {
            position: absolute;
            top: 10;
            font-size: 10px;
            right: -20;
            bottom: 0;
            margin-top: -10px;
            /* Optional: Adds space above the image */
            text-align: center;
        }

        .uppercase {
            text-transform: uppercase;
        }
    </style>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</head>

<body>
    <div class="card-container">
        <div class="business-card">
            <div class="front">
                <div class="card-content">
                    <div class="right-content">
                       <div width="100px" height="100px">
                       <img
                            id="front-logo"
                            src="{{ $userDetails->profile_photo ? asset('uploads/avatars/' . $userDetails->profile_photo) : asset('assets/media/avatars/300-1.webp') }}"
                            alt="Company Logo"
                            class="logo"
                                style="border-radius: 50%;"
                                crossorigin="anonymous" />
                        </div>
                    </div>
                    <div class="left-content decoration-none text-dark">
                        <h1 class="name uppercase">{{$userDetails->name ?? 'Your Name'}}</h1>
                        <p class="title">{{$userDetails->title ?? 'Your Title'}}</p>

                        <div class="contact-info">
                            <p>
                                <i class="fas fa-envelope"></i>
                                {{$userDetails->email ?? 'Your Email'}}
                            </p>
                            <p><i class="fas fa-phone"></i> {{$userDetails->phone ?? 'Your Phone'}}</p>
                            <p><i class="fas fa-globe"></i> {{$userDetails->website ?? 'Your Website'}}</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{$userDetails->address ?? 'Your Address'}}</p>
                        </div>

                        <img
                            id="front-logo"
                            src="{{ $userDetails->organization_logo ? asset('uploads/organization_logo/' . $userDetails->organization_logo) : asset('assets/media/logos/kenzorganic.png') }}"
                            alt="Company"
                            class="logo1"
                            crossorigin="anonymous" />
                    </div>
                </div>
                <div class="accent"></div>
            </div>

            <div class="back">

                <!-- Place the QR Code inside the back -->
                <img
                    id="front-logo"
                    src="{{ $userDetails->organization_logo ? asset('uploads/organization_logo/' . $userDetails->organization_logo) : asset('assets/media/logos/kenzorganic.png') }}"
                    alt="Company"
                    class="logo2"
                    crossorigin="anonymous" />

                <!-- QR Code Image -->
                 <?php
                 $qrCodeUrl = $userDetails->website ? $userDetails->website : 'https://proffid.com/';
                ?>
                <img
                    src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $qrCodeUrl }}"
                    alt="QR Code"
                    class="qr-code"
                    crossorigin="anonymous" />

                <div class="accent"></div>
                <br />
                <h4 class="scan1">Connect to Scan</h4>
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
                    style="cursor: pointer; display: block;" /> <!-- Initially visible -->
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <img
                    id="generated-card-back"
                    class="generated-image img-fluid"
                    alt="Generated Business Card Back"
                    onclick="toggleImages()"
                    style="cursor: pointer; display: none;" /> <!-- Initially hidden -->
            </div>
        </div>
    </div>

    <script>
        function toggleImages() {
            const frontImage = document.getElementById("generated-card-front");
            const backImage = document.getElementById("generated-card-back");

            // Toggle visibility
            if (frontImage.style.display === "none") {
                frontImage.style.display = "block";
                backImage.style.display = "none";
            } else {
                frontImage.style.display = "none";
                backImage.style.display = "block";
            }
        }
    </script>

    <script>
        window.onload = async function() {
            const cardContainer = document.querySelector(".card-container");
            const businessCard = document.querySelector(".business-card");
            const frontImage = document.getElementById("generated-card-front");
            const backImage = document.getElementById("generated-card-back");
            const backQrCode = document.getElementById("back-qr-code");

            // Make card container temporarily visible for capture
            cardContainer.style.visibility = "visible";
            cardContainer.style.position = "fixed";

            // Capture front image
            try {
                const frontCanvas = await html2canvas(
                    cardContainer.querySelector(".front"), {
                        useCORS: true,
                        allowTaint: true,
                        logging: false,
                        scale: 3, // Increase scale for higher quality image
                    }
                );

                frontImage.src = frontCanvas.toDataURL("image/png");

                // Capture back image (we need to make sure the back is visible)
                businessCard.style.transform = "rotateY(180deg)"; // Rotate the card to show back side
                await new Promise((resolve) => setTimeout(resolve, 100)); // Ensure rotation is applied before capture
                const backCanvas = await html2canvas(
                    cardContainer.querySelector(".back"), {
                        useCORS: true,
                        allowTaint: true,
                        logging: false,
                        scale: 3, // Increase scale for higher quality image
                    }
                );
                backImage.src = backCanvas.toDataURL("image/png");

                // Hide original card container
                cardContainer.style.visibility = "";
                cardContainer.style.position = "";

                // Add click event listeners to flip between front and back images
                frontImage.addEventListener("click", function() {
                    businessCard.classList.add("flip");
                });

                backImage.addEventListener("click", function() {
                    businessCard.classList.remove("flip");
                });
            } catch (error) {
                console.error("Error generating card images:", error);
            }
        };
    </script>

    <!-- bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>