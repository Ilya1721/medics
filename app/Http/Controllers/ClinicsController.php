<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;

class ClinicsController extends Controller
{
    public function index()
    {
      $clinics = Clinic::all();

      return view('clinics', [
        'clinics' => $clinics,
      ]);
    }
}
