<?php

namespace App\Http\Controllers;

use App\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = DailyReport::orderBy('report_date')->get();
        $labels = collect($reports)->map(function ($report){ return $report->getFormattedReportDate();});
        $sortedReports = collect($reports)->sortByDesc('report_date');
        $lastReport = collect($sortedReports)->first();
        $firstReport = collect($sortedReports)->last();
        $midwayReport = collect($sortedReports)->get((int)floor($reports->count() / 2));
        $ratios =$this->calcRatios($sortedReports, $lastReport);
        return view('home',  [
            'reports'=> $reports,
            'labels'=> $labels,
            'lastReport'=> $lastReport,
            'ratios'=>$ratios,
            'firstReport'=> $firstReport,
            'midwayReport'=>$midwayReport,
        ]);
    }

    public function supporters()
    {
        return view('supporters');
    }

    public function about()
    {
        return view('about');
    }

    private function calcRatios($sortedReports, $lastReport){
        $lastIndex = array_search($lastReport->daily_report_id, collect($sortedReports)
            ->map(function ($report){ return $report->daily_report_id;})->toArray());
        $reportArray = collect($sortedReports)->toArray();
        $nextToLastReport = (object) $reportArray[$lastIndex-1];

        $ratios['confirmedRatio'] = $this->percentageRatio($nextToLastReport->confirmed, $lastReport->confirmed);
        $ratios['discardedRatio'] = $this->percentageRatio($nextToLastReport->discarded, $lastReport->discarded);

        $ratios['underInvestigationRatioGrowing'] = $this->percentageRatio($nextToLastReport->under_investigation, $lastReport->under_investigation);
        if($ratios['underInvestigationRatioGrowing'] < 0){
            $ratios['underInvestigationRatioDecreasing'] = $this->percentageRatio($lastReport->under_investigation, $nextToLastReport->under_investigation);
        }

        $ratios['mortalityPercentage'] = $this->percentage($lastReport->deaths, $lastReport->confirmed);
        return (object) $ratios;
    }

    function percentageRatio ($valueA = 0, $valueB = 0) {
        return 100 - $ratio = $this->round_out($valueA / $valueB, 3) * 100 ;
    }

    function round_out ($value, $places=0) {
        if ($places < 0) { $places = 0; }
        $mult = pow(10, $places);
        return ($value >= 0 ? ceil($value * $mult):floor($value * $mult)) / $mult;
    }

    function percentage($percentage, $total ) {
        return $this->round_out(( $percentage / $total  ) * 100, 2);
    }
}
