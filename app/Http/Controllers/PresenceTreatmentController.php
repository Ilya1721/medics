<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\presence;
use App\Treatment;

class PresenceTreatmentController extends Controller
{
    public function index($presence)
    {
      $presence = Presence::find($presence);
      $treatments = DB::table('presence_treatment')
                        ->join('treatments', 'treatments.id',
                               '=', 'presence_treatment.treatment_id')
                        ->join('presences', 'presences.id', '=', 'presence_treatment.presence_id')
                        ->where('presence_treatment.presence_id',
                                '=', $presence->id)
                        ->select('treatments.*')
                        ->orderBy('presence_treatment.updated_at', 'DESC')
                        ->paginate(15);
      $date_plan = DB::table('presence_treatment')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_plan')
                       ->get();
      $date_fact = DB::table('presence_treatment')
                       ->where('presence_id', '=', $presence->id)
                       ->select('date_fact')
                       ->get();

      return view('presenceTreatment', [
        'presence' => $presence,
        'treatments' => $treatments,
        'date_plan' => $date_plan,
        'date_fact' => $date_fact,
      ]);
    }

    public function create($presence)
    {
      $presence = Presence::find($presence);

      return view('createPresenceTreatment', [
        'presence' => $presence,
      ]);
    }

    public function store($presence)
    {
      $treatmentData = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $date = request()->validate([
        'date_plan' => '',
      ]);
      $treatment = Treatment::updateOrCreate($treatmentData);
      DB::table('presence_treatment')->updateOrInsert([
        'presence_id' => $presence, 'treatment_id' => $treatment->id,
        'date_plan' => $date['date_plan'], 'date_fact' => $date['date_plan'],
      ]);
      $presence = Presence::find($presence);

      return redirect()->route('presenceTreatment.show', [
        'presence' => $presence,
        'date_plan' => $date['date_plan'],
        'date_fact' => $date['date_plan'],
      ]);
    }

    public function edit($presence, $treatment)
    {
      $presence = Presence::find($presence);
      $treatment = Treatment::find($treatment);

      return view('editPresenceTreatment', [
        'presence' => $presence,
        'treatment' => $treatment,
      ]);
    }

    public function update($presence, $treatment)
    {
      $data = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);
      $treatment = Treatment::find($treatment);
      $treatment->update($data);

      return redirect()->route('presenceTreatment.show', [
        'presence' => $presence,
      ]);
    }

    public function destroy($presence, $treatment)
    {
      DB::table('presence_treatment')
          ->where('presence_id', '=', $presence)
          ->where('treatment_id', '=', $treatment)
          ->delete();

      $treatment = Treatment::find($treatment);

      return redirect()->route('presenceTreatment.show', [
        'presence' => $presence,
      ]);
    }
}
