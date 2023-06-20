<?php

namespace App\Http\Controllers;

use App\Models\m_f_l_s;
use App\Models\Referral;
use App\Models\TestUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Charts;


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

        //BAR GRAPH
        $data = Referral::whereBetween('created_at', [now()->subDays(7), now()])
            ->groupBy('status')
            ->groupByRaw('DATE(created_at)') // Group by the same day of the 'created_at' timestamp
            ->selectRaw('status, DATE(created_at) AS date, count(*) as count')
            ->get();

        // Prepare the chart data
       $chartData = [];
        foreach ($data as $item) {
            $chartData[$item->date][$item->status] = $item->count;
        }

        // Create the line chart
        $chart = new Chart;
        $chart->labels(array_keys($chartData));
        foreach ($data->pluck('status')->unique() as $status) {
            $color = [];
            if ($status === 'Rejected') {
                $color = 'rgba(255, 0, 0, 1)';
            } elseif ($status === 'Accepted') {
                $color = 'green';
            } elseif ($status === 'Pending') {
                $color = 'orange';
            }

            $chart->dataset($status, 'bar', collect($chartData)->pluck($status)->toArray())
                ->color($color)
                ->backgroundColor($color);
        }
        $chart->title('Referral Status');
        $chart->options([
            'responsive' => true,
        ]);




        //PIE CHART
        $pieChart = Referral::whereBetween('created_at', [now()->subMonth(1), now()])
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();

        $acceptedRejectedCount = 0;
        $allReferralCount = 0;
        foreach ($pieChart as $item) {
            if ($item->status === 'Accepted' || $item->status === 'Rejected') {
                $acceptedRejectedCount += $item->count;
            }
            $allReferralCount += $item->count;
        }
        $completedCount = $acceptedRejectedCount;

        $pieChartData = [
            'Complete' => $completedCount,
            'Incomplete' => $allReferralCount,
        ];


        // Create the pie chart
        $completedPieChart = new Chart;
        $completedPieChart->labels(array_keys($pieChartData));

        $completedPieChart->dataset('Status', 'pie', array_values($pieChartData))
            ->color([
                'rgba(46, 204, 113, 1)',
                'rgba(255, 0, 0, 1)',
                ])
            ->backgroundColor([
                'rgba(46, 204, 113, 1)',
                'rgba(255, 0, 0, 1)',
            ]);


        //PIE CHART2
        $referralsStatusPieChart = Referral::whereBetween('created_at', [now()->subMonth(1), now()])
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();

        $acceptedReferralsCount = 0;
        $pendingReferralsCount = 0;
        $rejectedReferralsCount = 0;

//        return$referralsStatusPieChart;
        foreach ($referralsStatusPieChart as $item) {

//            return $item;
            if ($item->status === 'Accepted') {
                $acceptedReferralsCount += $item->count;
            }elseif ($item->status === 'Pending'){
                $pendingReferralsCount += $item->count;
            }elseif ($item->status === 'Rejected'){
                $rejectedReferralsCount += $item->count;
            }
        }

        $pieChartData2 = [
            'Accepted' => $acceptedReferralsCount,
            'Pending' => $pendingReferralsCount,
            'Rejected' => $rejectedReferralsCount,
        ];


        // Create the pie chart
        $completedPieChart2 = new Chart;
        $completedPieChart2->labels(array_keys($pieChartData2));

        $completedPieChart2->dataset('Status', 'pie', array_values($pieChartData))
            ->color([
                'rgba(46, 204, 113, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 0, 0, 1)',
                ])
            ->backgroundColor([
                'rgba(46, 204, 113, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 0, 0, 1)',
            ]);;




        $facilities = m_f_l_s::count();
        return view('visualizations.visualizations')->with([
            'chart' => $chart,
            'completedPieChart' => $completedPieChart,
            'completedPieChart2' => $completedPieChart2
        ]);
    }

}
