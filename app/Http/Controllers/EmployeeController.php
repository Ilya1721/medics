<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Department;
use App\Job;
use App\Employee;
use App\City;

class EmployeeController extends Controller
{
    public function edit(Employee $employee)
    {
      $departments = Department::all();
      $jobs = Job::all();
      $cities = City::all();

      return view('editEmployee', [
        'departments' => $departments,
        'jobs' => $jobs,
        'cities' => $cities,
        'employee' => $employee,
      ]);
    }

    public function update(Employee $employee)
    {
      $data = request()->validate([
        'city_id' => '',
        'job_id' => '',
        'department_id' => '',
        'street' => 'required',
        'house' => 'required',
        'flat' => 'required',
        'phone_number' => 'required',
        'last_name' => 'required',
        'first_name' => 'required',
        'father_name' => 'required',
        'image' => 'image',
      ]);

      if(request('image'))
      {
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(125, 150);
        $image->save();
        $imageArray = ['image' => $imagePath];
      }

      $employee->update(array_merge(
        $data,
        $imageArray ?? []
      ));

      return redirect()->route('home.show');
    }
}
