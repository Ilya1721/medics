<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;
use App\Treatment;

class PatientTreatmentController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      $treatments = DB::table('presence_treatment')
                      ->join('treatments', 'treatments.id',
                             '=', 'presence_treatment.treatment_id')
                      ->join('presences', 'presences.id', '=', 'presence_treatment.presence_id')
                      ->where('presences.patient_id',
                              '=', $patient->id)
                      ->select('treatments.*')
                      ->orderBy('presence_treatment.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_treatment')
                       ->join('presences', 'presences.id', '=', 'presence_treatment.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_treatment')
                       ->join('presences', 'presences.id', '=', 'presence_treatment.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();

      return view('patientTreatment', [
        'patient' => $patient,
        'treatments' => $treatments,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
      ]);
    }
}
