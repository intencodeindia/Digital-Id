<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;  // Assuming the appointments are linked to users (clients)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\GeneralHtmlEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch the authenticated user
    $user = Auth::user();
    $userDetails = User::find($user->id);

    // Fetch upcoming appointments (appointments in the future)
    $upcomingAppointments = Appointment::with('user', 'service')  // eager load user and service relationships
        ->where('user_id', $user->id)
        ->where('status', '!=', 'cancelled')
        ->where('appointment_time', '>', Carbon::now())  // Only appointments in the future
        ->orderBy('appointment_time', 'asc')  // Order by earliest appointment first
        ->get();

    // Fetch past appointments (appointments in the past)
    $pastAppointments = Appointment::with('user', 'service')  // eager load user and service relationships
        ->where('user_id', $user->id)
        ->where('status', '!=', 'cancelled')
        ->where('appointment_time', '<', Carbon::now())  // Only appointments in the past
        ->orderBy('appointment_time', 'desc')  // Order by most recent appointment first
        ->get();

    // Fetch cancelled appointments
    $cancelledAppointments = Appointment::with('user', 'service')  // eager load user and service relationships
        ->where('user_id', $user->id)
        ->where('status', 'cancelled')  // Only cancelled appointments
        ->orderBy('appointment_time', 'desc')  // Order by most recent cancelled appointment first
        ->get();

    // Return the view with the relevant data
        return view('user.appointment', compact('upcomingAppointments', 'userDetails', 'pastAppointments', 'cancelledAppointments'));
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
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        // Create appointment
        $data = [
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'appointment_time' => $request->appointment_time,
            'duration_minutes' => $request->duration_minutes,
            'status' => $request->status ?? 'pending',
            'notes' => $request->notes,
        ];
        // dd($data);
        Appointment::create($data);

        $subject = "Appointment Booked Successfully";
        $content = "<strong>Hello User,</strong><br>Your appointment has been booked successfully. This is an example of an HTML email.";

        // Send the email using the GeneralHtmlEmail Mailable
        Mail::to('daritor331@kindomd.com')->send(new GeneralHtmlEmail($subject, $content));

        session()->flash('message', 'Appointment booked successfully!');
        return redirect()->route('public.profile', ['username' => 'user']);
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

        return response()->json(['message' => 'Appointment updated successfully!'], 200);
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
