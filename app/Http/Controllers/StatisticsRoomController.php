<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $rooms = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('rooms', 'presences.room_id',
                          '=', 'rooms.id')
                   ->select('rooms.number')
                   ->get();

      foreach($rooms as $room)
      {
        $roomsArr[] = $room->number;
      }
      $roomsCount = array_count_values($roomsArr);

      return view('statisticsRoom', [
        'user' => $user,
        'roomsCount' => $roomsCount,
      ]);
    }
}
