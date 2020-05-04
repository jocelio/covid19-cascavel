<?php

namespace App\Http\Controllers;

use App\DailyReport;
use Illuminate\Http\Request;

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
        function getClosest($arr, $search) {
            $closest = null;
            foreach ($arr as $item) {
               if ($closest === null || abs($search - $closest->confirmed) > abs($item->confirmed - $search)) {
                    $closest = $item;
                }
            }
            return $closest;
        }

        $reports = DailyReport::orderBy('report_date')->get();

        $labels = collect($reports)->map(function ($report) { return $report->getFormattedReportDate();});
        $lastReport = collect($reports)->sortByDesc('report_date')->first();
        $half = $lastReport->confirmed/2;
        $closestDate = getClosest($reports, $half);


        return view('home',  ['reports'=> $reports,
            'labels'=>$labels,
            'lastReport'=>$lastReport,
            'closestDay'=>$closestDate
            ]
        );
    }
}
