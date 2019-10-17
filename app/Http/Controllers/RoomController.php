<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Department;

class RoomController extends Controller
{
    public function index()
    {
      $rooms = Room::all();

      return view('rooms', [
        'rooms' => $rooms,
        'count' => 0,
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

      Room::create($data);
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
