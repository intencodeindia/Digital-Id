@extends('layouts.user')
@section('title', 'Leads')

@push('styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="d-flex justify-content-between align-items-center mb-5 mb-xxl-10">
            <h2>Leads</h2>
        </div>

        <div class="row g-5 g-xxl-10">
            <div class="flex-lg-row-fluid ms-lg-15">
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#contacted_leads" aria-selected="true" role="tab">Contacted Leads</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#qr_leads" aria-selected="false" role="tab" tabindex="-1">QR Leads</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#employee_leads" aria-selected="false" role="tab" tabindex="-1">Employee Leads</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="contacted_leads" role="tabpanel">
                        @include('organization.partials.leads-table', [
                            'leads' => $contactedLeads, 
                            'columns' => ['id', 'name', 'email', 'mobile', 'subject', 'message', 'created_at'],
                            'tableId' => 'contacted_leads_table'
                        ])
                    </div>

                    <div class="tab-pane fade" id="qr_leads" role="tabpanel">
                        @include('organization.partials.leads-table', [
                            'leads' => $selfLeads, 
                            'columns' => ['id', 'name', 'email', 'mobile', 'location', 'status', 'created_at'],
                            'tableId' => 'qr_leads_table'
                        ])
                    </div>

                    <div class="tab-pane fade" id="employee_leads" role="tabpanel">
                        @include('organization.partials.leads-table', [
                            'leads' => $employeeLeads, 
                            'columns' => ['id', 'name', 'email', 'mobile', 'location', 'status', 'created_at'],
                            'tableId' => 'employee_leads_table'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endpush