@extends('layouts.user')
@section('title', 'Subscription Plans')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <div class="card card-flush">
                <div class="card-header pt-7">
                    <h2 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Choose Your Plan</span>
                    </h2>
                </div>
                <div class="card-body pt-5">
                    <div class="row g-10">
                        @foreach($plans as $plan)
                        <div class="col-xl-4">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                    <div class="mb-7 text-center">
                                        <h1 class="text-dark mb-5 fw-bold">{{ $plan->name }}</h1>
                                        <div class="text-gray-400 fw-semibold mb-5">{{ $plan->description }}</div>
                                        
                                        <div class="text-center">
                                            <span class="mb-2 text-primary">$</span>
                                            <span class="fs-3x fw-bold text-primary">{{ number_format($plan->price, 0) }}</span>
                                            <span class="fs-7 fw-semibold opacity-50">/{{ $plan->billing_interval }}</span>
                                        </div>
                                    </div>

                                    <div class="w-100 mb-10">
                                        @foreach($plan->features as $feature)
                                        <div class="d-flex align-items-center mb-5">
                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">{{ $feature }}</span>
                                            <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        @endforeach
                                    </div>

                                    <form action="{{ route('process.subscription') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <button type="submit" class="btn btn-primary">Subscribe Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 