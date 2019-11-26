<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Presence;

class PatientController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $patients = Patient::query()
                  ->orderBy('updated_at', 'DESC')
                  ->paginate(15);

      $user = Auth::user();

      return view('patients', [
        'patients' => $patients,
        'user' => $user,
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);

      $user = Auth::user();
      $patients = Presence::query()
                             ->join('patients', 'patients.id', 'presences.patient_id')
                             ->where($data['category'], 'like', '%'.$data['search'].'%')
                             ->where('presences.doctor_id', '=', Auth::user()->employee->id)
                             ->select('patients.*')
                             ->distinct()
                             ->orderBy('patients.updated_at', 'DESC')->paginate(15);

      return view('patients', [
        'patients' => $patients,
        'user' => $user,
      ]);
    }
}
