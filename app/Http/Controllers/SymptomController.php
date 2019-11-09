<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Symptom;

class SymptomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $symptoms = Symptom::query()
                  ->orderBy('updated_at', 'DESC')
                  ->paginate(6);

      return view('symptoms', [
        'symptoms' => $symptoms,
        'user' => Auth::user(),
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);

      $symptoms = Symptom::query()
                  ->where($data['category'], 'like', '%'.$data['search'].'%')
                  ->orderBy('updated_at', 'DESC')
                  ->paginate(6);

      return view('symptoms', [
        'symptoms' => $symptoms,
        'user' => Auth::user(),
      ]);
    }

    public function create()
    {
      return view('createSymptom');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);

      Symptom::updateOrCreate($data);

      $symptoms = Symptom::all();

      return redirect()->route('symptoms.show', [
        'symptoms' => $symptoms,
      ]);
    }

    public function edit(Symptom $symptom)
    {
      return view('editSymptom', [
        'symptom' => $symptom,
      ]);
    }

    public function update(Symptom $symptom)
    {
      $data = request()->validate([
        'name' => '',
        'description' => ''
      ]);

      $symptom->update($data);
      $symptoms = Symptom::all();

      return redirect()->route('symptoms.show', [
        'symptoms' => $symptoms,
      ]);
    }
}
