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

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
        'search' => '',
      ]);

      $clinics = Clinic::query()
                 ->join('cities', 'clinics.city_id', '=', 'cities.id')
                 ->where($data['category'], 'like', '%'.$data['search'].'%')
                 ->select('clinics.*')
                 ->distinct()
                 ->orderBy('clinics.updated_at', 'DESC')
                 ->paginate(6);

      return view('clinics', [
        'clinics' => $clinics,
      ]);
    }
}
