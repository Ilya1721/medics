<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Disease;
use App\Symptom;
use App\Medicament;
use App\Treatment;
use App\Procedure;
use App\Room;

class InnerDataController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $diseaseCount = Disease::count();
    $symptomCount = Symptom::count();
    $medicamentCount = Medicament::count();
    $treatmentCount = Treatment::count();
    $procedureCount = Procedure::count();
    $roomCount = Room::count();

    return view('innerData', [
      'user' => Auth::user(),
      'diseaseCount' => $diseaseCount,
      'symptomCount' => $symptomCount,
      'medicamentCount' => $medicamentCount,
      'treatmentCount' => $treatmentCount,
      'procedureCount' => $procedureCount,
      'roomCount' => $roomCount,
    ]);
  }
}
