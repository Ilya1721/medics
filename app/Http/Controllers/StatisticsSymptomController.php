<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsSymptomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $symptoms = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('patient_symptom', 'patient_symptom.patient_id',
                          '=', 'presences.patient_id')
                   ->join('symptoms', 'patient_symptom.symptom_id',
                          '=', 'symptoms.id')
                   ->select('symptoms.name')
                   ->get();

      foreach($symptoms as $symptom)
      {
        $symptomsArr[] = $symptom->name;
      }
      $symptomsCount = array_count_values($symptomsArr);

      return view('statisticsSymptom', [
        'user' => $user,
        'symptomsCount' => $symptomsCount,
      ]);
    }
}
