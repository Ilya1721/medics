<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\presence;
use App\Disease;

class PresenceDiseaseController extends Controller
{
    public function index($presence)
    {
      $presence = Presence::find($presence);
      $diseases = DB::table('presence_disease')
                      ->join('diseases', 'diseases.id',
                             '=', 'presence_disease.disease_id')
                      ->join('presences', 'presences.id', '=', 'presence_disease.presence_id')
                      ->where('presence_disease.presence_id',
                              '=', $presence->id)
                      ->select('diseases.*')
                      ->orderBy('presence_disease.updated_at', 'DESC')
                      ->paginate(15);
      $date_plan = DB::table('presence_disease')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_scheduled')
                       ->get();
      $date_fact = DB::table('presence_disease')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_fact')
                       ->get();

      return view('presenceDisease', [
        'presence' => $presence,
        'diseases' => $diseases,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
      ]);
    }

    public function create($presence)
    {
      $presence = Presence::find($presence);
      $diseases = $presence->diseases;

      return view('createPresenceDisease', [
        'presence' => $presence,
        'diseases' => $diseases,
      ]);
    }

    public function store($presence)
    {
      $diseaseData = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $pivotData = request()->validate([
        'date_plan' => 'required',
      ]);
      $disease = Disease::updateOrCreate($diseaseData);
      DB::table('presence_disease')->updateOrInsert([
        'presence_id' => $presence, 'disease_id' => $disease->id,
        'date_scheduled' => $pivotData['date_plan'], 'date_fact' => $pivotData['date_plan'],
        'doctor_id' => Auth::user()->employee->id,
      ]);

      return redirect()->route('presenceDisease.show', [
        'presence' => $presence,
      ]);
    }

    public function edit($presence, $disease)
    {
      $presence = Presence::find($presence);
      $disease = Disease::find($disease);

      return view('editPresenceDisease', [
        'presence' => $presence,
        'disease' => $disease,
      ]);
    }

    public function update($presence, $disease)
    {
      $diseaseData = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $disease = Disease::find($disease);
      $disease->update($diseaseData);

      return redirect()->route('presenceDisease.show', [
        'presence' => $presence,
      ]);
    }

    public function destroy($presence, $disease)
    {
      DB::table('presence_disease')
          ->where('presence_id', '=', $presence)
          ->where('disease_id', '=', $disease)
          ->delete();

      $presence = Presence::find($presence);

      return redirect()->route('presenceDisease.show', [
        'presence' => $presence,
      ]);
    }
}
