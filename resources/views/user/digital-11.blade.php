@extends('layouts.user')
@section('title', 'Digital Id')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="row g-5 g-xxl-10">
             <div class="text-end">
                <a href="{{ url('business-card') }}" class="btn btn-sm btn-danger hover-scale flex-shrink-0 me-2">View Business Card</a>
                <a href="{{ url('profile') }}" class="btn btn-sm btn-danger hover-scale flex-shrink-0">Update Profile</a>
            </div>
            <div class="col-xl-12 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px" style="background-image:url('/good/assets/media/svg/shapes/top-green.png')">
                        <h3 class="card-title align-items-start flex-column pt-15">
                            <span class="fw-bold fs-2x">My Digital ID</span>
                        </h3>
                    </div>
                    <div class="card-body mt-n20">
                        <div class="mt-n20 position-relative">
                            <div class="row g-3 g-lg-6">
                                
                            </div>
                        <iframe src="{{ url('card') }}" frameborder="0" width="100%" height="500px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection