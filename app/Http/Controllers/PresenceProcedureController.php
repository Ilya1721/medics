<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Procedure;
use App\Medicament;
use App\presence;

class PresenceProcedureController extends Controller
{
    public function index($presence)
    {
      $presence = Presence::find($presence);
      $procedures = DB::table('presence_procedure')
                        ->join('procedures', 'procedures.id',
                               '=', 'presence_procedure.procedure_id')
                        ->join('presences', 'presences.id', '=', 'presence_procedure.presence_id')
                        ->where('presence_procedure.presence_id',
                                '=', $presence->id)
                        ->select('procedures.*')
                        ->orderBy('presence_procedure.updated_at', 'DESC')
                        ->paginate(15);
      $date_plan = DB::table('presence_procedure')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_procedure')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('presence_procedure')
                    ->where('presence_id', '=', $presence->id)
                    ->select('amount')
                    ->get();

      return view('presenceProcedure', [
        'presence' => $presence,
        'procedures' => $procedures,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }

    public function create($presence)
    {
      $presence = Presence::find($presence);

      return view('createPresenceProcedure', [
        'presence' => $presence,
      ]);
    }

    public function store($presence)
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
      $procedure = Procedure::updateOrCreate($procedureData);
      DB::table('presence_procedure')->updateOrInsert([
        'presence_id' => $presence, 'procedure_id' => $procedure->id,
        'date_plan' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);

      $presence = Presence::find($presence);

      return redirect()->route('presenceProcedure.show', [
        'presence' => $presence,
        'date_plan' => $pivotData['date_plan'],
        'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);
    }

    public function edit($presence, $procedure)
    {
      $presence = Presence::find($presence);
      $procedure = Procedure::find($procedure);
      $amount = DB::table('presence_procedure')
                    ->where('presence_id', '=', $presence->id)
                    ->where('procedure_id', '=', $procedure->id)
                    ->value('amount');

      return view('editPresenceProcedure', [
        'presence' => $presence,
        'procedure' => $procedure,
        'amount' => $amount,
      ]);
    }

    public function update($presence, $procedure)
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

      DB::table('presence_procedure')
          ->where('presence_id', '=', $presence)
          ->where('procedure_id', '=', $procedure->id)
          ->update(['amount' => $amount['amount'] ]);

      $presence = Presence::find($presence);

      return redirect()->route('presenceProcedure.show', [
        'presence' => $presence,
      ]);
    }

    public function destroy($presence, $procedure)
    {
      DB::table('presence_procedure')
          ->where('presence_id', '=', $presence)
          ->where('procedure_id', '=', $procedure)
          ->delete();

      $procedure = Procedure::find($procedure);

      return redirect()->route('presenceProcedure.show', [
        'presence' => $presence,
      ]);
    }
}
