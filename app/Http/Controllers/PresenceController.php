<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\Employee;
use App\Presence;
use App\City;
use App\Patient;

class PresenceController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $presences = Presence::query()
                   ->where('presences.doctor_id', '=', Auth::user()->id)
                   ->get();

      return view('presence', [
        'presences' => $presences,
      ]);
    }

    public function create()
    {
      $rooms = Room::all();
      $doctors = Employee::query()
                 ->join('jobs', 'jobs.id', '=', 'employees.job_id')
                 ->where('jobs.name', 'Лікар')->get();
      $cities = City::all();

      return view('createPresence', [
        'rooms' => $rooms,
        'doctors' => $doctors,
        'cities' => $cities,
      ]);
    }

    public function store()
    {
      $presenceData = request()->validate([
        'room_id' => '',
        'doctor_id' => '',
        'arrived_at' => '',
      ]);

      $patientData = request()->validate([
        'last_name' => 'required',
        'first_name' => 'required',
        'father_name' => 'required',
        'city_id' => 'required',
        'street' => '',
        'house' => '',
        'phone_number' => 'required',
      ]);

      \App\Patient::create($patientData);

      $presenceData['patient_id'] = \App\Patient::max('id');

      \App\Presence::create($presenceData);

      $presences = Presence::all();

      return redirect()->route('presence.show', [
        'presences' => $presences,
      ]);
    }
}
