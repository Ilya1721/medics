<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;

class ClinicsController extends Controller
{
    public function index()
    {
      $clinics = Clinic::query()
                ->orderBy('updated_at', 'DESC')
                ->paginate(6);

      return view('clinics', [
        'clinics' => $clinics,
      ]);
    }
}
