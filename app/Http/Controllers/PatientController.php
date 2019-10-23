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
      $date_plan = DB::table('patient_data_patient')
                       ->where('patient_id', '=', $patient->id)
                       ->value('date_plan');
      $date_fact = DB::table('patient_data_patient')
                       ->where('patient_id', '=', $patient->id)
                       ->value('date_fact');

      return view('patientData', [
        'patient' => $patient,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'count' => 0,
      ]);
    }
}
