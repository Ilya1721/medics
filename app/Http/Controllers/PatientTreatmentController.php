<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\Treatment;

class PatientTreatmentController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);
      $date_plan = DB::table('patient_treatment')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('patient_treatment')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();

      return view('patientTreatment', [
        'patient' => $patient,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
      ]);
    }

    public function create($patient)
    {
      $patient = Patient::find($patient);

      return view('createPatientTreatment', [
        'patient' => $patient,
      ]);
    }

    public function store($patient)
    {
      $treatmentData = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $date = request()->validate([
        'date_plan' => '',
      ]);
      $treatment = Treatment::updateOrCreate($treatmentData);
      DB::table('patient_treatment')->updateOrInsert([
        'patient_id' => $patient, 'treatment_id' => $treatment->id,
        'date_plan' => $date['date_plan'], 'date_fact' => $date['date_plan'],
      ]);
      $patient = Patient::find($patient);

      return redirect()->route('patientTreatment.show', [
        'patient' => $patient,
        'date_plan' => $date['date_plan'],
        'date_fact' => $date['date_plan'],
      ]);
    }

    public function edit($patient, $treatment)
    {
      $patient = Patient::find($patient);
      $treatment = Treatment::find($treatment);

      return view('editPatientTreatment', [
        'patient' => $patient,
        'treatment' => $treatment,
      ]);
    }

    public function update($patient, $treatment)
    {
      $data = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $treatment = Treatment::find($treatment);
      $treatment->update($data);

      return redirect()->route('patientTreatment.show', [
        'patient' => $patient,
      ]);
    }
}
