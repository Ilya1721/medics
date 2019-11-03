<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\Medicament;

class PatientMedicamentController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);
      $date_plan = DB::table('patient_medicament')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('patient_medicament')
                       ->where('patient_id', '=', $patient->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('patient_medicament')
                    ->where('patient_id', '=', $patient->id)
                    ->select('amount')
                    ->get();

      return view('patientMedicament', [
        'patient' => $patient,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }

    public function create($patient)
    {
      $patient = Patient::find($patient);

      return view('createPatientMedicament', [
        'patient' => $patient,
      ]);
    }

    public function store($patient)
    {
      $medicamentData = request()->validate([
        'name' => 'required',
        'unit_of_measure' => 'required',
      ]);
      $pivotData = request()->validate([
        'amount' => 'required',
        'date_plan' => 'required',
      ]);
      $medicament = Medicament::updateOrCreate($medicamentData);
      DB::table('patient_medicament')->updateOrInsert([
        'patient_id' => $patient, 'medicament_id' => $medicament->id,
        'date_plan' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);

      return redirect()->route('patientMedicament.show', [
        'patient' => $patient,
      ]);
    }

    public function edit($patient, $medicament)
    {
      $patient = Patient::find($patient);
      $medicament = Medicament::find($medicament);
      $amount = DB::table('patient_medicament')
                    ->where('patient_id', '=', $patient->id)
                    ->where('medicament_id', '=', $medicament->id)
                    ->value('amount');

      return view('editPatientMedicament', [
        'patient' => $patient,
        'medicament' => $medicament,
        'amount' => $amount,
      ]);
    }

    public function update($patient, $medicament)
    {
      $medicamentData = request()->validate([
        'name' => 'required',
        'unit_of_measure' => 'required',
      ]);
      $pivotData = request()->validate([
        'amount' => 'required',
      ]);
      $medicament = Medicament::find($medicament);
      $medicament->update($medicamentData);

      DB::table('patient_medicament')
          ->where('patient_id', '=', $patient)
          ->where('medicament_id', '=', $medicament->id)
          ->update(['amount' => $pivotData['amount']]);

      return redirect()->route('patientMedicament.show', [
        'patient' => $patient,
      ]);
    }
}
