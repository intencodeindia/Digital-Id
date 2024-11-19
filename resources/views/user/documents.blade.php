@extends('layouts.user')
@section('title', 'Documents')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row g-5 g-xxl-10">
            <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                <h2 class="mb-5">Documents</h2>
                <div class="row mb-5">
                    <div class="col-sm-12 col-xxl-12 d-flex justify-content-end">
                      
                        <button type="button" class="btn btn-sm btn-danger hover-scale flex-shrink-0" data-bs-toggle="modal" data-bs-target="#addDocumentModal">Add Document</button>
                       
                        <!-- Add Document Modal -->
                        <div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addDocumentModalLabel">Upload New Document</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('user.documents.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="documentName" class="form-label">Document Name</label>
                                                <input type="text" class="form-control form-control-solid" id="documentName" name="name" placeholder="Enter Document Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="documentId" class="form-label">Document ID</label>
                                                <input type="text" class="form-control form-control-solid" id="documentId" name="documentId" placeholder="Enter Document ID" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="document" class="form-label">Choose Document</label>
                                                <input type="file" class="form-control form-control-solid" id="document" name="document" accept=".pdf,.jpg,.png,.jpeg" required>
                                                <div class="form-text">Supported formats: PDF, JPG, PNG, JPEG(max 10MB)</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="documentType" class="form-label">Document Type</label>
                                                <select class="form-control form-control-solid" id="documentType" name="document_type" required>
                                                    <option value="">Select Document Type</option>
                                                    <option value="passport">Passport</option>
                                                    <option value="credit_card">Credit Card</option>
                                                    <option value="debit_card">Debit Card</option>
                                                    <option value="drivers_license">Driver's License</option>
                                                    <option value="national_id">National ID</option>
                                                    <option value="birth_certificate">Birth Certificate</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                                <input type="date" class="form-control form-control-solid ps-12 flatpickr-input" id="expiryDate" name="expiry_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="additionalInfo" class="form-label">Additional Information</label>
                                                <textarea class="form-control form-control-solid" id="additionalInfo" name="additional_info" rows="3"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Upload Document</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    @if($documents->count() > 0)
                        @foreach ($documents as $document)
                        <div class="col-sm-6 col-xxl-4">
                            <div class="card card-flush h-xl-100">
                                <div class="card-body text-center pb-5">
                                    <a class="d-block" href="/documents/view/{{ $document->id }}">
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                                            style="height: 180px; background-image: url('{{ in_array(pathinfo($document->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']) 
                                                ? '/UserUploads/Documents/'.$document->file_path 
                                                : 'https://placehold.co/600x400?text=' . urlencode($document->name) }}')">
                                        </div>
                                    </a>
                                    <div class="d-flex align-items-end flex-stack mb-1">
                                        <div class="text-start">
                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">
                                                {{ $document->name }}
                                            </span>
                                            <span class="text-gray-500 mt-1 fw-bold fs-6">
                                                Added: {{ \Carbon\Carbon::parse($document->added_at)->format('M d, Y') }}
                                            </span>
                                        </div>
                                        <span class="text-gray-600 text-end fw-bold fs-6">{{ strtoupper($document->file_type) }}</span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pt-0">
                                    <a class="btn btn-sm btn-light flex-shrink-0" href="/documents/view/{{ $document->id }}">
                                        <i class="ki-duotone ki-eye fs-info fs-1 text-info">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                        </i>
                                        View Document
                                    </a>
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
                                    <p class="text-gray-600 mb-5">Click the "Add Document" button above to upload your first document.</p>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addDocumentModal">
                                        Upload Document
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection