<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;
use App\Symptom;

class PatientPersonalDataController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);

      return view('patientPersonalData', [
        'patient' => $patient,
      ]);
    }

    public function edit($patient)
    {
      $patient = Patient::find($patient);

      return view('editPatientPersonalData', [
        'patient' => $patient,
      ]);
    }

    public function update($patient)
    {
      $data = request()->validate([
          'last_name' => ['required', 'string', 'max:255'],
          'first_name' => ['required', 'string', 'max:255'],
          'father_name' => ['required', 'string', 'max:255'],
          'street' => ['required', 'string', 'max:255'],
          'house' => ['required', 'string', 'max:255'],
          'flat' => ['required', 'string', 'max:255'],
          'phone_number' => ['required', 'string', 'max:255'],
      ]);

      $patient = Patient::find($patient);
      $patient->update($data);

      return view('patientPersonalData', [
        'patient' => $patient,
      ]);
    }
}
