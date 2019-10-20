<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\Procedure;

class PatientProcedureController extends Controller
{
    public function index($patient)
    {
      $patient = Patient::find($patient);
      $date_plan = DB::table('patient_procedure')
                       ->where('patient_id', '=', $patient->id)
                       ->value('date_plan');
      $date_fact = DB::table('patient_procedure')
                       ->where('patient_id', '=', $patient->id)
                       ->value('date_fact');
      $amount = DB::table('patient_procedure')
                    ->where('patient_id', '=', $patient->id)
                    ->value('amount');

      return view('patientProcedure', [
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

      return view('createPatientProcedure', [
        'patient' => $patient,
      ]);
    }

    public function store($patient)
    {
      $procedureData = request()->validate([
        'name' => 'required',
        'description' => '',
        'unit_of_measure' => 'required',
      ]);
      $pivotData = request()->validate([
        'date_plan' => '',
        'amount' => 'required',
      ]);
      $procedure = Procedure::create($procedureData);
      DB::table('patient_procedure')->insertOrIgnore([
        'patient_id' => $patient, 'procedure_id' => $procedure->id,
        'date_plan' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);

      $patient = Patient::find($patient);

      return redirect()->route('patientProcedure.show', [
        'patient' => $patient,
        'date_plan' => $pivotData['date_plan'],
        'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
        'count' => 0,
      ]);
    }

    public function edit($patient, $procedure)
    {
      $patient = Patient::find($patient);
      $procedure = Procedure::find($procedure);
      $amount = DB::table('patient_procedure')
                    ->where('patient_id', '=', $patient->id)
                    ->where('procedure_id', '=', $procedure->id)
                    ->value('amount');

      return view('editPatientProcedure', [
        'patient' => $patient,
        'procedure' => $procedure,
        'amount' => $amount,
      ]);
    }

    public function update($patient, $procedure)
    {
      $procedureData = request()->validate([
        'name' => 'required',
        'description' => '',
        'unit_of_measure' => '',
      ]);
      $amount = request()->validate([
        'amount' => 'required',
      ]);

      $procedure = Procedure::find($procedure);
      $procedure->update($procedureData);

      DB::table('patient_procedure')
          ->where('patient_id', '=', $patient)
          ->where('procedure_id', '=', $procedure->id)
          ->update(['amount' => $amount['amount'] ]);

      $patient = Patient::find($patient);

      return redirect()->route('patientProcedure.show', [
        'patient' => $patient,
      ]);
    }
}