@extends('layouts.user')
@section('title', 'Subscriptions')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-7">
                    <h2 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Subscription Status</span>
                    </h2>
                </div>
                <div class="card-body pt-5">
                    @if($user->isInTrialPeriod())
                        <div class="alert alert-primary d-flex align-items-center p-5">
                            <i class="ki-duotone ki-shield-tick fs-2hx text-primary me-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">Free Trial Active</h4>
                                <span>Your free trial ends in {{ $user->created_at->addDays(15)->diffInDays(now()) }} days</span>
                                <a href="{{ route('subscribe') }}" class="btn btn-primary mt-3">Subscribe Now</a>
                            </div>
                        </div>
                    @elseif($user->hasActiveSubscription())
                        <div class="alert alert-success d-flex align-items-center p-5">
                            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">Premium Subscription Active</h4>
                                <span>Valid until {{ $user->currentSubscription()->subscription_end_date->format('M d, Y') }}</span>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning d-flex align-items-center p-5">
                            <i class="ki-duotone ki-shield-slash fs-2hx text-warning me-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">No Active Subscription</h4>
                                <span>Subscribe now to access premium features</span>
                                <a href="{{ route('subscribe') }}" class="btn btn-primary mt-3">Subscribe Now</a>
                            </div>
                        </div>
                    @endif

                    <!-- Payment History -->
                    <div class="mt-10">
                        <h3 class="card-title align-items-start flex-column mb-5">
                            <span class="card-label fw-bold text-gray-800">Payment History</span>
                        </h3>
                        
                        <div class="table-responsive">
                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                <thead>
                                    <tr class="fw-bold text-muted">
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>{{ $payment->paid_at ? $payment->paid_at->format('M d, Y H:i') : 'N/A' }}</td>
                                        <td>${{ number_format($payment->amount, 2) }}</td>
                                        <td>
                                            @if($payment->payment_status === 'PAYMENT_SUCCESS')
                                                <span class="badge badge-success">Success</span>
                                            @elseif($payment->payment_status === 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-danger">Failed</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection