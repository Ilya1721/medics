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

      setlocale(LC_TIME, 'Ukrainian');
      foreach($dates as $date)
      {
        $days[] = iconv('cp1251', 'UTF-8',
                  strftime('%A', strtotime($date->arrived_at)));
        $months[] = iconv('cp1251', 'UTF-8',
                    strftime('%B', strtotime($date->arrived_at)));
        $time[] = iconv('cp1251', 'UTF-8',
                    strftime('%X', strtotime($date->arrived_at)));
      }
      $daysCount = array_count_values($days);
      $monthsCount = array_count_values($months);
      $timesCount = array_count_values($time);

      return view('statisticsVisits', [
        'user' => $user,
        'daysCount' => $daysCount,
        'monthsCount' => $monthsCount,
        'timesCount' => $timesCount,
        'label' => 'за весь час'
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
      ]);

      if($data['category'] == 'all')
      {
        return redirect('/statistics/visits/show');
      }
      
      $user = Auth::user();
      $dates = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->select('presences.arrived_at')
                   ->get();

      setlocale(LC_TIME, 'Ukrainian');
      foreach($dates as $date)
      {
        if(strftime('%j', strtotime(date('Y-m-d H:i')))
            - strftime('%j', strtotime($date->arrived_at))
            < $data['category'])
        {
          $days[] = iconv('cp1251', 'UTF-8',
                    strftime('%A', strtotime($date->arrived_at)));
          $months[] = iconv('cp1251', 'UTF-8',
                      strftime('%B', strtotime($date->arrived_at)));
          $time[] = iconv('cp1251', 'UTF-8',
                      strftime('%X', strtotime($date->arrived_at)));
        }
      }

      $daysCount = array_count_values($days);
      $monthsCount = array_count_values($months);
      $timesCount = array_count_values($time);

      if($data['category'] == 7)
      {
        $label = 'за тиждень';
      }
      else if($data['category'] == 30)
      {
        $label = 'за місяць';
      }
      else if($data['category'] == 365)
      {
        $label = 'за рік';
      }

      return view('statisticsVisits', [
        'user' => $user,
        'daysCount' => $daysCount,
        'monthsCount' => $monthsCount,
        'timesCount' => $timesCount,
        'label' => $label,
      ]);
    }
}
