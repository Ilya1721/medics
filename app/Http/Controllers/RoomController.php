<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\Department;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $rooms = Room::query()
               ->orderBy('updated_at')
               ->paginate(6);

      return view('rooms', [
        'rooms' => $rooms,
        'user' => Auth::user(),
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);

      $rooms = Room::query()->join('departments', 'departments.id',
                                   '=', 'rooms.department_id')
                            ->where($data['category'], 'like', '%'.$data['search'].'%')
                            ->orderBy('rooms.updated_at', 'DESC')
                            ->paginate(6);

      return view('rooms', [
        'rooms' => $rooms,
        'user' => Auth::user(),
      ]);
    }

    public function create()
    {
      $departments = Department::all();

      return view('createRoom', [
        'departments' => $departments,
      ]);
    }

    public function store()
    {
      $data = request()->validate([
        'number' => 'required',
        'capacity' => 'required',
        'department_id' => '',
      ]);

      Room::updateOrCreate($data);
      $rooms = Room::all();

      return redirect()->route('rooms.show', [
        'rooms' => $rooms,
      ]);
    }

    public function edit(Room $room)
    {
      $departments = Department::all();

      return view('editRoom', [
        'room' => $room,
        'departments' => $departments,
      ]);
    }

    public function update(Room $room)
    {
      $data = request()->validate([
        'number' => '',
        'capacity' => '',
        'department_id' => '',
      ]);

      $room->update($data);

      $rooms = Room::all();

      return redirect()->route('rooms.show', [
        'rooms' => $rooms,
      ]);
    }
}
