<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Manufactor;
use App\Medicament;
use App\Country;

class MedicamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $medicaments = Medicament::query()
                     ->orderBy('updated_at', 'DESC')
                     ->paginate(6);

      return view('medicaments', [
        'medicaments' => $medicaments,
        'user' => Auth::user(),
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
        'search' => '',
      ]);

      if($data['category'] == 'name')
      {
        $data['category'] = 'medicaments.'.$data['category'];
      }
      else if($data['category'] == 'manufactor')
      {
        $data['category'] = 'manufactors.name';
      }

      $medicaments = Medicament::query()
                         ->join('medicament_manufactor', 'medicament_manufactor.medicament_id',
                                '=', 'medicaments.id')
                         ->join('manufactors', 'medicament_manufactor.manufactor_id',
                                '=', 'manufactors.id')
                         ->join('countries', 'manufactors.country_id', '=', 'countries.id')
                         ->where($data['category'], 'like', '%'.$data['search'].'%')
                         ->select('medicaments.*')
                         ->orderBy('medicaments.updated_at', 'DESC')
                         ->paginate(6);

      return view('medicaments', [
        'medicaments' => $medicaments,
        'user' => Auth::user(),
      ]);
    }

    public function create()
    {
      $manufactors = Manufactor::all();

      return view('createMedicament', [
        'manufactors' => $manufactors,
      ]);
    }

    public function store()
    {
      $medicaments = request()->validate([
        'name' => 'required',
        'unit_of_measure' => 'required',
      ]);
      $manufactors = request()->validate([
        'manufactor' => '',
        'country' => '',
      ]);

      $medicament = Medicament::updateOrCreate(
        ['name' => $medicaments['name']],
        $medicaments,
      );
      $manufactorData = [];
      $countryData = [];

      for($i = 0; $i < count($manufactors['manufactor']); $i++)
      {
        $manufactorData['name'] = $manufactors['manufactor'][$i];
        $countryData['name'] = $manufactors['country'][$i];
        $country = Country::updateOrCreate(
          ['name' => $countryData['name']],
          $countryData,
        );
        $manufactorData['country_id'] = $country->id;
        $manufactor = Manufactor::updateOrCreate(
          ['name' => $manufactorData['name']],
          $manufactorData,
        );

        DB::table('medicament_manufactor')
            ->updateOrInsert(['manufactor_id' => $manufactor->id,
                              'medicament_id' => $medicament->id]);
      }

      $medicaments = Medicament::all();

      return redirect()->route('medicaments.show', [
        'medicaments' => $medicaments,
      ]);
    }

    public function edit(Medicament $medicament)
    {
      $manufactors = Manufactor::all();

      return view('editMedicament', [
        'manufactors' => $manufactors,
        'medicament' => $medicament,
      ]);
    }

    public function update(Medicament $medicament)
    {
      $data = request()->validate([
        'name' => '',
        'unit_of_measure' => '',
        'description' => '',
      ]);

      $medicament->update($data);

      $medicaments = Medicament::all();

      return redirect()->route('medicaments.show', [
        'medicaments' => $medicaments,
      ]);
    }
}
