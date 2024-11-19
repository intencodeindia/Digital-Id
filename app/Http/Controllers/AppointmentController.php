<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;  // Assuming the appointments are linked to users (clients)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all appointments
        $user = Auth::user();
        $appointments = Appointment::with('user', 'service')->where('user_id', $user->id)->orderBy('appointment_time', 'desc')->get();  // Load all appointments for the user and orderby

        return view('user.appointment', compact('appointments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|date',
            'duration_minutes' => 'required|integer|min:1',
            'status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create appointment
        $appointment = Appointment::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'appointment_time' => $request->appointment_time,
            'duration_minutes' => $request->duration_minutes,
            'status' => $request->status ?? 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        // Show the appointment details
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // Fetch services to display in the edit form
        $services = Service::all();

        return view('appointments.edit', compact('appointment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|date',
            'duration_minutes' => 'required|integer|min:1',
            'status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the appointment
        $appointment->update([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'appointment_time' => $request->appointment_time,
            'duration_minutes' => $request->duration_minutes,
            'status' => $request->status ?? 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}
