<?php

namespace App\Http\Controllers;

use App\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DailyReportController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = DailyReport::orderBy('report_date')->get();
        return view('report/home', ['reports'=> $reports]);
    }

    public function create()
    {
        return view('report/form');
    }

    public function edit($id)
    {
        $report = DailyReport::findOrFail($id);
        return view('report/form', ['report'=>$report]);
    }

    public function insert(Request $request){

        $dailyReport = new DailyReport();
        $fields = $request->all();
        $fields['id_user'] = Auth::user()->id;
        $dailyReport->create($fields);

        \Session::flash('status', 'Item cadastrado com sucesso.');
        return Redirect::to('report');
    }

    public function update($id, Request $request){

        $cliente = DailyReport::findOrFail($id);

        $cliente->update($request->all());

        \Session::flash('status', 'Item atualizado com sucesso.');
        return Redirect::to('report');
    }

    public function delete($id){

        $dailyReport = DailyReport::findOrFail($id);

        $dailyReport->delete();

        \Session::flash('status', 'Item removido com sucesso');
        return Redirect::to('report');
    }
}
