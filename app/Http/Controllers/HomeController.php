<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Presence;

class HomeController extends Controller
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
      $user = Auth::user();

      $presences = Presence::query()
                   ->where('presences.doctor_id', '=', Auth::user()->employee->id)
                   ->orderBy('presences.updated_at', 'DESC')->paginate(3);

      return view('home', [
        'presences' => $presences,
        'user' => $user,
      ]);
    }

    public function filter()
    {
      $user = Auth::user();

      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);

      $presences = Presence::query()
                             ->join('rooms', 'rooms.id', 'presences.room_id')
                             ->join('patients', 'patients.id', 'presences.patient_id')
                             ->where($data['category'], 'like', '%'.$data['search'].'%')
                             ->where('presences.doctor_id', '=', Auth::user()->employee->id)
                             ->select('presences.*')
                             ->distinct()
                             ->orderBy('presences.updated_at', 'DESC')->paginate(3);

      return view('home', [
        'presences' => $presences,
        'user' => $user
      ]);
    }
}
