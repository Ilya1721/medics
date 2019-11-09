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
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }
}
