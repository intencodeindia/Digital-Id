@extends('layouts.business')
@section('title', 'Subscriptions')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <h2 class="mb-5">Subscription</h2>
            <div class="row g-5 g-xxl-10">
                <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
                    <div class="alert alert-success d-flex align-items-center p-5 mb-5">
                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">Payment Successful</h4>
                            <span>Your payment of $99 was processed successfully</span>
                            <span class="text-muted mt-1">Transaction time: Dec 15, 2023 14:30:25</span>
                        </div>
                    </div>
                    <div class="alert alert-danger d-flex align-items-center p-5 mb-5">
                        <i class="ki-duotone ki-shield-cross fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">Payment Failed</h4>
                            <span>Your payment of $199 was declined. Please try again.</span>
                            <span class="text-muted mt-1">Transaction time: Dec 15, 2023 15:45:12</span>
                        </div>
                    </div>
                    <div class="alert alert-warning d-flex align-items-center p-5">
                        <i class="ki-duotone ki-shield-slash fs-2hx text-warning me-4"><span class="path1"></span><span class="path2"></span></i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">Payment Pending</h4>
                            <span>Your payment of $149 is being processed</span>
                            <span class="text-muted mt-1">Transaction time: Dec 15, 2023 16:20:45</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection