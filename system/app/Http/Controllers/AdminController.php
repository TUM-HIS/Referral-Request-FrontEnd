<?php

namespace App\Http\Controllers;

use App\Charts\ReferralChart;
use App\Models\Chart;
use App\Models\m_f_l_s;
use App\Models\Referral;
use App\Models\TestUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function testCharts(){

//        HANDLING TEST USERS DATA

        $groups = TestUser::select('age', DB::raw('count(*) as total'))
            ->groupBy('age')
            ->pluck('total', 'age')
            ->all();
        // Generate random colours for the groups
        for ($i=0; $i<=count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        // Prepare the data for returning with the view
        $chart = new Chart();
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;

//        HANDLING DATA FOR THE REFERRALS

        $from = '2023-05-01';
        $to = '2023-08-01';

        $referrals = Referral::whereBetween('created_at', [$from, $to])
            ->groupBy('referredFacility')
            ->select('referredFacility', DB::raw('COUNT(*) as count'))
            ->get();

        $facilityNames = $referrals->pluck('referredFacility');
        $referralCounts = $referrals->pluck('count');

        $chart2 = new Chart();
        $chart2->facilityNames = $facilityNames;
        $chart2->referralCounts = $referralCounts;



        //HANDLING STATUS FOR THE REFERRALS

        $statusCounts = Referral::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();


        //LINE CHART
        $referrals = Referral::all();

        $referralCounts = $referrals->groupBy(function ($referral) {
            return $referral->created_at->format('F Y');
        })->map(function ($group) {
            return $group->count();
        });

        $chartData = [
            'labels' => $referralCounts->keys()->toArray(),
            'data' => $referralCounts->values()->toArray(),
        ];


//        dd($chartData);


        return view('visualizations.test-charts')->with(['chart' => $chart,
            'referralChart' => $chart2, 'statusData' => $statusCounts, 'chartData' => $chartData]);
    }
















    public function charts(){

        $data = Referral::select('id', 'created_at')->get()->groupBy(function ($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values){

            $months[] = $month;
            $monthCount[] = count($values);
        }

        //dd($data);

        return view('visualizations.charts')->with([
            'data'=> $data,
            'month' => $months,
            'monthCount' => $monthCount]);

    }

    public function admin(){

        $data = Referral::select('status', 'created_at')
            ->whereDate('created_at', '>=', now()->subDays(6)->toDateString())
            ->get();


        $chart = new ReferralChart('line', 'chartjs');
        $chart->title('Daily Referrals ');
        $chart->labels($data->pluck('created_at'));
        $chart->dataset('Pending Referral', 'line',     [10, 15, 8, 8, 2, 13, 7, 0, 16, 23]);
        $chart->dataset('Completed Referrals', 'line',  [11, 5, 18, 3, 7, 8, 0, 10, 26, 15]);
        $chart->dataset('All Referrals', 'line',        [21, 22, 26, 11, 9, 21, 7, 10, 42, 38]);

//        return $referral = Referral::get()->groupBy('created_at')->map(function ($item){
//            return count($item);
//        });
//
//        $labels = Referral::pluck('created_at');
//        $pending = Referral::where('status', 'Pending')->get();
//        $chart = new ReferralsChart('line', 'highcharts');
//        $chart->title('Sales Comparison');
//        $chart->labels($labels);
//        $chart->dataset('Pending', 'line', $pending);
//        $chart->dataset('Product Y', 'line', [8, 12, 6, 10, 14]);
//        $chart->dataset('Product Z', 'line', [5, 8, 10, 12, 6]);


//        $referrals = Referral::all();

//        $chart = Charts::create('bar', 'material')
//            ->title("Referrals")
//            ->dimensions(0, 400)
//            ->elementLabel('Refferals Incoming/Outgoing')
//            ->labels($referrals->pluck('created'))
//            ->values($referrals->pluck('Pending'))
//            ->values($referrals->pluck('Accepted'));

        // $patients = Patients::count();
        // $physicians = Physicians::count();
        // $referals = Referals::count();
        // $referalfeedback = Referalfeedback::count();
        $facilities = m_f_l_s::count();
        return view('visualizations.visualizations')->with(['facilities' => $facilities, 'chart' => $chart]);
    }

}
