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
        $reports = DailyReport::get();

        $labels = collect($reports)->map(function ($report){ return $report->getFormattedReportDate();});

        return view('home',  ['reports'=> $reports, 'labels'=>$labels]);
    }
}
