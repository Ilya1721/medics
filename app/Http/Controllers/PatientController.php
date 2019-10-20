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

      return view('patientData', [
        'patient' => $patient,
        'count' => 0,
      ]);
    }
}
