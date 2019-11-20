<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;
use App\Disease;

class PatientDiseaseController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      $diseases = DB::table('presence_disease')
                      ->join('diseases', 'diseases.id',
                             '=', 'presence_disease.disease_id')
                      ->join('presences', 'presences.id', '=', 'presence_disease.presence_id')
                      ->where('presences.patient_id',
                              '=', $patient->id)
                      ->select('diseases.*')
                      ->orderBy('presence_disease.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_disease')
                       ->join('presences', 'presences.id', '=', 'presence_disease.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_scheduled')
                       ->get();
      $date_fact = DB::table('presence_disease')
                       ->join('presences', 'presences.id', '=', 'presence_disease.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();

      return view('patientDisease', [
        'patient' => $patient,
        'diseases' => $diseases,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
      ]);
    }
}
