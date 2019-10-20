<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Symptom;
use App\Patient;

class PatientSymptomController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);
      $date_plan = DB::table('patient_symptom')
                       ->where('patient_id', '=', $patient->id)
                       ->value('date_plan');
      $date_fact = DB::table('patient_symptom')
                       ->where('patient_id', '=', $patient->id)
                       ->value('date_fact');
      $amount = DB::table('patient_symptom')
                    ->where('patient_id', '=', $patient->id)
                    ->value('amount');

      return view('patientSymptom', [
        'patient' => $patient,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
        'count' => 0,
      ]);
    }

    public function create($patient)
    {
      $patient = Patient::find($patient);

      return view('createPatientSymptom', [
        'patient' => $patient,
      ]);
    }

    public function store($patient)
    {
      $symptomData = request()->validate([
        'name' => 'required',
        'description' => '',
        'unit_of_measure' => 'required',
      ]);
      $pivotData = request()->validate([
        'date_plan' => '',
        'amount' => 'required',
      ]);
      $symptom = Symptom::create($symptomData);
      DB::table('patient_symptom')->insertOrIgnore([
        'patient_id' => $patient, 'symptom_id' => $symptom->id,
        'date_plan' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);

      $patient = Patient::find($patient);

      return redirect()->route('patientSymptom.show', [
        'patient' => $patient,
      ]);
    }

    public function edit($patient, $symptom)
    {
      $patient = Patient::find($patient);
      $symptom = Symptom::find($symptom);
      $amount = DB::table('patient_symptom')
                    ->where('patient_id', '=', $patient->id)
                    ->where('symptom_id', '=', $symptom->id)
                    ->value('amount');

      return view('editPatientSymptom', [
        'patient' => $patient,
        'symptom' => $symptom,
        'amount' => $amount,
      ]);
    }

    public function update($patient, $symptom)
    {
      $symptomData = request()->validate([
        'name' => 'required',
        'description' => '',
        'unit_of_measure' => 'required',
      ]);
      $amount = request()->validate([
        'amount' => 'required',
      ]);

      $symptom = Symptom::find($symptom);
      $symptom->update($symptomData);

      DB::table('patient_symptom')
          ->where('patient_id', '=', $patient)
          ->where('symptom_id', '=', $symptom->id)
          ->update(['amount' => $amount['amount'] ]);

      $patient = Patient::find($patient);

      return redirect()->route('patientSymptom.show', [
        'patient' => $patient,
      ]);
    }
}
