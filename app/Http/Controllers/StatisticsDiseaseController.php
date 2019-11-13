<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsDiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $diseases = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('patient_diseases', 'patient_diseases.patient_id',
                          '=', 'presences.patient_id')
                   ->join('diseases', 'patient_diseases.disease_id',
                          '=', 'diseases.id')
                   ->select('diseases.name')
                   ->get();

      foreach($diseases as $disease)
      {
        $diseasesArr[] = $disease->name;
      }
      $diseasesCount = array_count_values($diseasesArr);

      return view('statisticsDisease', [
        'user' => $user,
        'diseasesCount' => $diseasesCount,
      ]);
    }
}
