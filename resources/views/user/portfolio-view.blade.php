@extends('layouts.user')
@section('title', 'Documents View')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Documents</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger hover-scale flex-shrink-0" href="/documents"> <i class="ki-duotone ki-arrow-left fs-info fs-1 text-light"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Back</a>
                    </div>
                </div>
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <div class="col-sm-12 col-xxl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body pb-5">
                                <div class="row">
                                    <div class="col-4">
                                        <a class="d-block overlay">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
                                                <img src="{{ asset('UserUploads/Portfolio/' . $portfolio->file_path) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-end flex-stack mb-1">
                                            <div class="text-start">
                                                <h2 class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ ucfirst($portfolio->title) }}</h2>
                                                <p class="text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ ucfirst($portfolio->description) }}</p>
                                                <br>
                                                <span class="text-gray-500 mt-1 fw-bold fs-6">Added: {{ \Carbon\Carbon::parse($portfolio->added_at)->format('d M Y') }}</span>
                                            </div>
                                            <div class="text-end">
                                                <span class="text-gray-600 text-end fw-bold fs-6">{{ $portfolio->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end pt-0">
                                <a class="btn btn-sm btn-light flex-shrink-0 me-2" onclick="confirmDelete({{ $portfolio->id }})" href="javascript:void(0)"> <i class="ki-duotone ki-trash-square fs-info fs-1 text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Delete Portfolio</a>
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "{{ url('portfoliodelete') }}/" + id;
                                            }
                                        })
                                    }
                                </script>
                                <a class="btn btn-sm btn-light flex-shrink-0 me-2" data-bs-toggle="modal" data-bs-target="#updatePortfolioModal"> <i class="ki-duotone ki-pencil fs-info fs-1 text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Update Portfolio</a>
                                <a class="btn btn-sm btn-light flex-shrink-0" href="/UserUploads/Portfolio/{{ $portfolio->file_path }}" download> <i class="ki-duotone ki-cloud-download fs-info fs-1 text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Download Portfolio</a>

                                <!-- Update Portfolio Modal -->
                                <div class="modal fade" id="updatePortfolioModal" tabindex="-1" aria-labelledby="updatePortfolioModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updatePortfolioModalLabel">Update Portfolio</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">Type</label>
                                                        <select class="form-select" id="type" name="type" required>
                                                            <option value="video" {{ $portfolio->type == 'video' ? 'selected' : '' }}>Video</option>
                                                            <option value="image" {{ $portfolio->type == 'image' ? 'selected' : '' }}>Image</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $portfolio->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $portfolio->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" class="form-control" id="price" name="price" value="{{ $portfolio->price }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="file" class="form-label">Upload New File (Optional)</label>
                                                        <input type="file" class="form-control" id="file" name="file">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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