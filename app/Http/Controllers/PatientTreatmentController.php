<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientTreatmentController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      return view('patientTreatment', [
        'patient' => $patient,
      ]);
    }
}
