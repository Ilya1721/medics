<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Disease;

class PatientDiseaseController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);
      $date_plan = DB::table('patient_diseases')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_scheduled')
                       ->get();
      $date_fact = DB::table('patient_diseases')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();

      return view('patientDisease', [
        'patient' => $patient,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
      ]);
    }

    public function create($patient)
    {
      $patient = Patient::find($patient);

      return view('createPatientDisease', [
        'patient' => $patient,
      ]);
    }

    public function store($patient)
    {
      $diseaseData = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $pivotData = request()->validate([
        'date_plan' => 'required',
      ]);
      $disease = Disease::updateOrCreate($diseaseData);
      DB::table('patient_diseases')->updateOrInsert([
        'patient_id' => $patient, 'disease_id' => $disease->id,
        'date_scheduled' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'doctor_id' => Auth::user()->employee->id,
      ]);

      return redirect()->route('patientDisease.show', [
        'patient' => $patient,
      ]);
    }

    public function edit($patient, $disease)
    {
      $patient = Patient::find($patient);
      $disease = Disease::find($disease);

      return view('editPatientDisease', [
        'patient' => $patient,
        'disease' => $disease,
      ]);
    }

    public function update($patient, $disease)
    {
      $diseaseData = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $disease = Disease::find($disease);
      $disease->update($diseaseData);

      return redirect()->route('patientDisease.show', [
        'patient' => $patient,
      ]);
    }
}
