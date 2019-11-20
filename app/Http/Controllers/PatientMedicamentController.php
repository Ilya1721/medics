<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;
use App\Medicament;

class PatientMedicamentController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      $medicaments = DB::table('presence_medicament')
                      ->join('medicaments', 'medicaments.id',
                             '=', 'presence_medicament.medicament_id')
                      ->join('presences', 'presences.id', '=', 'presence_medicament.presence_id')
                      ->where('presences.patient_id',
                              '=', $patient->id)
                      ->select('medicaments.*')
                      ->orderBy('presence_medicament.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_medicament')
                       ->join('presences', 'presences.id', '=', 'presence_medicament.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_medicament')
                       ->join('presences', 'presences.id', '=', 'presence_medicament.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('presence_medicament')
                    ->join('presences', 'presences.id', '=', 'presence_medicament.presence_id')
                    ->where('presences.patient_id', '=', $patient->id)
                    ->select('amount')
                    ->get();

      return view('patientMedicament', [
        'patient' => $patient,
        'medicaments' => $medicaments,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }
}
