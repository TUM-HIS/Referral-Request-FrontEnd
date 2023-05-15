<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{

    public function addPatient (){

        return view('patients.patient');
    }
    //
    public function addData(Request $request)
    {

        // return $request->all();

        $chars="QWERTYUIOPASDFGHJKLZXCVBNM1234567890";
        $numbers="1234567890";

        $randomupi='MOH-'.substr(str_shuffle($chars),0,4).'-'.substr(str_shuffle($numbers),0,3).'-'.substr(str_shuffle($chars),0,3);

        $patient = new Patient;
        $patient -> first_name = $request ->username;
        $patient -> last_name = $request->name;
        $patient -> dob = $request ->dob;
        $patient -> idNo = $request->id;
        $patient -> gender = $request ->gender;
        $patient -> country = $request->country;
        $patient -> countyOfBirth = $request ->countyOfBirth;
        $patient -> telephone = $request->telephone;
        $patient -> telephone1 = $request ->telephone1;
        $patient -> county = $request->country;
        $patient -> subCounty = $request ->subCounty;
        $patient -> village = $request->location;
        $patient -> landmark = $request ->landmark;
        $patient -> address = $request->address;
        $patient -> kinName = $request ->kinName;
        $patient -> relationship = $request ->relationship;
        $patient -> kinResidence = $request->address;
        $patient -> kinTelephone = $request ->kinTelephone;
        $patient -> mail = $request ->mail;
        $patient -> upi = $randomupi;
        $patient -> save();

        return redirect()->back()->with('success', 'Patient registered successfully');
    }

}
