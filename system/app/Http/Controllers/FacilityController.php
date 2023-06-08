<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_f_l_s;
use App\Models\User;

class FacilityController extends Controller
{
    public function select(Request $request)
    {
        $user = auth()->user();
        $Code = $request->input('facility_id');

        $facility = m_f_l_s::find($Code);

        if ($facility && $user) {
            $user->facility_id = $facility->id;
            $user->save();
        }

        return redirect()->route('user.dashboard');
    }
}