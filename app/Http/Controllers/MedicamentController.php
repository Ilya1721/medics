<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufactor;
use App\Medicament;

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
        'manufactor_id' => ' ',
      ]);

      \App\Medicament::create($medicaments);

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
