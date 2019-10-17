<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentController extends Controller
{
    public function index()
    {
      $treatments = Treatment::all();

      return view('treatments', [
        'treatments' => $treatments,
        'count' => 0,
      ]);
    }

    public function create()
    {
      return view('createTreatment');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);

      Treatment::create($data);
      $treatments = Treatment::all();

      return redirect()->route('treatments.show', [
        'treatments' => $treatments,
      ]);
    }

    public function edit(Treatment $treatment)
    {
      return view('editTreatment', [
        'treatment' => $treatment,
      ]);
    }

    public function update(Treatment $treatment)
    {
      $data = request()->validate([
        'name' => '',
        'description' => '',
      ]);

      $treatment->update($data);
      $treatments = Treatment::all();

      return redirect()->route('treatments.show', [
        'treatments' => $treatments,
      ]);
    }
}
