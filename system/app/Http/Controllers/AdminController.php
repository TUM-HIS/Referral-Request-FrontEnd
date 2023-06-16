<?php

namespace App\Http\Controllers;

use App\Charts\ReferralChart;
use App\Charts\ReferralsChart;
use App\Models\m_f_l_s;
use App\Models\Patient;
use App\Models\Referral;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;
use Illuminate\Http\Request;
use Charts;


class AdminController extends Controller
{

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
