@extends('layouts.user')
@section('title', 'QR Generator')
@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xxl-10">
            <!--begin::Col-->
            <div class="row g-5 g-xxl-10">
                <!-- Form Column (6 units) -->
                <div class="col-xl-6 col-xxl-6 mb-5 mb-xxl-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">QR Code Generator</h3>
                        </div>
                        <div class="card-body">
                            <form id="qrForm" class="form">
                                @csrf
                                <div class="mb-5">
                                    <label class="form-label required">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name">
                                </div>
                                <div class="mb-5">
                                    <label class="form-label required">Enter URL</label>
                                    <input type="url" class="form-control" id="url" name="url" required placeholder="https://example.com">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Generate QR Code</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- QR Code Result Column (6 units) -->
                <div class="col-xl-6 col-xxl-6 mb-5 mb-xxl-10">
                    <div class="card">
                        <div class="card-body">
                            <!-- QR Result Container -->
                            <div id="qrResult" class="text-center mt-10" style="display: none;">
                                <div class="mb-5">
                                    <img id="qrCode" src="" alt="QR Code" class="img-fluid" style="max-width: 500px; margin: 0 auto;">
                                </div>
                                <button id="saveBtn" class="btn btn-success">
                                    <i class="ki-duotone ki-save fs-2 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Save QR Code
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->

@push('scripts')
<script>
    document.getElementById('qrForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const url = document.getElementById('url').value;
        const name = document.getElementById('name').value;

        // Validate URL
        if (!url || !isValidUrl(url)) {
            Swal.fire({
                text: 'Please enter a valid URL.',
                icon: 'warning',
                timer: 2000,
                showConfirmButton: false
            });
            return;
        }

        // Validate name
        if (!name) {
            Swal.fire({
                text: 'Please enter a name.',
                icon: 'warning',
                timer: 2000,
                showConfirmButton: false
            });
            return;
        }

        // Generate the QR Code
        await generateQR(url);
    });

    async function generateQR(url) {
        try {
            // URL encode the URL input
            const encodedUrl = encodeURIComponent(url);

            // Base QR code URL with customization
            let qrUrl = `https://quickchart.io/qr?text=${encodedUrl}&size=500&dark=000000&light=ffffff&ecLevel=M`;

            // Display the QR Code
            const qrCode = document.getElementById('qrCode');
            qrCode.src = qrUrl;
            document.getElementById('qrResult').style.display = 'block';

            // Update save button click handler
            document.getElementById('saveBtn').onclick = function() {
                saveQRCode(qrUrl, url);
            };
        } catch (error) {
            console.error('Error generating QR code:', error);
            Swal.fire({
                text: 'Failed to generate QR code. Please try again.',
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        }
    }

    // Function to save the QR code to database
    async function saveQRCode(qrUrl, originalUrl) {
        try {
            const response = await fetch(qrUrl);
            const blob = await response.blob();
            const name = document.getElementById('name').value;

            const formData = new FormData();
            formData.append('qr_image', blob, 'qr_code.png');
            formData.append('url', originalUrl);
            formData.append('name', name);
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            const saveResponse = await fetch('/save-qr-code', {
                method: 'POST',
                body: formData
            });

            if (saveResponse.ok) {
                Swal.fire({
                    text: 'QR code saved successfully!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                throw new Error('Failed to save QR code');
            }
        } catch (error) {
            console.error('Error saving QR code:', error);
            Swal.fire({
                text: 'Failed to save QR code. Please try again.',
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        }
    }

    // Function to validate URL
    function isValidUrl(url) {
        const pattern = new RegExp('^(https?:\/\/)?([a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?)$', 'i');
        return pattern.test(url);
    }
</script>
@endpush

@endsection