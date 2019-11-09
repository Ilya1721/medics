<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Treatment;

class TreatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $treatments = Treatment::query()
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(6);

      return view('treatments', [
        'treatments' => $treatments,
        'user' => Auth::user(),
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);

      $treatments = Treatment::query()
                    ->where($data['category'], 'like', '%'.$data['search'].'%')
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(6);

      return view('treatments', [
        'treatments' => $treatments,
        'user' => Auth::user(),
      ]);
    }

    public function create()
    {
      return view('createTreatment');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'description' => '',
      ]);

      Treatment::updateOrCreate($data);
      $treatments = Treatment::all();

      return redirect()->route('treatments.show', [
        'treatments' => $treatments,
      ]);
    }

    public function edit(Treatment $treatment)
    {
      return view('editTreatment', [
        'treatment' => $treatment,
      ]);
    }

    public function update(Treatment $treatment)
    {
      $data = request()->validate([
        'name' => '',
        'description' => '',
      ]);

      $treatment->update($data);
      $treatments = Treatment::all();

      return redirect()->route('treatments.show', [
        'treatments' => $treatments,
      ]);
    }
}
