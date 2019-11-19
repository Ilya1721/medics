<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PresenceData;
use App\Patient;
use App\Presence;

class PresenceDataController extends Controller
{
    public function filter($patient)
    {
      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);

      $patientInstance = Patient::query()
                     ->join('presences', 'presences.patient_id', '=',
                            'patients.id')
                     ->join('presence_data_presence', 'presence_data_presence.patient_id', '=',
                            'patients.id')
                     ->join('presence_data', 'presence_data_presence.presence_data_id', '=',
                            'presencet_data.id')
                     ->where('presences.patient_id', '=', $patient)
                     ->where($data['category'], 'like', '%'.$data['search'].'%')
                     ->select('patients.*')
                     ->distinct()
                     ->first();

      if($patientInstance != null && $data['search'] != "")
      {
        $date_plan = Patient::query()
                       ->join('presences', 'presences.patient_id', '=',
                          'patients.id')
                       ->join('presence_data_presence', 'presence_data_presence.patient_id', '=',
                          'patients.id')
                       ->join('presence_data', 'presence_data_presence.presence_data_id', '=',
                          'presence_data.id')
                       ->where('presences.patient_id', '=', $patientInstance->id)
                       ->where($data['category'], 'like', '%'.$data['search'].'%')
                       ->select('presence_data_presence.date_plan')
                       ->distinct()
                       ->get();
      }
      else
      {
        $patientInstance = Patient::find($patient);
        $date_plan = DB::table('presence_data_presence')
                         ->where('patient_id', '=', $patient)
                         ->select('date_plan')
                         ->get();
      }

      #return view('PresenceData', [
        #'patient' => $patientInstance,
      #  'date_plan' => $date_plan,
      #  'date_fact' => $date_plan,
      #]);
                    #Temporary
      return redirect()->route('patient.show', [
        'patient' => $patient,
      ]);
    }

    public function create($patient)
    {
      $patient = Patient::find($patient);
      $PresenceData = PresenceData::all();

      return view('createPresenceData', [
        'patient' => $patient,
        'PresenceData' => $PresenceData,
      ]);
    }

    public function store($patient)
    {
      $data = request()->validate([
        'name' => 'required',
        'value' => 'required',
        'unit_of_measure' => 'required',
      ]);
      $date = request()->validate([
        'date_plan' => '',
      ]);

      $PresenceData = PresenceData::updateOrCreate($data);
      DB::table('presence_data_presence')->updateOrInsert(
        ['patient_id' => $patient, 'presence_data_id' => $PresenceData->id,
         'patient_id' => $patient, 'presence_data_id' => $PresenceData->id,
         'date_plan' => $date['date_plan'], 'date_fact' => $date['date_plan'], ]
      );

      return redirect()->route('patient.show', [
        'patient' => $patient,
      ]);
    }

    public function edit($patient, $PresenceData)
    {
      $patient = Patient::find($patient);
      $PresenceData = PresenceData::find($PresenceData);

      return view('editPresenceData', [
        'patient' => $patient,
        'PresenceData' => $PresenceData,
      ]);
    }

    public function update($patient, $PresenceData)
    {
      $data = request()->validate([
        'name' => '',
        'value' => '',
        'unit_of_measure' => '',
      ]);
      $PresenceData = PresenceData::find($PresenceData);
      $PresenceData->update($data);
      $patient = Patient::find($patient);

      return redirect()->route('patient.show', [
        'patient' => $patient,
      ]);
    }
}
