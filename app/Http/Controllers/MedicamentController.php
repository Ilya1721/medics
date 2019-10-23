<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Manufactor;
use App\Medicament;
use App\Country;

class MedicamentController extends Controller
{
    public function index()
    {
      $medicaments = Medicament::query()
                     ->orderBy('updated_at', 'DESC')
                     ->paginate(6);

      return view('medicaments', [
        'medicaments' => $medicaments,
        'count' => 0,
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
