<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Payment;


use App\Exports\saleReportExport;
use Maatwebsite\Excel\Facades\Excel;
class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }

    public function show(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $start_date = date("Y-m-d H:i:s", strtotime($request->start_date.'00:00:00'));
        $end_date = date("Y-m-d H:i:s", strtotime($request->end_date.'23:59:59'));

    $payment = Payment::whereBetween('updated_at',[$start_date,$end_date])->where('is_enable',1);

    return view('admin.report.showReport')->with('start_date', date("m/d/Y H:i:s", strtotime($request->start_date.'00:00:00')))
    ->with('end_date',date("m/d/Y H:i:s", strtotime($request->end_date.'23:59:59')))
    ->with('totalSale',$sales->sum('amount'))
    ->with('amount',$sales->paginate(5));

}

    public function export(Request $request){
    
    return Excel::download(new saleReportExport($request->start_date,$request->end_date), 'SalaeReport.xlsx');

}
}
