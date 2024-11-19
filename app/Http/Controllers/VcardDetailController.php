<?php

namespace App\Http\Controllers;

use App\Models\VcardDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VcardDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $vcardDetails = VcardDetail::where('user_id', $user->id)->get();
        return view('user.vcard-details', compact('vcardDetails'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VcardDetail $vcardDetail)
    {
        //
        $user = Auth::user();
        $vcardDetail = VcardDetail::where('id', $vcardDetail->id)->get();
        return view('user.vcard-details', compact('vcardDetail'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VcardDetail $vcardDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VcardDetail $vcardDetail)
    {
        //
        $vcardDetail->delete();
        return redirect()->route('vcard-details.index')->with('success', 'Vcard detail deleted successfully');
    }
}
