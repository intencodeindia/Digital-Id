@extends('layouts.user')
@section('title', 'Employee Business ID Card')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-12">
                <div class="card card-flush mb-5">
                    <div class="card-body d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                        <h2 class="text-center mb-0 fs-2 fs-md-1">Employee Business ID Card</h2>
                        <button type="button" class="btn btn-sm btn-light-primary" onclick="shareCard()">
                            <i class="ki-duotone ki-send fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Share Card
                        </button>
                    </div>
                </div>



                <div class="card card-flush h-xl-100">
                    <div class="card-body p-0 p-sm-3">
                        <div class="position-relative">
                            <div class="ratio ratio-16x9" style="min-height: 350px;">
                                <iframe id="businessIdIframe" class="w-100 h-100" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const config = {
        cardUrl: '{{ url("employee-business-card/".$userDetails->username) }}'
    };

    window.onload = function() {
        updateIframe();
        handleResize();
    }

    // Handle iframe resizing
    function handleResize() {
        const iframe = document.getElementById('businessIdIframe');
        const resizeObserver = new ResizeObserver(entries => {
            for (let entry of entries) {
                const width = entry.contentRect.width;
                // Maintain aspect ratio based on card dimensions (3.5in x 2in)
                const height = (width * 2) / 3.5;
                iframe.style.height = `${Math.max(450, height)}px`;
            }
        });

        resizeObserver.observe(iframe.parentElement);
    }

    function updateIframe() {
        const iframeUrl = config.cardUrl;
        document.getElementById('businessIdIframe').src = iframeUrl;
    }

    function shareCard() {
        const url = config.cardUrl;

        if (navigator.share) {
            navigator.share({
                title: 'My Business Card',
                text: 'Check out my business card!',
                url: url
            }).catch(function(error) {
                console.log('Error sharing:', error);
            });
        } else {
            navigator.clipboard.writeText(url)
                .then(function() {
                    // Use SweetAlert or similar for better UX
                    Swal.fire({
                        text: 'Business Card link copied to clipboard!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                })
                .catch(function(err) {
                    Swal.fire({
                        text: 'Failed to copy link',
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                });
        }
    }
</script>
@endpush

@endsection