@extends('layouts.user')
@section('title', 'Digital Id')
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
                                <a class="nav-link text-active-primary py-5 me-6" href="{{ route('digital-id', ['id' => $organization->id]) }}">
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
                        <h2 class="text-center mb-0">Digital ID Card</h2>
                        <button type="button" class="btn" onclick="shareCard()">
                        <i class="ki-duotone ki-send fs-info fs-1 fw-bold text-dark"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                             Share Card
                        </button>
                    </div>
                </div>

                <div class="card card-flush h-xl-100">
                    <div class="card-body">
                        <h2 class="text-center">Digital ID Card</h2>
                        <div class="mt-n20 position-relative">
                            <div class="row mt-5">
                                <iframe id="digitalIdIframe" frameborder="0" width="100%" height="450px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal for Selecting or Adding Organization -->
<div class="modal fade" id="selectOrganizationModal" tabindex="-1" aria-labelledby="selectOrganizationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectOrganizationModalLabel">Select or Add Organization</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(count($organizations) == 0)
                <p>No organizations linked to your account. Click below to add a new organization.</p>
                <a href="{{ url('add-organization') }}" class="btn btn-primary">
                    Add Organization
                </a>
                @else
                <p>Select an organization from the list below.</p>
                <ul>
                    @foreach($organizations as $organization)
                    <li><a href="javascript:void(0);" onclick="selectOrganization('{{ $organization->id }}')">{{ $organization->name }}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Pass PHP variables to JavaScript using a safer approach
    const config = {
        organizationsCount: parseInt('{{ count($organizations) }}'),
        baseUrl: '{{ url("digital-id") }}',
        cardUrl: '{{ url("card/".$userDetails->username) }}'
    };

    // Function to get the organization ID from the URL
    function getOrganizationIdFromUrl() {
        const path = window.location.pathname;
        const parts = path.split('/');
        return parts.length > 2 ? parts[2] : null;
    }

    window.onload = function() {
        const organizationId = getOrganizationIdFromUrl();
        const isDigitalIdPage = window.location.pathname.includes('digital-id');

        // If no organization ID in the URL, no organizations linked, and on digital-id page, show modal
        if (isDigitalIdPage && config.organizationsCount === 0) {
            var modal = new bootstrap.Modal(document.getElementById('selectOrganizationModal'));
            modal.show();
        }

        // If an organization ID is present, update the iframe
        if (organizationId) {
            updateIframe(organizationId);
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
        document.getElementById('digitalIdIframe').src = iframeUrl;
    }

    function shareCard() {
        const organizationId = getOrganizationIdFromUrl();
        const url = config.cardUrl + "/" + organizationId;

        if (navigator.share) {
            navigator.share({
                title: 'My Digital ID Card',
                text: 'Check out my digital ID card!',
                url: url
            }).catch(function(error) {
                console.log('Error sharing:', error);
            });
        } else {
            navigator.clipboard.writeText(url)
                .then(function() {
                    alert('Digital ID Card link copied to clipboard!');
                })
                .catch(function(err) {
                    alert('Failed to copy link');
                });
        }
    }
</script>
@endpush

@endsection