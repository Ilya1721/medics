<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Symptom;

class SymptomController extends Controller
{
    public function index()
    {
      $symptoms = Symptom::all();

      return view('symptoms', [
        'symptoms' => $symptoms,
        'count' => 0,
      ]);
    }

    public function create()
    {
      return view('createSymptom');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);

      Symptom::create($data);

      $symptoms = Symptom::all();

      return redirect()->route('symptoms.show', [
        'symptoms' => $symptoms,
      ]);
    }

    public function edit(Symptom $symptom)
    {
      return view('editSymptom', [
        'symptom' => $symptom,
      ]);
    }

    public function update(Symptom $symptom)
    {
      $data = request()->validate([
        'name' => '',
        'description' => ''
      ]);

      $symptom->update($data);
      $symptoms = Symptom::all();

      return redirect()->route('symptoms.show', [
        'symptoms' => $symptoms,
      ]);
    }
}
