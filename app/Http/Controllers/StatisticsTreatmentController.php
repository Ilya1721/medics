<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsTreatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $treatments = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('patient_treatment', 'patient_treatment.patient_id',
                          '=', 'presences.patient_id')
                   ->join('treatments', 'patient_treatment.treatment_id',
                          '=', 'treatments.id')
                   ->select('treatments.name')
                   ->get();

      foreach($treatments as $treatment)
      {
        $treatmentsArr[] = $treatment->name;
      }
      $treatmentsCount = array_count_values($treatmentsArr);

      return view('statisticsTreatment', [
        'user' => $user,
        'treatmentsCount' => $treatmentsCount,
      ]);
    }
}
