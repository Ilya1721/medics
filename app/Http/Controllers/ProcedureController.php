<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedure;

class ProcedureController extends Controller
{
    public function index()
    {
      $procedures = Procedure::query()
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(6);

      return view('procedures', [
        'procedures' => $procedures,
        'count' => 0,
      ]);
    }

    public function create()
    {
      return view('createProcedure');
    }

    public function store()
    {
      $procedures = request()->validate([
        'name' => 'required',
        'unit_of_measure' => 'required',
        'description' => '',
      ]);

      Procedure::updateOrCreate($procedures);

      $procedures = Procedure::all();

      return redirect()->route('procedures.show', [
        'procedures' => $procedures,
      ]);
    }

    public function edit(Procedure $procedure)
    {
      return view('editProcedure', [
        'procedure' => $procedure,
      ]);
    }

    public function update(Procedure $procedure)
    {
      $data = request()->validate([
        'name' => '',
        'unit_of_measure' => '',
        'description' => '',
      ]);

      $procedure->update($data);

      $procedures = Procedure::all();

      return redirect()->route('procedures.show', [
        'procedures' => $procedures,
      ]);
    }
}
