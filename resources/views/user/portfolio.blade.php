@extends('layouts.user')
@section('title', 'Portfolio')
@section('content')

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <h2 class="mb-5">Portfolio</h2>

        <!-- Add Portfolio Button -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-danger hover-scale flex-shrink-0" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">Add Portfolio</button>
            </div>
        </div>

        <!-- Add Portfolio Modal -->
        <div class="modal fade" id="addPortfolioModal" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPortfolioModalLabel">Add Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="video">Video</option>
                                    <option value="image">Image</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Items List -->
        <div class="row g-5 g-xxl-10">
            @if($portfolios->count() > 0)
            @foreach ($portfolios as $portfolio)
            <div class="col-md-4">
                <div class="card-xl-stretch mb-5">
                    <!-- Image or Video -->
                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ asset('UserUploads/Portfolio/' . $portfolio->file_path) }}">
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{ asset('UserUploads/Portfolio/' . $portfolio->file_path) }}')">
                        </div>
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                            <i class="ki-duotone ki-eye fs-2x text-white"></i>
                        </div>
                    </a>
                    <!-- Portfolio Details -->
                    <div class="mt-5">
                        <a href="#" class="fs-4 text-gray-900 fw-bold text-hover-primary">
                            {{ $portfolio->title }}
                        </a>
                        <div class="fw-semibold fs-5 text-gray-600 mt-3">
                            {{ $portfolio->description }}
                        </div>
                        <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                            <span class="badge border border-dashed fs-2 fw-bold text-gray-900 p-2">
                                <span class="fs-6 fw-semibold text-gray-500">$</span>
                                {{ $portfolio->price ?? 'N/A' }}
                            </span>
                            <a href="{{ route('user.portfolio-view', $portfolio->id) }}" class="btn btn-sm btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <div class="card card-flush h-xl-100">
                    <div class="card-body text-center py-15">
                        <i class="ki-duotone ki-document fs-5x text-muted mb-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <h3 class="text-gray-800 mb-3">No Documents Found</h3>
                        <p class="text-gray-600 mb-5">Click the "Add Portfolio" button above to upload your first portfolio.</p>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                            Upload Portfolio
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    @endsection