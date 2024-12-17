@extends('layouts.user')
@section('title', 'Business Id')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 mb-xl-10">
                @if(count($organizations) == 0)
                    <!-- No organizations, show modal button -->
                    <div class="card card-flush mb-5">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#selectOrganizationModal">
                                Select or Add Organization
                            </button>
                        </div>
                    </div>
                @else
                    <!-- Show organizations as a list -->
                    <div class="card card-flush mb-5">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                @foreach($organizations as $organization)
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary py-5 me-6" 
                                           href="{{ route('business-id-card.show', ['id' => $organization->id]) }}">
                                            {{ $organization->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card card-flush mb-5">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="text-center mb-0">Business ID Card</h2>
                        <button type="button" class="btn" onclick="shareCard()">
                            <i class="ki-duotone ki-send fs-info fs-1 fw-bold text-dark">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Share Card
                        </button>
                    </div>
                </div>

                <div class="card card-flush h-xl-100">
                    <div class="card-body">
                        <div class="mt-n20 position-relative">
                            <div class="row mt-5">
                                <iframe id="businessIdIframe" frameborder="0" width="100%" height="450px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Selecting or Adding Organization -->
<div class="modal fade" id="selectOrganizationModal" tabindex="-1" aria-labelledby="selectOrganizationModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectOrganizationModalLabel">Select or Add Organization</h5>
            </div>
            <div class="modal-body">
                @if(count($organizations) == 0)
                    <p>No organizations linked to your account. Click below to add a new organization.</p>
                    <a href="{{ url('add-organization') }}" class="btn btn-primary">
                        Add Organization
                    </a>
                @else
                    <p>Select an organization from the list below.</p>
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach($organizations as $organization)
                            <button type="button" 
                                    class="btn btn-primary mb-3 me-3" 
                                    style="width: 100%;" 
                                    onclick="selectOrganization('{{ $organization->id }}')">
                                {{ $organization->name }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const config = {
        organizationsCount: parseInt('{{ count($organizations) }}'),
        baseUrl: '{{ url("business-id-card") }}',
        cardUrl: '{{ url("business-card/".$userDetails->username) }}'
    };

    function getOrganizationIdFromUrl() {
        const path = window.location.pathname;
        const parts = path.split('/');
        return parts.length > 2 ? parts[2] : null;
    }

    window.onload = function() {
        const organizationId = getOrganizationIdFromUrl();
        const isBusinessIdPage = window.location.pathname.includes('business-id-card');

        if (isBusinessIdPage) {
            if (config.organizationsCount === 0 || !organizationId) {
                var modal = new bootstrap.Modal(document.getElementById('selectOrganizationModal'));
                modal.show();
            }

            if (organizationId) {
                updateIframe(organizationId);
            }
        }
    }

    function selectOrganization(organizationId) {
        var newUrl = config.baseUrl + "/" + organizationId;
        window.history.pushState({}, "", newUrl);
        updateIframe(organizationId);
        var modal = bootstrap.Modal.getInstance(document.getElementById('selectOrganizationModal'));
        if (modal) {
            modal.hide();
        }
    }

    function updateIframe(organizationId) {
        var iframeUrl = config.cardUrl + "/" + organizationId;
        document.getElementById('businessIdIframe').src = iframeUrl;
    }

    function shareCard() {
        const organizationId = getOrganizationIdFromUrl();
        const url = config.cardUrl + "/" + organizationId;

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
                    alert('Business Card link copied to clipboard!');
                })
                .catch(function(err) {
                    alert('Failed to copy link');
                });
        }
    }
</script>
@endpush

@endsection