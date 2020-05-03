<?php

namespace App\Http\Controllers;

use App\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

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

        $this->notifyUsers();
        \Session::flash('status', 'Item cadastrado com sucesso. Usuários notificados');
        return Redirect::to('report');
    }

    private function notifyUsers(){
        $headers = [
            'Content-Type'=> 'application/json',
            'Authorization' => 'key=AAAAzgWanws:APA91bFkL99px6HKhYevNCE0eC9aLtsjRUZflws13ndl2ven9SxNSqiZ07HdM-3uiIkOaFj4h8fXqTJ7m6oyDeEVgKl-pRQArY9s9uvmhKRW1cd3rIstYRxD_Qccs25DCFBJOLclw5e2'
        ];
        $body = '{
            "notification": {
                "title": "Covid19Cascavel",
                "body": "Nova atualização registrada",
                "click_action": "https://covid19cascavel.com/",
                "icon": "https://covid19cascavel.com/images/covid-19.jpg"
            },
            "to": "/topics/all"
        }';

        $client = new Client(['base_uri' => 'https://fcm.googleapis.com/fcm/send']);
        $request = new \GuzzleHttp\Psr7\Request('POST', 'https://fcm.googleapis.com/fcm/send', $headers, $body);
        $client->send($request);

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
