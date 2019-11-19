<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Symptom;
use App\presence;

class PresenceSymptomController extends Controller
{
    public function index($presence)
    {
      $presence = Presence::find($presence);
      $symptoms = DB::table('presence_symptom')
                      ->join('symptoms', 'symptoms.id',
                             '=', 'presence_symptom.symptom_id')
                      ->join('presences', 'presences.id', '=', 'presence_symptom.presence_id')
                      ->where('presences.id',
                              '=', $presence->id)
                      ->select('symptoms.*')
                      ->orderBy('presence_symptom.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_symptom')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_symptom')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_fact')
                       ->get();
      $amount = DB::table('presence_symptom')
                    ->where('presence_id', '=', $presence->id)
                    ->select('amount')
                    ->get();

      return view('presenceSymptom', [
        'presence' => $presence,
        'symptoms' => $symptoms,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
        'amount' => $amount,
      ]);
    }

    public function create($presence)
    {
      $presence = presence::find($presence);

      return view('createPresenceSymptom', [
        'presence' => $presence,
      ]);
    }

    public function store($presence)
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
      $symptom = Symptom::updateOrCreate($symptomData);
      DB::table('presence_symptom')->updateOrInsert([
        'presence_id' => $presence, 'symptom_id' => $symptom->id,
        'date_plan' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'amount' => $pivotData['amount'],
      ]);

      $presence = presence::find($presence);

      return redirect()->route('presenceSymptom.show', [
        'presence' => $presence,
      ]);
    }

    public function edit($presence, $symptom)
    {
      $presence = Presence::find($presence);
      $symptom = Symptom::find($symptom);
      $amount = DB::table('presence_symptom')
                    ->where('presence_id', '=', $presence->id)
                    ->where('symptom_id', '=', $symptom->id)
                    ->value('amount');

      return view('editPresenceSymptom', [
        'presence' => $presence,
        'symptom' => $symptom,
        'amount' => $amount,
      ]);
    }

    public function update($presence, $symptom)
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

      DB::table('presence_symptom')
          ->where('presence_id', '=', $presence)
          ->where('symptom_id', '=', $symptom->id)
          ->update(['amount' => $amount['amount'] ]);

      $presence = Presence::find($presence);

      return redirect()->route('presenceSymptom.show', [
        'presence' => $presence,
      ]);
    }

    public function destroy($presence, $symptom)
    {
      DB::table('presence_symptom')
          ->where('presence_id', '=', $presence)
          ->where('symptom_id', '=', $symptom)
          ->delete();

      $presence = Presence::find($presence);

      return redirect()->route('presenceSymptom.show', [
        'presence' => $presence,
      ]);
    }
}
