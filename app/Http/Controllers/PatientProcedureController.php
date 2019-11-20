<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;
use App\Procedure;

class PatientProcedureController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      $procedures = DB::table('presence_procedure')
                      ->join('procedures', 'procedures.id',
                             '=', 'presence_procedure.procedure_id')
                      ->join('presences', 'presences.id', '=', 'presence_procedure.presence_id')
                      ->where('presences.patient_id',
                              '=', $patient->id)
                      ->select('procedures.*')
                      ->orderBy('presence_procedure.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_procedure')
                       ->join('presences', 'presences.id', '=', 'presence_procedure.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_procedure')
                       ->join('presences', 'presences.id', '=', 'presence_procedure.presence_id')
                       ->where('presences.patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('presence_procedure')
                    ->join('presences', 'presences.id', '=', 'presence_procedure.presence_id')
                    ->where('presences.patient_id', '=', $patient->id)
                    ->select('amount')
                    ->get();

      return view('patientProcedure', [
        'patient' => $patient,
        'procedures' => $procedures,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }
}
