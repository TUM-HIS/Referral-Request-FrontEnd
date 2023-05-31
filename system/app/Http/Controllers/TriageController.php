<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Triage;


class TriageController extends Controller
{
    public function addTriage()
    {
        $patients = Patient::all();
        return view('triages.triage')->with(['patients' => $patients]);
    }

    public function store(Request $request)
    {
        $triage = new Triage;
        $triage->name = $request->name;
        $triage->age = $request->age;
        $triage->gender = $request->gender;
        $triage->reason_for_visit = $request->reason_for_visit;
        $triage->blood_pressure = $request->blood_pressure;
        $triage->heart_rate = $request->heart_rate;
        $triage->respiratory_rate = $request->respiratory_rate;
        $triage->temperature = $request->temperature;
        $triage->oxygen_saturation = $request->oxygen_saturation;
        $triage->pain_level = $request->pain_level;
        $triage->allergies = $request->allergies;
        $triage->medications = $request->medications;
        $triage->medical_history = $request->medical_history;
        $triage->recent_travel = $request->recent_travel;
        $triage->emergency_contact_name = $request->emergency_contact_name;
        $triage->emergency_contact_phone = $request->emergency_contact_phone;
        $triage->emergency_contact_relation = $request->emergency_contact_relation;
        $triage->save();
        return redirect()->back()->with('success', 'Triage Form Submitted successfully');
    }
}
