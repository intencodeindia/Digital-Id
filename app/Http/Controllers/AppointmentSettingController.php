<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointmentSettings = AppointmentSetting::where('user_id', Auth::user()->id)->get();
        return view('user.appointment', compact('appointmentSettings'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'base_price' => 'required|numeric|min:0',
            'available_days' => 'required|array',
            'working_hours_start' => 'required|date_format:H:i',
            'working_hours_end' => 'required|date_format:H:i|after:working_hours_start',
            'slot_duration' => 'required|integer|min:15',
            'break_time' => 'required|integer|min:0',
            'max_appointments' => 'required|integer|min:1'
        ]);

        $appointmentSetting = AppointmentSetting::create([
            'base_price' => $request->base_price,
            'available_days' => json_encode($request->available_days),
            'working_hours_start' => $request->working_hours_start,
            'working_hours_end' => $request->working_hours_end,
            'slot_duration' => $request->slot_duration,
            'break_time' => $request->break_time,
            'max_appointments' => $request->max_appointments,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('appointment.settings')->with('success', 'Appointment settings saved successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppointmentSetting $appointmentSetting)

    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppointmentSetting $appointmentSetting)
    {
        //
        $appointmentSetting->delete();
        return redirect()->route('appointment.settings')->with('success', 'Appointment settings deleted successfully');
    }
}
