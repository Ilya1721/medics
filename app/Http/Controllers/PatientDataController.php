<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PatientData;
use App\Patient;

class PatientDataController extends Controller
{
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
        'count' => 0,
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
        'count' => 0,
      ]);
    }
}
