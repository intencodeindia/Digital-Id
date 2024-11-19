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
                            <div class="card-body text-start pb-5">
                                <a class="d-block overlay text-center">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7">
                                        @if ($document->file_type === 'jpg' || $document->file_type === 'jpeg' || $document->file_type === 'png')
                                        <img src="{{ asset('UserUploads/Documents/' . $document->file_path) }}" alt="{{ $document->name }}" class="img-fluid" style="max-height: 300px;">
                                        @else
                                        <i class="ki-duotone ki-file-{{ strtolower($document->file_type) }} fs-2x text-muted"></i>
                                        @endif
                                    </div>
                                </a>
                                <div class="d-flex align-items-end flex-stack mb-1">
                                    <div class="text-start">
                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ ucfirst($document->name) }}</span>
                                        <span class="text-gray-500 mt-1 fw-bold fs-6">Added: {{ \Carbon\Carbon::parse($document->added_at)->format('d M Y') }}</span>
                                    </div>
                                    <span class="text-gray-600 text-end fw-bold fs-6">{{ strtoupper($document->file_type) }}</span>
                                </div>
                                <div class="">
                                    <p class="text-gray-500 mt-1 fw-bold fs-6">Document Type: {{ ucfirst($document->document_type) }}</p>
                                    <p class="text-gray-500 mt-1 fw-bold fs-6">Expiry Date: {{ \Carbon\Carbon::parse($document->expiry_date)->format('d M Y') }}</p>
                                    <p class="text-gray-500 mt-1 fw-bold fs-6">Additional Information: {{ $document->additional_info }}</p>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end pt-0">
                                <a class="btn btn-sm btn-light flex-shrink-0 me-2" onclick="confirmDelete({{ $document->id }})" href="javascript:void(0)"> <i class="ki-duotone ki-trash-square fs-info fs-1 text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Delete Document</a>
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
                                                window.location.href = "{{ url('documentdelete') }}/" + id;
                                            }
                                        })
                                    }
                                </script>
                                <a class="btn btn-sm btn-light flex-shrink-0 me-2" href="/UserUploads/Documents/{{ $document->file_path }}" download> <i class="ki-duotone ki-cloud-download fs-info fs-1 text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Download Document</a>
                                <button type="button" class="btn btn-sm btn-light flex-shrink-0" data-bs-toggle="modal" data-bs-target="#editDocumentModal">
                                    <i class="ki-duotone ki-pencil fs-info fs-1 text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Edit Document
                                </button>

                                <!-- Edit Document Modal -->
                                <div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="documentName" class="form-label">Document Name</label>
                                                        <input type="text" class="form-control" id="documentName" name="name" value="{{ $document->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="documentId" class="form-label">Document ID</label>
                                                        <input type="text" class="form-control" id="documentId" name="documentId" value="{{ $document->documentId }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="document" class="form-label">Update Document (Optional)</label>
                                                        <input type="file" class="form-control" id="document" name="document" accept=".pdf,.jpg,.png,.jpeg">
                                                        <div class="form-text">Supported formats: PDF, JPG, PNG, JPEG(max 10MB)</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="documentType" class="form-label">Document Type</label>
                                                        <select class="form-control" id="documentType" name="document_type" required>
                                                            <option value="passport" {{ $document->document_type == 'passport' ? 'selected' : '' }}>Passport</option>
                                                            <option value="credit_card" {{ $document->document_type == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                                            <option value="debit_card" {{ $document->document_type == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                                                            <option value="drivers_license" {{ $document->document_type == 'drivers_license' ? 'selected' : '' }}>Driver's License</option>
                                                            <option value="national_id" {{ $document->document_type == 'national_id' ? 'selected' : '' }}>National ID</option>
                                                            <option value="birth_certificate" {{ $document->document_type == 'birth_certificate' ? 'selected' : '' }}>Birth Certificate</option>
                                                            <option value="other" {{ $document->document_type == 'other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="expiryDate" class="form-label">Expiry Date</label>
                                                        <input type="date" class="form-control" id="expiryDate" name="expiry_date" value="{{ $document->expiry_date }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="additionalInfo" class="form-label">Additional Information</label>
                                                        <textarea class="form-control" id="additionalInfo" name="additional_info" rows="3">{{ $document->additional_info }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update Document</button>
                                                </div>
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
@endsection