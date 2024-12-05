@extends('layouts.user')
@section('title', 'Appointments')
@section('content')
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="col-xl-12 col-xxl-12 mb-5 mb-xxl-10">
            <h2 class="mb-5">Appointments</h2>
            <div class="d-flex justify-content-end mb-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentSettingsModal">
                    <i class="ki-duotone ki-setting-2 fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Appointment Settings
                </button>
            </div>
            <!-- Appointment Settings Modal -->
            <div class="modal fade" id="appointmentSettingsModal" tabindex="-1" aria-labelledby="appointmentSettingsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="appointmentSettingsModalLabel">Appointment Settings</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('appointment.settings.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="base_price" class="form-label">Base Price per Appointment</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="base_price" name="base_price" min="0" step="0.01" value="{{ $settings->base_price ?? '0.00' }}" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Available Days</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="available_days[]" value="{{ strtolower($day) }}" id="day_{{ strtolower($day) }}">
                                            <label class="form-check-label" for="day_{{ strtolower($day) }}">
                                                {{ $day }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="working_hours_start" class="form-label">Working Hours</label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="time" class="form-control" id="working_hours_start" name="working_hours_start" required>
                                        <span>to</span>
                                        <input type="time" class="form-control" id="working_hours_end" name="working_hours_end" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="slot_duration" class="form-label">Time Slot Duration (minutes)</label>
                                    <input type="number" class="form-control" id="slot_duration" name="slot_duration" min="15" step="15" value="30" required>
                                </div>
                                <div class="mb-3">
                                    <label for="break_time" class="form-label">Break Time Between Appointments (minutes)</label>
                                    <input type="number" class="form-control" id="break_time" name="break_time" min="0" step="5" value="15" required>
                                </div>
                                <div class="mb-3">
                                    <label for="max_appointments" class="form-label">Maximum Appointments per Day</label>
                                    <input type="number" class="form-control" id="max_appointments" name="max_appointments" min="1" value="10" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row g-5 g-xxl-10">

                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder active" data-bs-toggle="tab" href="#kt_tab_pane_1">Upcoming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_2">Past</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_3">Cancelled</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                        @foreach($upcomingAppointments as $appointment)
                        <div class="alert alert-success d-flex align-items-center p-5 mb-5">
                            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">Appointment Successful</h4>
                                <span>Your appointment was processed successfully</span>
                                <span class="text-muted mt-1">Appointment time: {{ $appointment->appointment_time }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                        @foreach($pastAppointments as $appointment)
                        <div class="alert alert-info d-flex align-items-center p-5 mb-5">
                            <i class="ki-duotone ki-shield-tick fs-2hx text-info me-4"><span class="path1"></span><span class="path2"></span></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">Appointment Completed</h4>
                                <span>Your appointment was completed successfully</span>
                                <span class="text-muted mt-1">Appointment time: {{ $appointment->appointment_time }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                        @foreach($cancelledAppointments as $appointment)
                        <div class="alert alert-danger d-flex align-items-center p-5 mb-5">
                            <i class="ki-duotone ki-shield-cross fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">Appointment Failed</h4>
                                <span>Your appointment was declined. Please try again.</span>
                                <span class="text-muted mt-1">Appointment time: {{ $appointment->appointment_time }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>

    @endsection