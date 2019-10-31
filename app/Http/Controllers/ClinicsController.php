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

      if($data['category'] == 'city')
      {
        $data['category'] = 'cities.name';
      }
      else
      {
        $data['category'] = 'clinics.'.$data['category'];
      }

      $clinics = Clinic::query()
                 ->join('cities', 'clinics.city_id', '=', 'cities.id')
                 ->where($data['category'], 'like', '%'.$data['search'].'%')
                 ->orderBy('clinics.updated_at', 'DESC')
                 ->paginate(6);

      return view('clinics', [
        'clinics' => $clinics,
      ]);
    }
}
