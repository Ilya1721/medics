<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PatientData;
use App\Patient;
use App\Presence;

class PatientDataController extends Controller
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
                     ->join('patient_data_patient', 'patient_data_patient.patient_id', '=',
                            'patients.id')
                     ->join('patient_data', 'patient_data_patient.patient_data_id', '=',
                            'patient_data.id')
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
                       ->join('patient_data_patient', 'patient_data_patient.patient_id', '=',
                          'patients.id')
                       ->join('patient_data', 'patient_data_patient.patient_data_id', '=',
                          'patient_data.id')
                       ->where('presences.patient_id', '=', $patientInstance->id)
                       ->where($data['category'], 'like', '%'.$data['search'].'%')
                       ->select('patient_data_patient.date_plan')
                       ->distinct()
                       ->get();
      }
      else
      {
        $patientInstance = Patient::find($patient);
        $date_plan = DB::table('patient_data_patient')
                         ->where('patient_id', '=', $patient)
                         ->select('date_plan')
                         ->get();
      }

      #return view('patientData', [
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
      $patientData = PatientData::all();

      return view('createPatientData', [
        'patient' => $patient,
        'patientData' => $patientData,
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

      $patientData = PatientData::updateOrCreate($data);
      DB::table('patient_data_patient')->updateOrInsert(
        ['patient_id' => $patient, 'patient_data_id' => $patientData->id,
         'patient_id' => $patient, 'patient_data_id' => $patientData->id,
         'date_plan' => $date['date_plan'], 'date_fact' => $date['date_plan'], ]
      );

      return redirect()->route('patient.show', [
        'patient' => $patient,
      ]);
    }

    public function edit($patient, $patientData)
    {
      $patient = Patient::find($patient);
      $patientData = PatientData::find($patientData);

      return view('editPatientData', [
        'patient' => $patient,
        'patientData' => $patientData,
      ]);
    }

    public function update($patient, $patientData)
    {
      $data = request()->validate([
        'name' => '',
        'value' => '',
        'unit_of_measure' => '',
      ]);
      $patientData = PatientData::find($patientData);
      $patientData->update($data);
      $patient = Patient::find($patient);

      return redirect()->route('patient.show', [
        'patient' => $patient,
      ]);
    }
}
