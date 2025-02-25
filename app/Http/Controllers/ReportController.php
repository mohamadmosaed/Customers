<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Agent;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
 public function reports(){


    return view('reports.index');
 }
 public function reportDay(){
    $currentDay=Carbon::now()->toDateString();
   $customer=Customer::where('install_date','=',$currentDay)->get();
    return view('reports.reportDay',compact('customer'));
 }

 public function reportMonth() {
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;
    $customer = Customer::whereMonth('install_date', $currentMonth)
                         ->whereYear('install_date', $currentYear)
                         ->get();
    return view('reports.reportMonth', compact('customer'));
}
 public function reportSupportEndThisMonth(){
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;
    $customer = Customer::whereMonth('support_end', $currentMonth)
                         ->whereYear('support_end', $currentYear)
                         ->get();
    return view('reports.reportSupportEndThisMonth',compact('customer'));
 }
 public function reportSupportEndThisDay(){
    $currentDay = Carbon::now()->toDateString();
    $customer = Customer::where('support_end', $currentDay)
                         ->get();
    return view('reports.reportSupportEndThisDay',compact('customer'));
 }
 public function reportPerPeriodFilter(Request $request){
    $activity=Activity::get();
    $agent=Agent::get();
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $agent = $request->input('agent');
    $activity = $request->input('activity');
   $customer = Customer::query()
        ->when($startDate, function ($query, $startDate) {
            return $query->whereDate('install_date', '>=', $startDate);
        })
        ->when($endDate, function ($query, $endDate) {
            return $query->whereDate('install_date', '<=', $endDate);
        })
        ->when($agent, function ($query, $agent) {
            return $query->where('agent_id', $agent);
        })
        ->when($activity, function ($query, $activity) {
            return $query->where('activity', $activity);
        })
        ->get();
    return view('reports.reportPerPeriodFilter',compact('customer','activity','agent'));

}

 public function reportPerPeriod(){
    $activity=Activity::get();
    $agent=Agent::get();
    return view('reports.reportPerPeriod',compact('agent','activity'));
 }

}
