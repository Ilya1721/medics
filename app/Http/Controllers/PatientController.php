<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;

class PatientController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);
      $symptoms = DB::table('patient_symptom')
                      ->join('symptoms', 'symptoms.id',
                             '=', 'patient_symptom.symptom_id')
                      ->where('patient_symptom.patient_id',
                              '=', $patient->id)
                      ->select('symptoms.*')
                      ->orderBy('patient_symptom.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('patient_symptom')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('patient_symptom')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('patient_symptom')
                    ->where('patient_id', '=', $patient->id)
                    ->select('amount')
                    ->get();

      return view('patientSymptom', [
        'patient' => $patient,
        'symptoms' => $symptoms,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }
}
