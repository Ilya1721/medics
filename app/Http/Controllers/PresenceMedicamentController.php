<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\presence;
use App\Medicament;

class presenceMedicamentController extends Controller
{
    public function index($presence)
    {
      $presence = Presence::find($presence);
      $medicaments = DB::table('presence_medicament')
                         ->join('medicaments', 'medicaments.id',
                                '=', 'presence_medicament.medicament_id')
                         ->join('presences', 'presences.id', '=', 'presence_medicament.presence_id')
                         ->where('presence_medicament.presence_id',
                                 '=', $presence->id)
                         ->select('medicaments.*')
                         ->orderBy('presence_medicament.updated_at', 'DESC')
                         ->paginate(15);
      $date_plan = DB::table('presence_medicament')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_medicament')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('presence_medicament')
                    ->where('presence_id', '=', $presence->id)
                    ->select('amount')
                    ->get();

      return view('presenceMedicament', [
        'presence' => $presence,
        'medicaments' => $medicaments,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }

    public function create($presence)
    {
      $presence = Presence::find($presence);

      return view('createPresenceMedicament', [
        'presence' => $presence,
      ]);
    }

    public function store($presence)
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
      DB::table('presence_medicament')->updateOrInsert([
        'presence_id' => $presence, 'medicament_id' => $medicament->id,
        'date_plan' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);

      return redirect()->route('presenceMedicament.show', [
        'presence' => $presence,
      ]);
    }

    public function edit($presence, $medicament)
    {
      $presence = Presence::find($presence);
      $medicament = Medicament::find($medicament);
      $amount = DB::table('presence_medicament')
                    ->where('presence_id', '=', $presence->id)
                    ->where('medicament_id', '=', $medicament->id)
                    ->value('amount');

      return view('editPresenceMedicament', [
        'presence' => $presence,
        'medicament' => $medicament,
        'amount' => $amount,
      ]);
    }

    public function update($presence, $medicament)
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

      DB::table('presence_medicament')
          ->where('presence_id', '=', $presence)
          ->where('medicament_id', '=', $medicament->id)
          ->update(['amount' => $pivotData['amount']]);

      return redirect()->route('presenceMedicament.show', [
        'presence' => $presence,
      ]);
    }

    public function destroy($presence, $medicament)
    {
      DB::table('presence_medicament')
          ->where('presence_id', '=', $presence)
          ->where('medicament_id', '=', $medicament)
          ->delete();

      $medicament = Medicament::find($medicament);

      return redirect()->route('presenceMedicament.show', [
        'presence' => $presence,
      ]);
    }
}
