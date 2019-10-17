<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        'street' => '',
        'house' => '',
        'flat' => '',
        'phone_number' => '',
        'last_name' => '',
        'first_name' => '',
        'father_name' => '',
      ]);

      $employee->update($data);

      return redirect()->route('home.show');
    }
}
