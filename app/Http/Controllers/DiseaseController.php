<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disease;
use App\Room;
use App\Employee;
use App\Presence;
use App\City;
use App\Patient;

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
}
