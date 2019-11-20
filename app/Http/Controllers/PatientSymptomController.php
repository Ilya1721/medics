<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;
use App\Symptom;

class PatientSymptomController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      $symptoms = DB::table('presence_symptom')
                      ->join('symptoms', 'symptoms.id',
                             '=', 'presence_symptom.symptom_id')
                      ->join('presences', 'presences.id', '=', 'presence_symptom.presence_id')
                      ->where('presences.patient_id',
                              '=', $patient->id)
                      ->select('symptoms.*')
                      ->orderBy('presence_symptom.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_symptom')
                       ->join('presences', 'presences.id', '=', 'presence_symptom.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_symptom')
                       ->join('presences', 'presences.id', '=', 'presence_symptom.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('presence_symptom')
                    ->join('presences', 'presences.id', '=', 'presence_symptom.presence_id')
                    ->where('presences.patient_id', '=', $patient->id)
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
