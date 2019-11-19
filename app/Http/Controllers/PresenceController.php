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

    public function index($presenceId)
    {
      $presence = Presence::find($presenceId);

      return view('presence', [
        'presence' => $presence,
      ]);
    }

    public function filter()
    {
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

      return view('presence', [
        'presences' => $presences,
      ]);
    }

    public function create()
    {
      $rooms = Room::all();
      $doctors = Employee::query()
                 ->join('jobs', 'jobs.id', '=', 'employees.job_id')
                 ->where('jobs.name', 'Лікар')
                 ->select('employees.*')
                 ->get();
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
        'departure_at' => '',
      ]);

      $patientData = request()->validate([
        'last_name' => 'required',
        'first_name' => 'required',
        'father_name' => 'required',
        'city_id' => 'required',
        'street' => '',
        'house' => '',
        'phone_number' => 'required',
        'flat' => 'required',
      ]);

      $patient = Patient::create($patientData);

      $presenceData['patient_id'] = $patient->id;

      Presence::create($presenceData);

      $presences = Presence::all();

      return redirect('/home');
    }

    public function edit(Presence $presence)
    {
      $rooms = Room::all();
      $doctors = Employee::query()
                 ->join('jobs', 'jobs.id', '=', 'employees.job_id')
                 ->where('jobs.name', 'Лікар')->get();
      $cities = City::all();

      return view('editPresence', [
        'presence' => $presence,
        'rooms' => $rooms,
        'doctors' => $doctors,
        'cities' => $cities,
      ]);
    }

    public function update(Presence $presence)
    {
      $presenceData = request()->validate([
        'room_id' => '',
        'doctor_id' => '',
      ]);
      $patientData = request()->validate([
        'last_name' => 'required',
        'first_name' => 'required',
        'father_name' => 'required',
        'city_id' => 'required',
        'street' => 'required',
        'house' => 'required',
        'phone_number' => 'required',
        'flat' => 'required',
      ]);

      $presence->update($presenceData);
      $presence->patient->update($patientData);

      return redirect()->route('presence.show');
    }
}
