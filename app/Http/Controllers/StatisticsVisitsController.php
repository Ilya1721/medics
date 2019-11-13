<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsVisitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $dates = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->select('presences.arrived_at')
                   ->get();

      foreach($dates as $date)
      {
        $days[] = date('l', strtotime($date->arrived_at));
        $months[] = date('F', strtotime($date->arrived_at));
      }
      $daysCount = array_count_values($days);
      $monthsCount = array_count_values($months);




      return view('statisticsVisits', [
        'user' => $user,
        'daysCount' => $daysCount,
        'monthsCount' => $monthsCount,
      ]);
    }
}
