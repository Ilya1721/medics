<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Disease;
use App\Treatment;
use App\Symptom;

class DiseaseController extends Controller
{
    public function index()
    {
      $diseases =  Disease::query()
                   ->orderBy('updated_at', 'DESC')
                   ->paginate(6);

      return view('diseases', [
        'diseases' => $diseases,
        'count' => 0,
      ]);
    }

    public function create()
    {
      $symptoms = Symptom::all();
      $treatments = Treatment::all();

      return view('createDisease', [
        'symptoms' => $symptoms,
        'treatments' => $treatments,
      ]);
    }

    public function store()
    {
      $disease = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);

      $disease = Disease::create($disease);

      $symptoms = request()->validate([
        'symptom_array' => '',
        'unit_of_measure' => '',
      ]);
      $treatments = request()->validate([
        'treatment_array' => '',
      ]);

      $symptomData = [];

      for($i = 0; $i < count($symptoms['symptom_array']); $i++)
      {
        $symptomData['name'] = $symptoms['symptom_array'][$i];
        $symptomData['description'] = '';
        $symptomData['unit_of_measure'] = $symptoms['unit_of_measure'][$i];

        $newSymptom = Symptom::create($symptomData);
        DB::table('symptom_diseases')->insertOrIgnore([
          ['symptom_id' => $newSymptom->id, 'disease_id' => $disease->id],
        ]);
      }

      for($i = 0; $i < count($treatments['treatment_array']); $i++)
      {
        $treatmentData['name'] = $treatments['treatment_array'][$i];
        $treatmentData['description'] = '';

        $newTreatment = Treatment::create($treatmentData);
        DB::table('treatment_diseases')->insertOrIgnore([
          ['treatment_id' => $newTreatment->id, 'disease_id' => $disease->id],
        ]);
      }

      $diseases = Disease::all();

      return redirect()->route('disease.show', [
        'diseases' => $diseases,
        'count' => 0,
      ]);
    }

    public function edit(Disease $disease)
    {
      $symptoms = Symptom::all();
      $treatments = Treatment::all();

      return view('editDisease', [
        'disease' => $disease,
        'symptoms' => $symptoms,
        'treatments' => $treatments,
      ]);
    }

    public function update(Disease $disease)
    {
      $diseaseData = request()->validate([
        'name' => '',
        'description' => '',
      ]);
      $symptomDataArray = request()->validate([
        'symptom_id_array' => '',
      ]);
      $treatmentDataArray = request()->validate([
        'treatment_id_array' => '',
      ]);
      $disease->update($diseaseData);

      foreach($symptomDataArray as $symptomData)
      {
        DB::table('symptom_diseases')
                  ->where('disease_id', '=', $disease->id)
                  ->update(['symptom_id' => intval($symptomData)]);
      }
      foreach($treatmentDataArray as $treatmentData)
      {
        DB::table('treatment_diseases')
                  ->where('disease_id', '=', $disease->id)
                  ->update(['treatment_id' => intval($treatmentData)]);
      }

      $diseases = Disease::all();

      return redirect()->route('disease.show', [
        'diseases' => $diseases,
        'count' => 0,
      ]);
    }
}
