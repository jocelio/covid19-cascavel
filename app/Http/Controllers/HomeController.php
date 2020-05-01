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
        $reports = DailyReport::orderBy('report_date')->get();

        $labels = collect($reports)->map(function ($report){ return $report->getFormattedReportDate();});
        $lastReport = collect($reports)->sortByDesc('report_date')->first();

        return view('home',  ['reports'=> $reports, 'labels'=>$labels, 'lastReport'=>$lastReport]);
    }

    public function supporters()
    {
        return view('supporters');
    }
}
