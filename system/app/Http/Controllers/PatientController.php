<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\County;

use App\Models\Patient;
use App\Models\Subcounty;
use App\Rules\NotInFuture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{

    public function addPatient()
    {
        $counties = County::all();
        return view('patients.newPatient', compact('counties'));
    }

    public function addData(Request $request)
    {

        $request->validate([

            'dob' => ['required', 'date', new NotInFuture],
        ]);

        // return $request->all();

        $chars = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890";
        $numbers = "1234567890";

        $randomupi = 'MOH-' . substr(str_shuffle($chars), 0, 4) . '-' . substr(str_shuffle($numbers), 0, 3) . '-' . substr(str_shuffle($chars), 0, 3);

        $patient = new Patient;
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->name;
        $patient->dob = $request->dob;
        $patient->idNo = $request->id;
        $patient->gender = $request->gender;
        $patient->country = $request->country;
        $patient->countyOfBirth = $request->county;
        $patient->telephone = $request->telephone;
        $patient->telephone1 = $request->telephone1;
        $patient->county = $request->country;
        $patient->subCounty = $request->subCounty;
        $patient->village = $request->location;
        $patient->landmark = $request->landmark;
        $patient->address = $request->address;
        $patient->kinName = $request->kinName;
        $patient->relationship = $request->relationship;
        $patient->kinResidence = $request->address;
        $patient->kinTelephone = $request->kinTelephone;
        $patient->mail = $request->mail;
        $patient->upi = $randomupi;
        $patient->save();

        return redirect()->back()->with('success', 'Patient registered successfully');
    }

    public function getSubcounties($county_id)
    {
        $subcounties = Subcounty::where('county_id', $county_id)->pluck('constituency_name', 'id');

        // Convert the collection to an array and remove duplicates
        $uniqueSubcounties = array_unique($subcounties->toArray());

        // Create a new array with unique subcounties and their corresponding IDs
        $result = [];
        foreach ($uniqueSubcounties as $id => $name) {
            $result[$id] = $name;
        }

        return response()->json($result);
    }

    public function getWards($constituency_name)
    {
        $wards = Subcounty::where('constituency_name', $constituency_name)->pluck('ward', 'id');
        dd($wards);
        return response()->json($wards);
    }


    public function searchPatient()
    {
        return view('patients.search');
    }

    public function search(Request $request)
    {
        $idNo = $request->input('idNo');

        // Perform the search logic using the $idNo
        $patient = Patient::where('idNo', $idNo)->first();

        if ($patient) {
            // Patient found
            return view('patients.viewPatient', ['patient' => $patient]);
        } else {
            // Patient not found
            return view('patients.patientNotFound');
        }
    }

    public function viewPatient(Patient $patient)
    {
        $patientDetails = Patient::where('id', $patient->id)->first();

        return view('patients.viewPatient', compact('patient', 'patientDetails'));
    }

    public function getPatientsCount(Request $request)
    {
        $period = $request->query('period');
        $patientsCount = 0;

        // Query the database based on the selected period
        if ($period === 'today') {
            $patientsCount = Patient::whereDate('created_at', today())->count();
        } elseif ($period === 'this_month') {
            $patientsCount = Patient::whereMonth('created_at', now()->month)->count();
        } elseif ($period === 'this_year') {
            $patientsCount = Patient::whereYear('created_at', now()->year)->count();
        }

        return response()->json($patientsCount);
    }
}
