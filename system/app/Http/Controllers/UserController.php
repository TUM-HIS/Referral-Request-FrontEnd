<?php

namespace App\Http\Controllers;

use App\Models\MFL;
use App\Models\Ref;
use App\Models\m_f_l_s;
use App\Models\Patient;
use App\Models\Facility;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware('auth', ['except' => ['signIn', 'login']]);
    }

    public function signIn(){

        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
           'username' => 'required|string',
           'password' => 'required|string',
        ]);

        $logins = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($logins, true)) {

            return redirect()->route('user.dashboard')->with('success', 'Welcome' . " " . Auth::user()->name);

        }else{

            return redirect()->back()->with('error', 'Oops!! Confirm your logins');
        }

    }

    Public function getFacilities()
    {
       $facilities = m_f_l_s::all();
       return view('auth.facility-selection', compact('facilities'));
    }


    public function select(Request $request)
    {
        $user = auth()->user();
        $Code = $request->input('facility_id');

        //$facilities = m_f_l_s::find($Code);

//        if ($facilities && $user) {
//            $user->facility_id = $facilities->$Code;
//            $user->save();
//        }

        return redirect()->route('user.dashboard');
    }

    public function dashboard(){
        if (Auth::check()){

           return redirect()->route('admin.dashboard')->with('success', 'Welcome | Logged in successfully.');
        }else{

            return redirect()->route('user.signIn')->with('warning', 'Oops!! You are logged out. Please login again');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect()->route('user.signIn')->with('info', 'You are logged out');
    }

    public function admin(){
//        return 'aricha';
        // $patients = Patient::count();
        // $physicians = User::count();
        // $referals = Referral::count();
        // $referalfeedback = Referalfeedback::count();
        $facilities = m_f_l_s::count();

        $patientsCount = Patient::whereMonth('created_at', now()->month)->count();
        $physiciansCount = User::whereMonth('created_at', now()->month)->count();
        $referralsCount = Referral::whereMonth('created_at', now()->month)->count();

        return view('admin.index', compact('facilities', 'physiciansCount','referralsCount', 'patientsCount'));
    }

    public function getPatientsCount(Request $request)
    {
        $period = $request->query('period');
        $patientsCount = 0;

        // Query the database based on the selected period
        if ($period === 'today') {
            $patientsCount = Patient::whereDate('created_at', now()->format('Y-m-d'))->count();
        } elseif ($period === 'this_month') {
            $patientsCount = Patient::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        } elseif ($period === 'this_year') {
            $patientsCount = Patient::whereYear('created_at', now()->year)->count();
        }elseif ($period === 'all') {
            $patientsCount = Patient::count();
        }

        return response()->json($patientsCount);
    }

    public function getReferralsCount(Request $request)
    {
        $period = $request->query('period');
        $referralsCount = 0;

        // Query the database based on the selected period
        if ($period === 'today') {
            $referralsCount = Referral::whereDate('created_at', now()->format('Y-m-d'))->count();
        } elseif ($period === 'this_month') {
            $referralsCount = Referral::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        } elseif ($period === 'this_year') {
            $referralsCount = Referral::whereYear('created_at', now()->year)->count();
        }elseif ($period === 'all') {
            $referralsCount = Referral::count();
        }

        return response()->json($referralsCount);
    }

    public function getPhysiciansCount(Request $request)
    {
        $period = $request->query('period');
        $physiciansCount = 0;

        // Query the database based on the selected period
        if ($period === 'today') {
            $physiciansCount = User::whereDate('created_at', now()->format('Y-m-d'))->count();
        } elseif ($period === 'this_month') {
            $physiciansCount = User::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        } elseif ($period === 'this_year') {
            $physiciansCount = User::whereYear('created_at', now()->year)->count();
        }elseif ($period === 'all') {
            $physiciansCount = User::count();
        }

        return response()->json($physiciansCount);
    }

    public function doctor(){
        return view('doctor.index');
    }

    //registering a user to a facility
    public function register_user_facility(Request $request){
        $userId = $request->user_id;
        $facilityId = $request->facility_id;
        $user = User::find($userId);
        $facility = m_f_l_s::find($facilityId);

        $user->facilities()->attach($facility);
    }

    //getting facilities associated to user
    public function user_facilities(Request $request){
        $userId = $request->user_id;
        $user = User::find($userId);
        $facilities = $user->facilities;

        return $facilities;
    }

    //getting users associated to a facility
    public function facility_users(Request $request){
        $facilityId = $request->facility_id;

        $facility = m_f_l_s::find($facilityId);
        $users = $facility->users;

        return $users;

    }
}
