@extends('layouts.user')
@section('title', 'Business Id')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 mb-xl-10">
                <div class="card card-flush mb-5">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="text-center mb-0">Business ID Card</h2>
                        <button class="btn" onclick="shareCard('{{ url('business-card/'.$userDetails->username) }}')">
                            <i class="ki-duotone ki-send fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            Share Card
                        </button>
                        <script>
                            function shareCard(url) {
                                if (navigator.share) {
                                    navigator.share({
                                            title: 'My Business ID Card',
                                            text: 'Check out my business ID card!',
                                            url: url,
                                        })
                                        .catch(error => console.log('Error sharing:', error));
                                } else {
                                    // Fallback for browsers that don't support Web Share API
                                    navigator.clipboard.writeText(url)
                                        .then(() => alert('Business ID Card link copied to clipboard!'))
                                        .catch(err => alert('Failed to copy link'));
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="card card-flush h-xl-100">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="mt-n20 position-relative">
                                <div class="row mt-5">
                                    <iframe src="{{ url('business-card/'.$userDetails->username) }}" frameborder="0" width="100%" height="500px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection