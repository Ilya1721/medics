<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsProcedureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $procedures = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('patient_procedure', 'patient_procedure.patient_id',
                          '=', 'presences.patient_id')
                   ->join('procedures', 'patient_procedure.procedure_id',
                          '=', 'procedures.id')
                   ->select('procedures.name')
                   ->get();

      foreach($procedures as $procedure)
      {
        $proceduresArr[] = $procedure->name;
      }
      $proceduresCount = array_count_values($proceduresArr);

      return view('statisticsprocedure', [
        'user' => $user,
        'proceduresCount' => $proceduresCount,
      ]);
    }
}
