<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disease;
use App\Treatment;
use App\Symptom;

class DiseaseController extends Controller
{
    public function index()
    {
      $diseases =  Disease::all();

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
}
